<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\UnidadMedida;

use Illuminate\Http\Request;

class ProductoPlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productosPlatos= Producto::all();
        $unidadMedidas= UnidadMedida::all();//le paso los datos de la tabla unidadMedidas
        return view('productoPlato.index',compact('productosPlatos', 'unidadMedidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidadMedidas= UnidadMedida::all();
        return view('productoPlato.create', compact('unidadMedidas'));
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   


        $productosPlatos= new Producto();

        $productosPlatos->nombre=$request->get('nombre');
        $productosPlatos->tipo_menu=$request->get('usoProducto');
        if ($request->get('tipoProducto')!='NULL'){
        $productosPlatos->tipo_char=$request->get('tipoProducto');
        }
        $productosPlatos->precio=$request->get('precio');
        $productosPlatos->codigo=$request->get('codigo');
        $productosPlatos->save();

         
        return redirect()->route('productosPlatos.index');
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
    public function edit(Producto $productosPlato)
    {  
        $unidadMedidas= UnidadMedida::all();
        return view('productoPlato.edit',compact('productosPlato,unidadMedidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Producto $productosPlato)
    {
        $request->validate([//para validar los inputs, y mostrar mensaje
            'id'=>'required',
            'nombre'=>'required',
            'precio'=>'required',
            'codigo'=>'required'
        ]);

       $productosPlato->update($request->all());
       return redirect()->route('productosPlatos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $productosPlato)
    {
        $productosPlato->delete();
        return redirect()->route('productosPlatos.index');
    }
}
