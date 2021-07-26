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
    {   

        return redirect()->route('detalleProductos.index');
    }

    public function edit(Producto $producto)
    {  
        $unidadMedidas= UnidadMedida::all();
        return view('detalleProducto.edit',compact('producto','unidadMedidas'));
    }

    public function update(Request $request,Producto $productosPlato)
    {


       return redirect()->route('detalleProductos.index');
    }

    public function destroy(Producto $productosPlato)
    {

        return redirect()->route('detalleProductos.index');
    }

}