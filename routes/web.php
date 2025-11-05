<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComprasController;
use App\Models\Producto;
use App\Models\SubcategoriaProducto;
use Psy\Sudo;

// Página principal (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas (solo usuarios autenticados)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Página principal después de iniciar sesión (catálogo)
    Route::get('/dashboard', function () {

        $query = Producto::query();


        if ($subcategoria_id = request('id')) {
            $query->whereHas('subcategorias', function ($q) use ($subcategoria_id) {
                $q->where('subcategorias.id', $subcategoria_id);
            });
        }
        //dd( $query->toSql());
        //dd(SubcategoriaProducto::all());
        //dd(SubcategoriaProducto::where('subcategoria_id', request('id'))->get());
        $productos = $query->paginate(9);

        return view('dashboard', compact('productos'));
    })->name('dashboard');

    // 📦 RUTAS DEL CARRITO
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
    Route::post('/carrito/pagar', [CarritoController::class, 'pagar'])->name('carrito.pagar');
    Route::post('/carrito/pagar', [CarritoController::class, 'pagar'])->name('carrito.pagar');
    Route::post('/carrito/eliminar/{nombre}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

    // Rutas Cliente

    Route::post('/cliente/createorupdate', [ClienteController::class, 'createOrUpdate'])->name('cliente.createorupdate');

    // 🔒 RUTAS DE PERMISOS
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('permissions/{permission}', [PermissionController::class, 'show'])->name('permissions.show');
    Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    // Rutas de mis Pedidos
    Route::get('misPedidos', [PedidoController::class, 'misPedidos'])->name('misPedidos.index');
    Route::get('misPedidos/{pedido}', [PedidoController::class, 'verMiPedido'])->name('misPedidos.view');
    Route::get('pedidos/{pedido}/imprimirFactura', [PedidoController::class, 'imprimirFactura'])->name('pedidos.imprimirFactura');

    // Rutas de Productos
    Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');

    // Rutas de Compras
    Route::get('compras', [ComprasController::class, 'index'])->name('compras.index');
    Route::get('compras/create', [ComprasController::class, 'create'])->name('compras.create');
    Route::post('compras/store', [ComprasController::class, 'store'])->name('compras.store');
    Route::get('compras/{compra}', [ComprasController::class, 'show'])->name('compras.show');
    Route::get('compras/{compra}/edit', [ComprasController::class, 'edit'])->name('compras.edit');
});
