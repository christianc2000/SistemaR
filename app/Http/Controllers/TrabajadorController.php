<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\StoreMenu;
use App\Http\Requests\TrabajadorRequest;
use Illuminate\Http\Request;
use App\Models\Trabajador;
use App\Models\Persona;
use App\Models\Cargo;
use Carbon\Carbon;
use GuzzleHttp\Middleware;

class TrabajadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:trabajadors.index')->only('index');
        $this->middleware('can:trabajadors.create')->only('create', 'store');
        $this->middleware('can:trabajadors.edit')->only('edit', 'update');
        $this->middleware('can:trabajadors.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $trabajadors=Trabajador::join('personas','personas.ci', '=', 'trabajadors.ci_trabajador')
        ->join("Cargos","Cargos.codigo","=","trabajadors.cod_cargo")
        ->select('personas.ci','personas.nombre','personas.apellido','cargos.descripcion')
        ->get();

        // $trabajadors= Trabajador::all();
        return view('trabajador.index',compact('trabajadors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos=Cargo::all();
        return view('trabajador.create', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrabajadorRequest $request)
    {
        $trabajadors= new Trabajador();
        $personas= new Persona();
        $personas->ci=$request->get('ci');
        $personas->nombre=$request->get('nombre');
        $personas->apellido=$request->get('apellido');
        $personas->direccion=$request->get('direccion');
        $personas->sexo=$request->get('sexo');
        $personas->tipo_p="T";
        $personas->save();
        $trabajadors->ci_trabajador=$request->get('ci');
        $trabajadors->fecha_inico=Carbon::now();
        $trabajadors->estado=true;
        $trabajadors->cod_cargo=$request->get('codCargo');
        $trabajadors->save();


        activity()->useLog('Trabajador')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Trabajador::all()->last()->id;
        $lastActivity->save();


        return redirect()->route('trabajadors.index');//redirige a la vista index de la carpeta cargo
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajador $trabajador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function edit($ci)
    {
        $cargos=Cargo::all();
        $trabajadors=Trabajador::join('personas','personas.ci', '=', 'trabajadors.ci_trabajador')
        ->join("cargos","cargos.codigo","=","trabajadors.cod_cargo")
        ->select('personas.ci as ci','personas.nombre as nombre','personas.apellido as apellido',
        'personas.direccion as direccion','personas.sexo as sexo','cargos.descripcion as descripcion', 'trabajadors.cod_cargo as cod_cargo', 'trabajadors.estado as estado')
        ->where('personas.ci','=',$ci)->first();

        //return $encargado;
        //$encargado=$encargado->find('$ci_e');

         return view('trabajador.edit',compact('trabajadors'),compact('cargos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(TrabajadorRequest $request, $ci)
    {
       $personas=Persona::find($ci);
    
       $personas->ci=$request->get('ci');
       $personas->nombre=$request->get('nombre');
       $personas->apellido=$request->get('apellido');
       $personas->direccion=$request->get('direccion');
       $personas->sexo=$request->get('sexo');
      // $personas->tipo_p="t";q
       $personas->save(); 
       $trabajadors=Trabajador::find($ci);
       $trabajadors->ci_trabajador=$request->get('ci');
       $trabajadors->estado=$request->get('estado');
       $trabajadors->cod_cargo=$request->get('codCargo');
       $trabajadors->save();

       activity()->useLog('Trabajador')->log('Editado')->subject();
       $lastActivity = Activity::all()->last();
       $lastActivity->subject_id = Trabajador::all()->last()->id;
       $lastActivity->save();

       return redirect()->route('trabajadors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy($ci_trabajador)
    {
        
        $personas=Persona::find($ci_trabajador);
        $personas->delete();//como es en cascade basta con eliminar persona
        // $trabajadors=Trabajador::find($ci_trabajador);
        // $trabajadors->delete();
        // $ci=$ci_trabajador;


        activity()->useLog('Trabajador')->log('Eliminado')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Trabajador::all()->last()->id;
        $lastActivity->save();

        return redirect()->route('trabajadors.index');
    }
}
