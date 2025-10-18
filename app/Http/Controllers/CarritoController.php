<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Models\Inventario;
use App\Models\MetodoPago;
use App\Models\Pago;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    // Mostrar el carrito
    public function index()
    {
        $carrito = session()->get('carrito', []);
        $user = auth()->user();
        $metodosPago = MetodoPago::all();
        $total = 0;

        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        //dd($user->cliente)   ;
        return view('carrito', compact('carrito', 'total', 'user', 'metodosPago'));
    }

    // Agregar producto al carrito
    public function agregar(Request $request)
    {
        $producto = $request->only(['id', 'nombre', 'precio', 'imagen']);

        $inventarioItem = Inventario::where('producto_id', $producto['id']);


        $cantidadEnInventario = $inventarioItem->sum('cantidad_actual');

        if ($cantidadEnInventario <= 0) {
            return redirect()->back()->with('error', 'No hay suficiente inventario para este producto ❌');
        }

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$producto['nombre']])) {
            $carrito[$producto['nombre']]['cantidad']++;
        } else {
            $carrito[$producto['nombre']] = [
                'id' => $producto['id'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
                'cantidad' => 1,
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito ✅');
    }

    // Eliminar producto del carrito
    public function eliminar($nombre)
    {
        $carrito = session()->get('carrito', []);
        if (isset($carrito[$nombre])) {
            unset($carrito[$nombre]);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito 🗑️');
    }

    // Vaciar todo el carrito
    public function vaciar()
    {
        session()->forget('carrito');
        return redirect()->route('carrito.index')->with('success', 'Carrito vaciado 🛒');
    }

    // Pagar carrito
    public function pagar(Request $request)
    {
        $carrito = session()->get('carrito', []);

        $request->validate([
            'metodo_pago' => 'required',
        ]);

        if (auth()->user()->cliente == null) {
            return redirect()->route('carrito.index')->with('error', 'Debe completar su información de cliente antes de pagar ❌');
        }

        $metodo = $request->metodo_pago;
        $total = 0;

        DB::beginTransaction();

        try {
            // 1️⃣ Validar inventario
            $inventariosSeleccionados = []; // Guardaremos la sucursal donde tomamos stock
            foreach ($carrito as $item) {

                $inventariosItem = Inventario::where('producto_id', $item['id'])->get();
                $cumpleAlgunInventario = false;
                $inventarioCumple = null;

                foreach ($inventariosItem as $inv) {
                    if ($inv->cantidad_actual >= $item['cantidad']) {
                        $cumpleAlgunInventario = true;
                        $inventarioCumple = $inv;
                        break;
                    }
                }

                if (!$cumpleAlgunInventario) {
                    throw new \Exception('No hay suficiente inventario en una sucursal para el producto ' . $item['nombre']);
                }

                $inventariosSeleccionados[$item['id']] = $inventarioCumple; // guardamos la sucursal
                $total += $item['precio'] * $item['cantidad'];
            }

            // 2️⃣ Crear el pedido
            $pedido = Pedido::create([
                'cliente_id' => auth()->user()->cliente->id,
                'sucursal_id' => 1, // Opcional: asignar sucursal principal o de inventario
                'fecha_pedido' => now(),
                'total' => $total,
                'estado' => 'pendiente',
                'tipo_entrega' => 'a definir',
                'direccion_entrega' => auth()->user()->cliente->direccion,
            ]);

            // 3️⃣ Registrar detalle de pedido y actualizar inventario
            foreach ($carrito as $item) {
                $inv = $inventariosSeleccionados[$item['id']];

                DetallePedido::create([
                    'id_pedido' => $pedido->id,
                    'id_producto' => $item['id'],
                    'cantidad' => $item['cantidad'],
                    'precio' => $item['precio'],
                ]);

                // actualizar stock
                $inv->cantidad_actual -= $item['cantidad'];
                $inv->save();
            }

            // 4️⃣ Registrar el pago
            Pago::create([
                'pedido_id' => $pedido->id,
                'metodo_pago_id' => $metodo,
                'monto' => $total,
                'fecha_pago' => now(),
                'estado' => 'pagado',
            ]);

            DB::commit();

            session()->forget('carrito');

            return redirect()->route('dashboard')->with('success', "Pago de Q$total realizado exitosamente con $metodo ✅");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('carrito.index')->with('error', 'Error al procesar el pago: ' . $th->getMessage());
        }
    }
}
