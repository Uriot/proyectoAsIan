<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Compras') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="" method="GET" class="m-5 inline-flex items-center space-x-2">

                    <label for="proveedores" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        proveedor</label>
                    <select id="proveedores"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>

                    <label for="sucursales" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Sucursal</label>
                    <select id="sucursales"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($sucursales as $sucursal)
                            <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                        @endforeach
                    </select>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Buscar
                    </button>

                    <a href="{{ route('compras.create') }}"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Nueva compra
                    </a>
                </form>



                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Proveedor
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sucursal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    fecha_compra
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4">
                                        {{ $compra->id }}
                                    </th>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $compra->proveedor->nombre }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $compra->sucursal->nombre }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $compra->fecha_compra }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $compra->total }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a  href="{{ route('compras.show', $compra) }}">
                                            ver Detalles
                                        </a>
                                        <a href="{{ route('compras.edit', $compra) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($compras->count() <= 0)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <td colspan="6"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        No se encontraron compras.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-4 p-2">
                        {{ $compras->links() }}
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
            $(document).ready(function() {
                $('#proveedores').select2();
            });

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
