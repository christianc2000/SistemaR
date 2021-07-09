<?php

namespace App\Http\Controllers;
use App\Models\Producto;

use Illuminate\Http\Request;

class ProductoPresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productosPresas= Producto::all();

        return view('productoPresa.index',compact('productosPresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productoPresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productosPresas= new Producto();
        $productosPresas->id=$request->get('id');
        $productosPresas->nombre=$request->get('nombre');
        $productosPresas->tipo_menu=1;
        $productosPresas->tipo_char='L';
        $productosPresas->precio=$request->get('precio');
        $productosPresas->codigo=$request->get('codigo');
        $productosPresas->save();
        return redirect()->route('productosPresas.index');
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
    public function edit(Producto $productosPresa)
    {
        return view('productoPresa.edit',compact('productosPresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Producto $productosPresa)
    {
        $request->validate([//para validar los inputs, y mostrar mensaje
            'id'=>'required',
            'nombre'=>'required',
            'precio'=>'required',
            'codigo'=>'required'
        ]);

       $productosPresa->update($request->all());
       return redirect()->route('productosPresas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $productosPresa)
    {
        $productosPresa->delete();
        return redirect()->route('productosPresas.index');
    }
}
