<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UpdateClienteForm extends Component
{
    public $user;
    public $userState = [];
    public $clienteState = [];

    // Recibe el User y carga su Cliente
    public function mount(User $user)
    {
        $this->user = $user;

        $this->userState = [
            'name' => $user->name,
            'email' => $user->email,
        ];

        $this->clienteState = $user->cliente ? $user->cliente->toArray() : [];
    }

    public function updateCliente()
    {
        $this->validate([
            'userState.name' => 'required|string|max:255',
            'userState.email' => 'required|email',
            'clienteState.nombre' => 'required|string|max:255',
            'clienteState.apellido' => 'nullable|string|max:255',
            'clienteState.direccion' => 'nullable|string|max:255',
            'clienteState.telefono' => 'nullable|string|max:50',
        ]);

        // Actualizar User
        $this->user->update($this->userState);

        // Actualizar o crear Cliente
        if ($this->user->cliente) {
            $this->user->cliente->update($this->clienteState);
        } else {
            $this->user->cliente()->create($this->clienteState);
        }

        session()->flash('message', 'Datos actualizados correctamente.');
    }

    public function render()
    {
        return view('livewire.update-cliente-form');
    }
}
