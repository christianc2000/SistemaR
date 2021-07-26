<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaRequest;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=Producto::all();
        return view('venta.create', compact('productos'));
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
        $ventas->costo = $ventas->costo + $request->get('costo');
        $ventas->llevar = $request->get('llevar');
        $ventas->user_id = auth()->user()->id;
        $ventas->save();

        $detalleventas = new DetalleVenta();
        $detalleventas->cantidad =$request->get('cantidad');
        $detalleventas->costo_prod =$request->get('costo');
        $detalleventas->venta_id =$ventas->id;
        $idProd = explode("_", $request->get('producto'));
        $detalleventas->producto_id =$idProd[0];
        $detalleventas->save();

        $detalleventas=$ventas->detalle_ventas;
        $productos=Producto::all();
        return view('venta.edit', compact('productos', 'ventas', 'detalleventas'));
        // return redirect()->route('ventas.edit', compact('detalleventas'));
        // return route('ventas.edit', $detalleventas);
        // return redirect()->route('ventas.edit', $productos);
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
        return view('venta.show', compact('venta', 'user', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleVenta $detalleVentas)
    {


        $productos=Producto::all();
        return view('venta.edit', compact('productos', 'detalleVentas'));
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
        $productos=Producto::all();
        return view('venta.edit', compact('productos', 'ventas', 'detalleventas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}
