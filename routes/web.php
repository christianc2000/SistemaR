<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\carroVentaController;
use App\Http\Controllers\PlatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\ProductoBebidaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoPlatoController;
use App\Http\Controllers\ProductoPresaController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetalleProductoController;
use App\Http\Controllers\Nota_de_CompraController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\VentaController;


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
 ////return view('welcome');
});

//Route::get('/reporteventa-pdf'.'App\Http\Controllers\VentaController@imprimir');
//Route::get('/reporteventa-pdf'.'VentaController@imprimir');
//Route::get('/reporteventa-pdf',VentaController::class);
Route::get('/reporteventa-pdf', [VentaController::class, 'iprimir']);

Route::get('/reportecompra-pdf', [Nota_de_CompraController::class, 'iprimir']);

Route::group(['middleware'=>'auth'], function(){//si no esta logueado me manda a loguearme
    
    Route::resource('cliente', ClienteController::class);
    Route::resource('cargos', CargoController::class);
    
    Route::resource('productosPlatos', ProductoPlatoController::class);
    Route::resource('detalleProductos', DetalleProductoController::class);
    
    Route::resource('encargados', EncargadoController::class);
    Route::resource('proveedors', ProveedorController::class);
    Route::resource('unidadMedidas', UnidadMedidaController::class);
    Route::resource('detalleVentas', DetalleVentaController::class);
    Route::resource('ventas', VentaController::class);
    Route::get('ventas/carrito/{id}', [carroVentaController::class, 'eliminar']);
    Route::get('ventas/eliminaDetalle/{id}', [carroVentaController::class, 'eliminarDetalleVenta']);
    
    
    Route::resource('users', UserController::class);//usuarios
    Route::resource('roles', RoleController::class);//roles

    Route::resource('trabajadors', TrabajadorController::class);
    Route::resource('Nota_de_compras', Nota_de_CompraController::class);
});


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

