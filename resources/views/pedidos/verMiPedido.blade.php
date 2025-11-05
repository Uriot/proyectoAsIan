<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pedido #' . $pedido->id) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg">

                <hr class="mb-4 mt-4">
                <div class="text-center">
                    <h3 class="ml-5">Datos del pedido</h3>
                </div>
                <hr class="mb-4 mt-4">

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
                                    Estado
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Direccion de entrega
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>

                            </tr>
                        </thead>
                        <tbody>
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
                                    {{ $pedido->direccion_entrega }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pedido->fecha_pedido->format('d/m/Y H:i') }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg">
                <hr class="mb-4 mt-4">
                <div class="text-center">
                    <h3 class="ml-5">Detalles del pedido</h3>
                </div>
                <hr class="mb-4 mt-4">
                <div class="mt-10 p-6 bg-gray-100 dark:bg-gray-700 rounded-lg">
                    <table class="w-full mb-4 bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="p-2 text-left">Producto</th>
                                <th class="p-2 text-center">Cantidad</th>
                                <th class="p-2 text-right">Precio</th>
                                <th class="p-2 text-right">Subtotal</th>
                                <th class="p-2 text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($pedido->detalles as $item)
                                @php
                                    $subtotal = $item['precio'] * $item['cantidad'];
                                    $total += $subtotal;
                                @endphp
                                <tr class="border-b dark:border-gray-600">
                                    <td class="p-2 flex items-center space-x-2">
                                        <img src="{{ $item->producto->imagen }}" alt="{{ $item->producto->nombre }}"
                                            class="w-16 h-16 object-cover rounded">
                                        <span>{{ $item->producto->nombre }}</span>
                                    </td>
                                    <td class="p-2 text-center">{{ $item->cantidad }}</td>
                                    <td class="p-2 text-right">Q{{ number_format($item->producto->precio, 2) }}</td>
                                    <td class="p-2 text-right">Q{{ number_format($subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p class="text-right font-bold mb-4 text-lg">Total: Q{{ number_format($total, 2) }}</p>
                </div>
                <div class="mt-5 p-6">
                    <a href="{{ route('pedidos.imprimirFactura', $pedido) }}"  target="_blank" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Imprimir Factura
                    </a>
                </div>

            </div>

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
