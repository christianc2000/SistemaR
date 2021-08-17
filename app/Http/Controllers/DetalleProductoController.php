<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\detalle_producto;
use PDF;
use App\Models\DetalleProduct;
use Illuminate\Support\Facades\Auth;

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
        $detalle_p = DetalleProduct::all();
        $producto =Producto::all();
       
        return view('detalleProducto.index',compact('detalle_p','producto'));
    }
    public function iprimir(){
        //dd("hola");
        $detalle_p= detalle_producto::all();
        $producto =Producto::all();
        $pdf=\PDF::loadview('reporte.detalle_producto',compact('detalle_p','producto'));
    return $pdf ->download('detalle_producto.pdf');
    
    }
    public function create()
    {
        $producto= Producto::all();
        return view('detalleProducto.create', compact('producto'));
    }

    public function store(Request $request)
    {   
        
        $id_A=$request->get('productoContenedor');
        $id_B=$request->get('productoContenido');
        if (DetalleProduct::noExiste($id_A,$id_B)){
            $detalle=new DetalleProduct;
            $detalle->cantidad=$request->get('cantidad');
            $detalle->producto_A_id=$id_A;
            $detalle->producto_B_id=$id_B;
            $detalle->save();      

            activity()->useLog('Detalle Producto')->log('Nuevo')->subject();
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = DetalleProduct::all()->last()->id;
            $lastActivity->save();

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

        activity()->useLog('Detalle Producto')->log('Editado')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = DetalleProduct::all()->last()->id;
        $lastActivity->save();

        return redirect()->route('detalleProductos.index');
    }

    public function destroy(DetalleProduct $detalleProducto)
    {
        
        activity()->useLog('Detalle Producto')->log('Eliminado')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = DetalleProduct::all()->last()->id;
        $lastActivity->save();

       $detalleProducto->delete();
      //  $usuario = Auth::user();
      return redirect()->route('detalleProductos.index');

    }

}