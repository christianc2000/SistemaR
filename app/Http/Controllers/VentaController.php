<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaRequest;
use App\Models\cliente;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('venta.index', compact('ventas'));

    }
    public function iprimir(){
        //dd("hola");
        $ventas = Venta::all();
        $pdf=\PDF::loadview('reporte.venta',compact('ventas'));
    return $pdf ->download('venta.pdf');
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=Producto::all();
        $clientes=cliente::all();
        return view('venta.create', compact('productos', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaRequest $request)
    {
        // return $request;
        $ventas = new Venta();
        // $costos=$request->get('costo');
        // $ventas->costo = $request->get('costo');
        $ventas->llevar = $request->get('llevar');
        $ventas->user_id = auth()->user()->id;
        $ventas->costo = $ventas->costo + $request->get('costo');
        if($request->get('cliente')!='xxxxxxxxxxx'){
            $ventas->cliente_id=$request->get('cliente');
        }
        $ventas->save();

        $detalleventas = new DetalleVenta();
        $detalleventas->cantidad =$request->get('cantidad');
        $detalleventas->costo_prod =$request->get('costo');
        $detalleventas->venta_id =$ventas->id;
        $idProd = explode("_", $request->get('producto'));
        $detalleventas->producto_id =$idProd[0];
        $detalleventas->save();

        $id = $ventas->id;
        return redirect()->route('ventas.edit', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    { 
        $productos=Producto::all();
        $user=User::find($venta->user_id);
        $cliente=cliente::find($venta->cliente_id);
        return view('venta.show', compact('venta', 'user', 'productos', 'cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventas=Venta::find($id);
        $productos=Producto::all();
        $detalleventas=$ventas->detalle_ventas;
        return view('venta.edit', compact('ventas', 'productos', 'detalleventas'));
        // return view('venta.edit', compact('productos', 'detalleVentas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VentaRequest $request, $id)
    {

        $ventas=Venta::find($id);
        $ventas->llevar = $request->get('llevar');
        $ventas->costo=$ventas->costo + $request->get('costo');
        $ventas->save();
        $detalleventas = new DetalleVenta();
        $detalleventas->cantidad =$request->get('cantidad');
        $detalleventas->costo_prod =$request->get('costo');
        $detalleventas->venta_id =$ventas->id;
        $idProd = explode("_", $request->get('producto'));
        $detalleventas->producto_id =$idProd[0];
        $detalleventas->save();

        $detalleventas=$ventas->detalle_ventas;
        $id = $ventas->id;
        return redirect()->route('ventas.edit', $id);
        // return view('venta.edit', compact('productos', 'ventas', 'detalleventas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta=Venta::find($id);
        $detalleventas=$venta->detalle_ventas;
        foreach ($detalleventas as $detalleventa) {
            $detalleventa->delete();
        }
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}
