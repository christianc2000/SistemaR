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
        $this->middleware('can:encargados.index')->only('index');
        $this->middleware('can:encargados.create')->only('create', 'store');
        $this->middleware('can:encargados.edit')->only('edit', 'update');
        $this->middleware('can:encargados.destroy')->only('destroy');
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
        $request->validate([//para validar los inputs, y mostrar mensaje
            'ci'=>'required',
            'sexo'=>'required',
            'nombre_negocio'=>'required'
        ]);
        $encargados= new Encargado();
        $personas= new Persona();
        $personas->ci=$request->get('ci');
        $personas->nombre=$request->get('nombre');
        $personas->apellido=$request->get('apellido');
        $personas->direccion=$request->get('direccion');
        $personas->sexo=$request->get('sexo');
        $personas->tipo_p="t";
        $personas->save();
        $encargados->cod_prov=$request->get('nombre_negocio');
        $encargados->ci_e=$request->get('ci');
        $encargados->save();

        return redirect()->route('encargados.index');//redirige a la vista index de la carpeta cargo
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
    public function edit($ci_e)
    {
       // $encargado=Encargado::find($ci_e);

        $proveedors=Proveedor::all();
        $encargado=Encargado::join('personas','personas.ci', '=', "encargados.ci_e")
        ->join("proveedors","proveedors.codigo","=","encargados.cod_prov")
        ->select('personas.ci as ci','personas.nombre as nombre','personas.apellido as apellido',
        'personas.direccion as direccion','personas.sexo as sexo','proveedors.nombre_negocio as nombre_negocio')
        ->where('personas.ci','=',$ci_e)->first();
        //return $encargado;
        //$encargado=$encargado->find('$ci_e');

         return view('encargado.edit',compact('encargado'),compact('proveedors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ci_e)
    {
        $request->validate([//para validar los inputs, y mostrar mensaje
        'ci'=>'required',
        'nombre'=>'required',
        'apellido'=>'required',
        'direccion'=>'required',
        'sexo'=>'required',
        'nombre_negocio'=>'required',
    ]);

    $encargado=Encargado::find($ci_e);
    $personas=Persona::find($ci_e);

   $personas->ci=$request->get('ci');
   $personas->nombre=$request->get('nombre');
   $personas->apellido=$request->get('apellido');
   $personas->direccion=$request->get('direccion');
   $personas->sexo=$request->get('sexo');
  // $personas->tipo_p="t";
    $personas->save();
   $encargado->cod_prov=$request->get('nombre_negocio');
   $encargado->ci_e=$request->get('ci');
   $encargado->save();

   return redirect()->route('encargados.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function destroy($ci_e)
    {
        $encargado=Encargado::find($ci_e);
        $encargado->delete();
        return redirect()->route('encargados.index');
    }
}
