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
});
Route::resource('platos', PlatoController::class);
//Route::get('platos', [PlatoController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash.index');
})->name('dash');

//
/*Route::get('/dash/plato',function(){
    return view('plato.index');
});
Route::get('/dash/plato/create', function () {
    return view('plato.create');
});*/
