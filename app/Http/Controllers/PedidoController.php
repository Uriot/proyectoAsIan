<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoController extends Controller
{

    public $perPage = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    public function imprimirFactura(Pedido $pedido)
    {
        $user = auth()->user()->cliente;

        if ($pedido->cliente_id !== $user->id) {
            abort(403, 'No tienes permiso para ver este pedido.');
        }

        $pdf = Pdf::loadView('pedidos.factura', compact('pedido'));
        return $pdf->stream();
        return $pdf->download('factura_pedido_' . $pedido->id . '.pdf');
    }


    public function misPedidos()
    {
        $user = auth()->user()->cliente;
        $pedidos = Pedido::where('cliente_id', $user->id)->with('detalles')->paginate($this->perPage);

        return view('pedidos.misPedidos', compact('pedidos'));
    }

    public function verMiPedido(Pedido $pedido)
    {
        $user = auth()->user()->cliente;

        if ($pedido->cliente_id !== $user->id) {
            abort(403, 'No tienes permiso para ver este pedido.');
        }

        //dd($pedido);

        return view('pedidos.verMiPedido', compact('pedido'));
    }
}
