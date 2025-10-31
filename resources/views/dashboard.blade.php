<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100">
                🛒 Catálogo de Productos
            </h2>
            <a href="{{ route('carrito.index') }}" class="text-blue-600 hover:underline">
                Ver carrito 🛍️ ({{ session('carrito') ? count(session('carrito')) : 0 }})
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">


                @foreach ($productos as $producto)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="w-full h-48 object-cover">
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">
                                {{ $producto['nombre'] }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                Q{{ number_format($producto['precio_venta'], 2) }}
                            </p>

                            <form method="POST" action="{{ route('carrito.agregar') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $producto['id'] }}">
                                <input type="hidden" name="nombre" value="{{ $producto['nombre'] }}">
                                <input type="hidden" name="precio" value="{{ $producto['precio_venta'] }}">
                                <input type="hidden" name="imagen" value="{{ $producto['imagen'] }}">
                                <a href="{{ route('productos.show', $producto) }}"
                                    type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Ver Producto
                                </a>
                                <button
                                    type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Agregar al carrito
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-2">
                {{ $productos->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
