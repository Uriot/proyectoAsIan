<form wire:submit.prevent="updateCliente" class="space-y-4">

    <h2 class="text-xl font-bold">Datos del Usuario</h2>

    <div>
        <label for="name">Nombre de usuario</label>
        <input type="text" id="name" wire:model.defer="userState.name" class="border rounded p-2 w-full" required>
        @error('userState.name') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" wire:model.defer="userState.email" class="border rounded p-2 w-full" required>
        @error('userState.email') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <h2 class="text-xl font-bold mt-4">Datos del Cliente</h2>

    <div>
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" wire:model.defer="clienteState.nombre" class="border rounded p-2 w-full" required>
        @error('clienteState.nombre') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" wire:model.defer="clienteState.apellido" class="border rounded p-2 w-full">
        @error('clienteState.apellido') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" wire:model.defer="clienteState.direccion" class="border rounded p-2 w-full">
        @error('clienteState.direccion') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" wire:model.defer="clienteState.telefono" class="border rounded p-2 w-full">
        @error('clienteState.telefono') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>

    @if (session()->has('message'))
        <div class="text-green-500 mt-2">{{ session('message') }}</div>
    @endif
</form>
