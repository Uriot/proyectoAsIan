<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100">
                🛒 Catálogo de Productos
            </h2>
            <a href="{{ route('carrito.index') }}" class="text-blue-600 hover:underline">
                Ver carrito 🛍️
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @php
                    $productos = [
                        [
                            'nombre' => 'Audifono Inalambrico Para Gamers Marca Logitech Modelo Astro A30 Lightspeed Color Blanco Con Gris Para PlayStation y PC',
                            'precio' => 1650,
                            'imagen' => 'https://img.pacifiko.com/PROD/resize/1/500x500/Nzk2MjI5NT.jpg',
                        ],
                        [
                            'nombre' => 'Audifono Inalambrico Para Gamers Marca Logitech Modelo Astro A30 Lightspeed Color Azul con Rojo Para PlayStation y PC',
                            'precio' => 1536,
                            'imagen' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0UBwoqMcwOA9ribFFVd_-mebGXECZWdX5Ig&s',
                        ],
                        [
                            'nombre' => 'Audifono Inalambrico Para Gamers Marca Logitech Modelo Astro A30 Lightspeed Color Azul con Rojo Para Xbox y PC',
                            'precio' => 1833,
                            'imagen' => 'https://www.shopper.com.gt/wp-content/uploads/2022/12/39-Audifono-G-Astro-A30-LIGHTSPEED-Wireless-Gaming-Headset-Bluetooth-LIGHTSPEED-conector-de-35mm-azul-Logitech.jpg',
                        ],
                        [
                            'nombre' => 'Teclado Mecánico Redragon',
                            'precio' => 699,
                            'imagen' => 'https://cdn.pixabay.com/photo/2017/08/10/03/37/keyboard-2618109_1280.jpg',
                        ],
                        [
                            'nombre' => 'SSD Kingston 1TB',
                            'precio' => 1199,
                            'imagen' => 'https://cdn.pixabay.com/photo/2017/02/09/22/49/hard-drive-2057560_1280.jpg',
                        ],
                    ];
                @endphp

                @foreach ($productos as $producto)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="w-full h-48 object-cover">
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">
                                {{ $producto['nombre'] }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                Q{{ number_format($producto['precio'], 2) }}
                            </p>

                            <form method="POST" action="{{ route('carrito.agregar') }}">
                                @csrf
                                <input type="hidden" name="nombre" value="{{ $producto['nombre'] }}">
                                <input type="hidden" name="precio" value="{{ $producto['precio'] }}">
                                <input type="hidden" name="imagen" value="{{ $producto['imagen'] }}">
                                <button
                                    type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                                    Agregar al carrito
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carrito -->
            @if(session('carrito') && count(session('carrito')) > 0)
                <div class="mt-10 p-6 bg-gray-100 dark:bg-gray-700 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">🛒 Tu carrito</h2>

                    <table class="w-full mb-4">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach(session('carrito') as $item)
                                @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                                <tr>
                                    <td>{{ $item['nombre'] }}</td>
                                    <td>{{ $item['cantidad'] }}</td>
                                    <td>Q{{ $item['precio'] }}</td>
                                    <td>Q{{ $subtotal }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('carrito.eliminar', $item['nombre']) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded-lg">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p class="text-right font-bold mb-4">Total: Q{{ $total }}</p>

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

                    <!-- Sección de métodos de pago -->
                    <div id="metodoPago" class="hidden mt-4 p-4 bg-white dark:bg-gray-800 rounded-lg">
                        <h3 class="font-semibold mb-2">Selecciona método de pago</h3>
                        <form method="POST" action="{{ route('carrito.pagar') }}">
                            @csrf
                            <label class="block mb-2">
                                <input type="radio" name="metodo_pago" value="tarjeta" required>
                                Tarjeta de crédito/débito
                            </label>
                            <label class="block mb-2">
                                <input type="radio" name="metodo_pago" value="paypal">
                                PayPal
                            </label>
                            <label class="block mb-2">
                                <input type="radio" name="metodo_pago" value="efectivo">
                                Efectivo
                            </label>

                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg mt-2">
                                Confirmar Pago
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
