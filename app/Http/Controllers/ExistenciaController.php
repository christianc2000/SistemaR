<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExistenciaController extends Controller
{

/*    public function index()
    {
        $detalle_p = DetalleProduct::all();
        $producto =Producto::all();
       
        return view('detalleProducto.index',compact('detalle_p','producto'));
    }

    public function create()
    {
        $producto= Producto::all();
        return view('detalleProducto.create', compact('producto'));
    }

    public function store(Request $request)
    {   $id_A=$request->get('productoContenedor');
        $id_B=$request->get('productoContenido');
        if (DetalleProduct::noExiste($id_A,$id_B)){
            $detalle=new DetalleProduct;
            $detalle->cantidad=$request->get('cantidad');
            $detalle->producto_A_id=$id_A;
            $detalle->producto_B_id=$id_B;
            $detalle->save();      
            return redirect()->route('detalleProductos.index');
        }else{
        
        $producto= Producto::all();
        $error= true;
        return view('detalleProducto.create', compact('producto','error'));

        }
    
       
    }

    public function edit(DetalleProduct $detalleProducto)
    {  
        $detalle= $detalleProducto;
        $producto =Producto::all();
        return view('detalleProducto.edit',compact('detalle','producto'));
    }

    public function update(Request $request,DetalleProduct $detalleProducto)
    {   
        $cantidad=$request->get('cantidad');
        $detalleProducto->cantidad = $cantidad;
        $detalleProducto->save();

        return redirect()->route('detalleProductos.index');
    }

    public function destroy(DetalleProduct $detalleProducto)
    {
       $detalleProducto->delete();
      //  $usuario = Auth::user();
      return redirect()->route('detalleProductos.index');

    }*/
}
