<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

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
        $producto = $request->only(['nombre', 'precio', 'imagen']);
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$producto['nombre']])) {
            $carrito[$producto['nombre']]['cantidad']++;
        } else {
            $carrito[$producto['nombre']] = [
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
        $request->validate([
            'metodo_pago' => 'required|in:tarjeta,paypal,efectivo',
        ]);

        $metodo = $request->metodo_pago;
        $carrito = session()->get('carrito', []);
        $total = 0;

        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        // Aquí podrías integrar la pasarela de pagos real
        // Por ahora simulamos pago exitoso
        session()->forget('carrito');

        return redirect()->route('dashboard')->with('success', "Pago de Q$total realizado exitosamente con $metodo ✅");
    }
}
