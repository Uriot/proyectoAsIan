<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public $perPage = 10;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Acceso no autorizado');
        }

        $compras = Compra::paginate($this->perPage);
        $proveedores = Proveedor::all();
        $sucursales = Sucursal::all();
        $productos = Producto::all();
        return view('compras.index', compact('compras', 'proveedores', 'sucursales', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Acceso no autorizado');
        }
        $proveedores = Proveedor::all();
        $sucursales = Sucursal::all();
        $productos = Producto::all();
        return view('compras.create', compact('proveedores', 'sucursales', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Acceso no autorizado');
        }
        $total = $request->input('precios') ? array_sum($request->input('precios')) : 0;

        DB::beginTransaction();

        try {
            //dd($request->all());
            $compra = Compra::create([
                'proveedor_id' => $request->proveedor_id,
                'sucursal_id' => $request->sucursal_id,
                'total' => $total,
                'fecha_compra' => now(),
                'estado' => 'completado',
                'creado_por' => auth()->user()->email,
            ]);

            foreach ($request->input('productos', []) as $index => $productoId) {
                DetalleCompra::create([
                    'compra_id' => $compra->id,
                    'producto_id' => $productoId,
                    'cantidad' => $request->input('cantidades')[$index] ?? 1,
                    'precio_unitario' => $request->input('precios')[$index] ?? 0,
                    'creado_por' => auth()->user()->email,
                ]);

                $inventario = Inventario::where('producto_id', $productoId)
                    ->where('sucursal_id', $request->sucursal_id)
                    ->first();

                $cantidad = $request->input('cantidades')[$index] ?? 0;

                if ($inventario) {
                    $inventario->increment('cantidad_actual', $cantidad);
                    $inventario->actualizado_por = auth()->user()->email;
                    $inventario->save();
                } else {
                    Inventario::create([
                        'producto_id' => $productoId,
                        'sucursal_id' => $request->sucursal_id,
                        'cantidad_actual' => $cantidad,
                        'actualizado_por' => auth()->user()->email,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('compras.index')->with('success', 'Compra registrada exitosamente.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('compras.create')->with('error', 'Error al registrar la compra.' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
