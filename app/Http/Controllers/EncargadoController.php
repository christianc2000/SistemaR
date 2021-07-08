<?php

namespace App\Http\Controllers;

use App\Models\Encargado;
use App\Http\Requests\StoreMenu;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Proveedor;
use GuzzleHttp\Middleware;

use Illuminate\Support\Facades\DB as FacadesDB;

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
        $encargados=Encargado::join('personas','personas.ci', '=', 'encargados.ci_e')
        ->join("proveedors","proveedors.codigo","=","encargados.cod_prov")
        ->select('personas.ci','personas.nombre','personas.apellido','personas.direccion','personas.sexo','proveedors.nombre_negocio')
        ->get();
  //return $encargados;
         return view('encargado.index',compact('encargados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedors=Proveedor::all();
        return view('encargado.create',compact('proveedors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $encargados= new Encargado();
        $personas= new Persona();
        $encargados->codigo=$request->get('codigo');
        $encargados->descripcion=$request->get('descripcion');
        $encargados->sueldo=$request->get('sueldo');
        $encargados->perfil_usuario=$request->get('perfil_usuario');
        $encargados->save();

        return redirect()->route('cargos.index');//redirige a la vista index de la carpeta cargo
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
