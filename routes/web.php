<?php

use App\Http\Controllers\PlatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\ProveedorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
 return view('auth.login');
 //return view('welcome');
});
Route::resource('productos', ProductoController::class);
Route::resource('encargados', EncargadoController::class);
Route::resource('proveedors', ProveedorController::class);
Route::resource('unidadMedidas', UnidadMedidaController::class);
Route::resource('cargos', CargoController::class);
Route::resource('trabajadors', TrabajadorController::class);
//Route::get('platos', [PlatoController::class,'index']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash.index');
})->name('dashboard');

//
/*Route::get('/dash/plato',function(){
    return view('plato.index');
});
Route::get('/dash/plato/create', function () {
    return view('plato.create');
});*/
