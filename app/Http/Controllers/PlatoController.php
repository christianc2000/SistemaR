<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenu;
use Illuminate\Http\Request;
use App\Models\Plato;
//use Illuminate\Support\Str; //para colocar los helper

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos=Plato::all();
        return view('plato.index',compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $platos= new Plato();
        $platos->codigo=$request->get('codigo');
        $platos->nombre=$request->get('nombre');
        $platos->precio=$request->get('precio');
        $platos->save();
        return redirect()->route('platos.index');//redirige a la vista index de la carpeta plato
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
    public function edit(Plato $platos)
    {
        //return view('plato.edit',compact('platos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Plato $platos)
    {
        $request->validate([//para validar los inputs, y mostrar mensaje
            'codigo'=>'required',
            'nombre'=>'required',
            'precio'=>'required'
        ]);

       //$menu->slug=$request->nombre;
       $platos->update($request->all());
       $platos->save();
       return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plato $plato)
    {
        $plato->delete();
        return redirect()->route('plato.index');
    }
}
