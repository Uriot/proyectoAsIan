<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Compra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg m-5 p-6">

                <form action="{{ route('compras.store') }}" method="POST" id="form-compra">
                    @csrf

                    <div class="mb-5">
                        <label class="block mb-2">Proveedor</label>
                        <select name="proveedor_id" id="proveedor_id" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block mb-2">Sucursal</label>
                        <select name="sucursal_id" id="sucursal_id" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500k">
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- SECCIÓN DE PRODUCTOS --}}
                    <div class="mb-5">
                        <label class="block mb-2">Producto</label>
                        <select id="producto" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" data-nombre="{{ $producto->nombre }}">
                                    {{ $producto->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex gap-2 mb-5">
                        <input type="number" id="cantidad" placeholder="Cantidad" class="w-1/3 rounded shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <input type="number" id="precio" placeholder="Precio" class="w-1/3 rounded shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <button type="button" id="agregar" class="bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-600  text-white px-4 py-2 rounded">
                            Agregar
                        </button>
                    </div>

                    <table class="w-full text-left border mt-3">
                        <thead>
                            <tr class="bg-gray-700">
                                <th class="p-2">Producto</th>
                                <th class="p-2">Cantidad</th>
                                <th class="p-2">Precio</th>
                                <th class="p-2">Subtotal</th>
                                <th class="p-2">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="detalle-productos"></tbody>
                    </table>

                    <div class="text-right mt-4">
                        <strong>Total: Q<span id="total">0.00</span></strong>
                    </div>

                    <button type="submit"
                        class="mt-5 bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded text-white">
                        Guardar Compra
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            let total = 0;

            $('#agregar').on('click', function () {
                const id = $('#producto').val();
                const nombre = $('#producto option:selected').data('nombre');
                const cantidad = parseFloat($('#cantidad').val());
                const precio = parseFloat($('#precio').val());
                const subtotal = cantidad * precio;

                if (!cantidad || !precio) {
                    alert('Completa cantidad y precio');
                    return;
                }

                total += subtotal;
                $('#total').text(total.toFixed(2));

                $('#detalle-productos').append(`
                    <tr>
                        <td>${nombre}<input type="hidden" name="productos[]" value="${id}"></td>
                        <td>${cantidad}<input type="hidden" name="cantidades[]" value="${cantidad}"></td>
                        <td>${precio.toFixed(2)}<input type="hidden" name="precios[]" value="${precio}"></td>
                        <td>${subtotal.toFixed(2)}</td>
                        <td><button type="button" class="eliminar bg-red-600 px-2 rounded text-white">X</button></td>
                    </tr>
                `);

                $('#cantidad').val('');
                $('#precio').val('');
            });

            // Eliminar producto de la tabla
            $(document).on('click', '.eliminar', function () {
                const fila = $(this).closest('tr');
                const subtotal = parseFloat(fila.find('td').eq(3).text());
                total -= subtotal;
                $('#total').text(total.toFixed(2));
                fila.remove();
            });
        </script>
    @endpush
</x-app-layout>
