<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function createOrUpdate(Request $request)
    {
        $user = auth()->user();

        $clienteData = $request->only(['nombre', 'apellido', 'direccion', 'email', 'telefono']);
        $clienteData['user_id'] = $user->id;
        $clienteData['creado_por'] = $user->email;
        $clienteData['actualizado_por'] = $user->email;

        $cliente = Cliente::updateOrCreate(
            ['user_id' => $user->id],
            $clienteData
        );

        return redirect()->route('carrito.index')->with('success', 'Información del cliente guardada correctamente ✅');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
