<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenu;
use Illuminate\Http\Request;
use App\Models\Cargo;
use GuzzleHttp\Middleware;

class CargoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//?

        $this->middleware('can:cargos.index')->only('index');
        $this->middleware('can:cargos.create')->only('create', 'store');
        $this->middleware('can:cargos.edit')->only('edit', 'update');
        $this->middleware('can:cargos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos= Cargo::all();

        return view('cargo.index',compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cargos= new Cargo();
        $cargos->codigo=$request->get('codigo');
        $cargos->descripcion=$request->get('descripcion');
        $cargos->sueldo=$request->get('sueldo');
        $cargos->perfil_usuario=$request->get('perfil_usuario');
        $cargos->save();

        return redirect()->route('cargos.index');//redirige a la vista index de la carpeta cargo
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
    public function edit(Cargo $cargo)
    {
        return view('cargo.edit',compact('cargo'));
        // return $plato;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cargo $cargo)
    {
        $request->validate([//para validar los inputs, y mostrar mensaje
            'codigo'=>'required',
            'descripcion'=>'required',
            'sueldo'=>'required',
            'perfil_usuario'=>'required'
        ]);


       //$menu->slug=$request->nombre;
       $cargo->update($request->all());
       return redirect()->route('cargos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargos.index');
    }
}
