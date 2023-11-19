<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['web'])->group(function(){
    Route::get('/index', [WelcomeController::class, 'index'])->name("index");

    Route::get('/register', [RegisterController::class, 'show']);
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/login', [LoginController::class, 'login']);
});


Route::group(['middleware' => 'auth'], function () {

    Route::middleware(['admin'])->prefix('/admin')->group(function (){

        Route::get('index', [AdminController::class, 'index'])->name('admin.index');

        //Productos
        Route::prefix('product')->group(function (){
            Route::get('/productos', [ProductoController::class, 'ShowProductos'])->name('productos');
            Route::get('/{id}/edit', [ProductoController::class, 'edit'])->name('product.edit');

            Route::get('/add', [ProductoController::class, 'ShowAddForm'])->name('product.add');
            Route::post('/add', [ProductoController::class, 'Add'])->name('product.add');

            Route::put('/update}', [ProductoController::class, 'update'])->name('product.update');
            Route::delete('/{id}', [ProductoController::class, 'destroy'])->name('product.destroy');
        });
        // //Servicio
        Route::prefix('service')->group(function (){
            Route::get('/servicios', [ServiceController::class, 'ShowServicios'])->name('servicios');
            Route::get('/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');

            Route::get('/add', [ServiceController::class, 'ShowAddForm'])->name('service.add');
            Route::post('/add', [ServiceController::class, 'Add'])->name('service.add');

            Route::put('/update}', [ServiceController::class, 'update'])->name('service.update');
            Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
        });
        Route::prefix('users')->group(function (){
            Route::get('/users', [UsersController::class, 'ShowUsers'])->name('users');
            Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');

            Route::get('/add', [UsersController::class, 'ShowAddForm'])->name('users.add');
            Route::post('/add', [UsersController::class, 'Add'])->name('users.add');

            Route::put('/update}', [UsersController::class, 'update'])->name('users.update');
            Route::delete('/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
        });

    });

    Route::middleware(['client'])->prefix('client')->group(function (){
        Route::get('index', [ClienteController::class, 'ShowCatalogo'])->name('client.index');
        Route::post('index', [ClienteController::class, 'ShowCatalogoConId'])->name('client.indexid');

        Route::prefix('product')->group(function (){
            Route::get('{id_producto}', [ClienteController::class, 'ShowProduct'])->name('client.product');
            Route::get('{id_orden}/{id_producto}', [ClienteController::class, 'ShowProductIdOrder'])->name('client.productidorder');
            Route::post('add', [OrdenController::class, 'AddProductToOrden'])->name('client.product.add');
            Route::delete('/{id}', [PriceController::class, 'destroy_producto'])->name('client.product.destroy');
        });
        //ordenes
        Route::prefix('price')->group(function(){
            Route::get('/', [PriceController::class, 'ShowPrice'])->name('client.price');
            Route::get('details', [PriceController::class, 'ShowDetailsOrder'])->name('client.price.details');
            Route::get('add', [PriceController::class, 'ShowAddPrice'])->name('client.price.add');
            Route::post('add', [PriceController::class, 'create_orden'])->name('client.price.add');
            Route::delete('/{id}', [PriceController::class, 'destroy_orden'])->name('client.price.destroy');
            Route::post('finalize', [PriceController::class, 'finalize_orden'])->name('client.price.finalize');
            Route::get('factura/{id_orden}', [PriceController::class, 'GenerarFactura'])->name('client.price.factura');
        });
    });
});
