<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __($producto->nombre) }}
            </h2>
            <a href="{{ route('carrito.index') }}" class="text-blue-600 hover:underline">
                Ver carrito 🛍️ ({{ session('carrito') ? count(session('carrito')) : 0 }})
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 text-white overflow-hidden shadow-xl sm:rounded-lg m-5 p-6">
                <div class="flex flex-col items-center">
                    <img id="imagenPrincipal" src="{{ $producto->imagen }}"
                        class="rounded-lg w-80 h-80 object-cover shadow-md" alt="Producto">
                </div>

                {{-- Información del producto --}}
                <div>

                    <h1 class="text-xl text-white font-bold text-gray-800 leading-snug">
                        {{ $producto->descripcion }}
                    </h1>

                    {{-- Precio --}}
                    <div class="mt-4 p-4 bg-orange-50 border border-orange-200 rounded-lg">
                        <div class="flex justify-between">
                            <span class="text-gray-600 text-sm">Precio</span>
                            <span class="text-gray-700 font-bold text-lg">{{ $producto->precio_venta }}</span>
                        </div>
                    </div>

                    {{-- Botón de compra --}}
                    <div class="mt-5">
                        <form method="POST" action="{{ route('carrito.agregar') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $producto['id'] }}">
                                <input type="hidden" name="nombre" value="{{ $producto['nombre'] }}">
                                <input type="hidden" name="precio" value="{{ $producto['precio_venta'] }}">
                                <input type="hidden" name="imagen" value="{{ $producto['imagen'] }}">
                                <button
                                    type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Agregar al carrito
                                </button>
                            </form>
                    </div>

                    {{-- Detalles --}}
                    <div class="mt-6 text-sm text-gray-700 space-y-1">
                        <p>📅 6 Meses de garantía</p>
                    </div>

                    {{-- Disponibilidad --}}
                    <div class="mt-8">
                        <h3 class="text-base font-semibold mb-2">Disponibilidad</h3>
                        <ul class="divide-y divide-gray-200 text-sm">
                            @foreach ($producto->inventarios as $inventario)
                                <li class="py-1 flex justify-between">
                                    <span>{{ $inventario->sucursal->nombre }}</span>
                                    <span class="text-gray-600">{{ $inventario->cantidad_actual }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
</x-app-layout>
