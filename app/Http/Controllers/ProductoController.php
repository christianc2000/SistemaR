<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\UnidadMedida;//para pedir datos de la tabla unidad de medida
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $productos= Producto::all();
        $unidadMedidas= UnidadMedida::all();//le paso los datos de la tabla unidadMedidas
        return view('productoCompra.index',compact('productos', 'unidadMedidas'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('productoCompra.create');
        $unidadMedidas= UnidadMedida::all();//le paso los datos de la tabla unidadMedidas
        return view('productoCompra.create',compact('unidadMedidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos= new Producto();
        $productos->id=$request->get('id');
        $productos->nombre=$request->get('nombre');
        $productos->tipo_compra='1';
        $productos->codigo=$request->get('codigo');
        $productos->save();
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productoCompra.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([//para validar los inputs, y mostrar mensaje
            'id'=>'required',
            'nombre'=>'required',
            'codigo'=>'required'
        ]);

       $producto->update($request->all());
       return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
