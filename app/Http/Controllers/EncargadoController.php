<?php

namespace App\Http\Controllers;

use App\Models\Encargado;
use App\Http\Requests\StoreMenu;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Proveedor;
use GuzzleHttp\Middleware;
class EncargadoController extends Controller
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
        /*$personas=Persona::all();
        $encargados=Encargado::all();
        $proveedor=Proveedor::all();
        foreach ($encargados as $filasP){
              $EncargadoPersona= new Persona();
              $EncargadoPersona=$personas->find($filasP->ci);
              $EncargadoPersona->save();
        }
        foreach($EncargadoPersona as $filaProv){
            $EncargadoProv=new Persona();
            $EncargadoProv=$proveedor->find($filaProv->cod_prov);
            $EncargadoProv->save();
        }
        select codigo, nombre, apellido, correo, sexo, do
  */
        return view('encargado.index');//,compact('EncargadoPersona',compact('EncargadoProv')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function show(Encargado $encargado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function edit(Encargado $encargado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encargado $encargado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encargado $encargado)
    {
        //
    }
}
