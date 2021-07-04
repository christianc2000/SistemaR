<?php

use App\Http\Controllers\PlatoController;
use Illuminate\Support\Facades\Route;

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
Route::resource('platos', PlatoController::class);
//Route::get('platos', [PlatoController::class,'index']);
Route::resource('cargos',CargoController::class);
Route::resource('personas',PersonaController::class);
Route::resource('trabajadors',TrabajadorController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//
/*Route::get('/dash/plato',function(){
    return view('plato.index');
});
Route::get('/dash/plato/create', function () {
    return view('plato.create');
});*/
