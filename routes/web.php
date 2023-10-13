<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/register', function () {
    return view('auth.register');
});*/


Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register']);

/*Route::get('/login', function () {
    return view('auth.login');
});*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/login', [LoginController::class, 'login']);

Route::prefix('admin')->middleware('auth')->group(function (){

    Route::get('index', [AdminController::class, 'index'])->name('admin');

    //Productos
    Route::get('product/productos', [ProductoController::class, 'ShowProductos'])->name('productos');
    Route::get('product/{id}/edit', [ProductoController::class, 'edit'])->name('product.edit');

    Route::get('product/add', [ProductoController::class, 'ShowAddForm'])->name('product.add');
    Route::post('product/add', [ProductoController::class, 'Add'])->name('product.add');

    Route::put('/product/update}', [ProductoController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductoController::class, 'destroy'])->name('product.destroy');

    //Servicio
    Route::get('service/servicios', [ServiceController::class, 'ShowServicios'])->name('servicios');
    Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');

    Route::get('service/add', [ServiceController::class, 'ShowAddForm'])->name('service.add');
    Route::post('service/add', [ServiceController::class, 'Add'])->name('service.add');

    Route::put('/service/update}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

});

/*Route::get('/admin', function () {
    return view('admin.index');
})->name('admin')->middleware('auth');*/
