<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\detalle_producto;

class DetalleProductoController extends Controller
{
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
        return redirect()->route('detalleProductos.index');
    }

    public function destroy(detalle_producto $detalle)
    {
       
        return redirect()->route('detalleProductos.index');
    }

}