<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100">
                🛍️ Carrito de Compras
            </h2>
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">← Volver al catálogo</a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Carrito -->
            @if(session('carrito') && count(session('carrito')) > 0)
                <div class="mt-10 p-6 bg-gray-100 dark:bg-gray-700 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">🛒 Tu carrito</h2>

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
                            @foreach(session('carrito') as $item)
                                @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                                <tr class="border-b dark:border-gray-600">
                                    <td class="p-2 flex items-center space-x-2">
                                        <img src="{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}" class="w-16 h-16 object-cover rounded">
                                        <span>{{ $item['nombre'] }}</span>
                                    </td>
                                    <td class="p-2 text-center">{{ $item['cantidad'] }}</td>
                                    <td class="p-2 text-right">Q{{ number_format($item['precio'],2) }}</td>
                                    <td class="p-2 text-right">Q{{ number_format($subtotal,2) }}</td>
                                    <td class="p-2 text-center">
                                        <form method="POST" action="{{ route('carrito.eliminar', $item['nombre']) }}">
                                            @csrf
                                            <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded-lg">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p class="text-right font-bold mb-4 text-lg">Total: Q{{ number_format($total,2) }}</p>

                    <div class="flex space-x-4">
                        <form method="POST" action="{{ route('carrito.vaciar') }}">
                            @csrf
                            <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg">
                                Vaciar carrito
                            </button>
                        </form>

                        <button
                            onclick="document.getElementById('metodoPago').classList.toggle('hidden')"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg"
                        >
                            Pagar Orden
                        </button>
                    </div>

                    <!-- Sección de métodos de pago con resumen del carrito -->
                    <div id="metodoPago" class="hidden mt-6 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                        <h3 class="font-semibold mb-2 text-lg">Resumen de tu compra</h3>

                        <div class="space-y-2 mb-4">
                            @foreach(session('carrito') as $item)
                                <div class="flex items-center justify-between bg-gray-50 dark:bg-gray-700 p-2 rounded">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}" class="w-12 h-12 object-cover rounded">
                                        <span>{{ $item['nombre'] }} x {{ $item['cantidad'] }}</span>
                                    </div>
                                    <span class="font-semibold">Q{{ number_format($item['precio'] * $item['cantidad'],2) }}</span>
                                </div>
                            @endforeach
                        </div>

                        <p class="text-right font-bold mb-4 text-lg">Total: Q{{ number_format($total,2) }}</p>

                        <h3 class="font-semibold mb-2">Selecciona método de pago</h3>
                        <form method="POST" action="{{ route('carrito.pagar') }}">
                            @csrf

                            <label class="block mb-2">
                                <input type="radio" name="metodo_pago" value="tarjeta" required onclick="mostrarCampos('tarjeta')">
                                Tarjeta de crédito/débito
                            </label>
                            <label class="block mb-2">
                                <input type="radio" name="metodo_pago" value="paypal" onclick="mostrarCampos('paypal')">
                                PayPal
                            </label>
                            <label class="block mb-2">
                                <input type="radio" name="metodo_pago" value="efectivo" onclick="mostrarCampos('efectivo')">
                                Efectivo
                            </label>

                            <div id="camposTarjeta" class="hidden mt-2">
                                <label class="block mb-1">Nombre en la tarjeta</label>
                                <input type="text" name="nombre_tarjeta" class="w-full p-2 border rounded mb-2" placeholder="Juan Perez">
                                <label class="block mb-1">Número de tarjeta</label>
                                <input type="text" name="numero_tarjeta" class="w-full p-2 border rounded mb-2" placeholder="1234 5678 9012 3456">
                                <div class="flex space-x-2">
                                    <input type="text" name="expiracion" class="w-1/2 p-2 border rounded" placeholder="MM/AA">
                                    <input type="text" name="cvv" class="w-1/2 p-2 border rounded" placeholder="CVV">
                                </div>
                            </div>

                            <div id="camposPayPal" class="hidden mt-2">
                                <label class="block mb-1">Correo de PayPal</label>
                                <input type="email" name="email" class="w-full p-2 border rounded" placeholder="correo@paypal.com">
                            </div>

                            <div id="camposEfectivo" class="hidden mt-2">
                                <p>Pagarás en efectivo al momento de la entrega 💵</p>
                            </div>

                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg mt-2">
                                Confirmar Pago
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function mostrarCampos(metodo) {
            document.getElementById('camposTarjeta').classList.add('hidden');
            document.getElementById('camposPayPal').classList.add('hidden');
            document.getElementById('camposEfectivo').classList.add('hidden');

            if(metodo === 'tarjeta') document.getElementById('camposTarjeta').classList.remove('hidden');
            if(metodo === 'paypal') document.getElementById('camposPayPal').classList.remove('hidden');
            if(metodo === 'efectivo') document.getElementById('camposEfectivo').classList.remove('hidden');
        }
    </script>
</x-app-layout>
