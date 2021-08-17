<?php

namespace App\Http\Controllers;
use Spatie\Activitylog\Models\Activity;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\detalle_producto;

class DetalleProductoController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth');
    //     $this->middleware('can:detalleProductos.index')->only('index');
    //     $this->middleware('can:detalleProductos.create')->only('create', 'store');
    //     $this->middleware('can:detalleProductos.edit')->only('edit', 'update');
    //     $this->middleware('can:detalleProductos.destroy')->only('destroy');
    // }

    public function index()
    {
        $detalle_p = detalle_producto::all();
        $producto =Producto::all();
        return view('detalleProducto.index',compact('detalle_p', 'producto'));
    }

    public function create()
    {
        $producto= Producto::all();
        return view('detalleProducto.create', compact('producto'));
    }

    public function store(Request $request)
    {   try{
        $producto=Producto::find($request->get('productoContenedor'));
        $cantidad=$request->get('cantidad');
        $producto->productos()->attach($request->get('productoContenido'),compact('cantidad'));
        }catch (\Throwable $th) {
            
        $producto =Producto::all();
        return view('detalleProducto.create', compact('producto'));
    }
        activity()->useLog('Detalle Producto')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = detalle_producto::all()->last()->id;
        $lastActivity->save();

        return redirect()->route('detalleProductos.index');
    }

    public function edit(detalle_producto $detalle)
    {  
        $producto =Producto::all();
        return view('detalleProducto.edit',compact('detalle','producto'));
    }

    public function update(Request $request)
    {   
        try{
        $producto=Producto::find($request->get('productoContenedor'));
        $cantidad=$request->get('cantidad');
        $producto->productos()->attach($request->get('productoContenido'),compact('cantidad'));
        }catch (\Throwable $th) {
            
        $producto =Producto::all();
        return view('detalleProducto.create', compact('producto'));
    }

    activity()->useLog('Detalle Producto')->log('Editado')->subject();
    $lastActivity = Activity::all()->last();
    $lastActivity->subject_id = detalle_producto::all()->last()->id;
    $lastActivity->save();
        return redirect()->route('detalleProductos.index');
    }

    public function destroy(detalle_producto $detalle)
    {
        activity()->useLog('Detalle Producto')->log('Eliminado')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = detalle_producto::all()->last()->id;
        $lastActivity->save();
        return redirect()->route('detalleProductos.index');
    }

}