<?php

namespace App\Http\Controllers;

use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class UnidadMedidaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:unidadMedidas.index')->only('index');
        $this->middleware('can:unidadMedidas.create')->only('create', 'store');
        $this->middleware('can:unidadMedidas.edit')->only('edit', 'update');
        $this->middleware('can:unidadMedidas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadMedidas= UnidadMedida::all();
        return view('unidad_medida.index',compact('unidadMedidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidad_medida.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidadMedidas= new UnidadMedida();
        $unidadMedidas->codigo=$request->get('codigo');
        $unidadMedidas->descripcion=$request->get('descripcion');
        $unidadMedidas->abreviatura=$request->get('abreviatura');
        $unidadMedidas->save();

        activity()->useLog('Unidad de Medida')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = UnidadMedida::all()->last()->id;
        $lastActivity->save();

        return redirect()->route('unidadMedidas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadMedida $unidadMedida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadMedida $unidadMedida)
    {
        return view('unidad_medida.edit',compact('unidadMedida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnidadMedida $unidadMedida)
    {
        $request->validate([//para validar los inputs, y mostrar mensaje
            'codigo'=>'required',
            'descripcion'=>'required',
            'abreviatura'=>'required'
        ]);

       $unidadMedida->update($request->all());

       activity()->useLog('Unidad de Medida')->log('Editado')->subject();
       $lastActivity = Activity::all()->last();
       $lastActivity->subject_id = UnidadMedida::all()->last()->id;
       $lastActivity->save();

       return redirect()->route('unidadMedidas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadMedida $unidadMedida)
    {
        
        activity()->useLog('Unidad de Medida')->log('Eliminado')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = UnidadMedida::all()->last()->id;
        $lastActivity->save();
        
        $unidadMedida->delete();

        return redirect()->route('unidadMedidas.index');
    }
}
