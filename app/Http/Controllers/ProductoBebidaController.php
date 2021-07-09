<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\UnidadMedida;//para pedir datos de la tabla unidad de medida

use Illuminate\Http\Request;

class ProductoBebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productosBebidas= Producto::all();
        $unidadMedidas= UnidadMedida::all();//le paso los datos de la tabla unidadMedidas
        return view('productoBebida.index',compact('productosBebidas', 'unidadMedidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidadMedidas= UnidadMedida::all();//le paso los datos de la tabla unidadMedidas
        return view('productoBebida.create',compact('unidadMedidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productosBebidas= new Producto();
        $productosBebidas->id=$request->get('id');
        $productosBebidas->nombre=$request->get('nombre');
        $productosBebidas->tipo_menu=1;
        $productosBebidas->tipo_char='B';
        $productosBebidas->precio=$request->get('precio');
        $productosBebidas->codigo=$request->get('codigo');
        $productosBebidas->save();
        return redirect()->route('productosBebidas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $productosBebida)
    {
        return view('productoBebida.edit',compact('productosBebida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Producto $productosBebida)
    {
        $request->validate([//para validar los inputs, y mostrar mensaje
            'id'=>'required',
            'nombre'=>'required',
            'precio'=>'required',
            'codigo'=>'required'
        ]);

       $productosBebida->update($request->all());
       return redirect()->route('productosBebidas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $productosBebida)
    {
        $productosBebida->delete();
        return redirect()->route('productosBebidas.index');
    }
}
