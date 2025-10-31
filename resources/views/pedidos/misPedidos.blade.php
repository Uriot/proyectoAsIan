<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Codigo de Pedido
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sucursal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    cantidad de Productos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Estado
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4">
                                        {{ $pedido->id }}
                                    </th>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $pedido->sucursal->nombre }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pedido->detalles->count() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pedido->estado }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Q. {{ $pedido->total }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('misPedidos.view', $pedido) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($pedidos->count() <= 0)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <td colspan="4"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        No se encontraron pedidos.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-4 p-2">
                        {{ $pedidos->links() }}
                    </div>
                </div>
            </div>
            <!-- Formulario único oculto -->
            <form id="delete-form" method="POST" style="display:none;">
                @csrf
                @method('DELETE')
            </form>
        </div>


        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: '¿Estás seguro de Eliminar?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.getElementById('delete-form');
                        form.action = '/permissions/' + id; // ruta DELETE
                        form.submit();
                    }
                });
            }
        </script>
</x-app-layout>
