<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenu;
use Illuminate\Http\Request;
use App\Models\Plato;
use GuzzleHttp\Middleware;

//use Illuminate\Support\Str; //para colocar los helper

class PlatoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos= Plato::all();

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
    public function edit(Plato $plato)
    {
        return view('plato.edit',compact('plato'));
        // return $plato;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Plato $plato)
    {
        $request->validate([//para validar los inputs, y mostrar mensaje
            'codigo'=>'required',
            'nombre'=>'required',
            'precio'=>'required'
        ]);


       //$menu->slug=$request->nombre;
       $plato->update($request->all());
       return redirect()->route('platos.index');
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
        return redirect()->route('platos.index');
    }
}
