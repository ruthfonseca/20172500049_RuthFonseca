<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DatalleFacturaController;

//clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::post('/clientes/buscar', [ClienteController::class, 'buscar'])->name('clientes.buscar');

Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

Route::post('/clientes/guardar', [ClienteController::class, 'store'])->name('cliente.guardar');

Route::get('/clientes/{id}/editar', [ClienteController::class, 'edit'])->name('clientes.edit')->where('id','[0-9]+');
Route::post('/clientes/{id}/editar', [ClienteController::class, 'update'])->name('clientes.update')->where('id','[0-9]+');

Route::delete('/clientes/{id}/eliminar', [ClienteController::class, 'destroy'])->name('clientes.borrar')->where('id','[0-9]+');


//proveedores
Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores.index');
Route::post('/proveedores/buscar', [ProveedoresController::class, 'buscar'])->name('proveedores.buscar');

Route::get('/proveedores/{id}', [ProveedoresController::class, 'show'])->name('proveedores.mostrar');

Route::get('/proveedor/crear', [ProveedoresController::class, 'crear'])->name('proveedor.crear');
Route::post('/proveedores/guardar', [ProveedoresController::class, 'store'])->name('proveedores.guardar');

Route::get('/proveedores/{id}/editar', [ProveedoresController::class, 'edit'])->name('proveedores.edit')->where('id','[0-9]+');
Route::post('/proveedores/{id}/editar', [ProveedoresController::class, 'update'])->name('proveedores.update')->where('id','[0-9]+');

Route::delete('/proveedores/{id}/eliminar', [ProveedoresController::class, 'destroy'])->name('proveedores.borrar')->where('id','[0-9]+');




//productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class, 'index'])->name('productos.index');

Route::get('/productos/nuevo/{id}', [ProductoController::class, 'nuevo'])->name('productos.nuevo');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.mostrar');

Route::post('/productos/guardar', [ProductoController::class, 'store'])->name('productos.guardar');

Route::get('/productos/{id}/editar', [ProductoController::class, 'edit'])->name('productos.edit')->where('id','[0-9]+');
Route::post('/productos/{id}/editar', [ProductoController::class, 'update'])->name('productos.update')->where('id','[0-9]+');

Route::post('/productos/{id}/eliminar', [ProductoController::class, 'destroy'])->name('productos.borrar')->where('id','[0-9]+');


//compras
Route::get('/compras', [VentaController::class, 'index'])->name('compras.index');
Route::get('/compras/crear', [VentaController::class, 'crear'])->name('compras.crear');
Route::post('/compras/guardar', [VentaController::class, 'store'])->name('compras.guardar'); 
Route::delete('/compras/{id}/eliminar', [VentaController::class, 'destroy'])->name('compras.borrar')->where('id','[0-9]+');


//destalles factura
Route::get('/facturas/{id}', [DatalleFacturaController::class, 'show'])->name('facturas.index'); 
Route::post('/facturas/eliminar', [DatalleFacturaController::class, 'destroy'])->name('facturas.borrar')->where('id','[0-9]+');

