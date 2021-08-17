<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Http\Requests\StoreMenu;
use GuzzleHttp\Middleware;
use Spatie\Activitylog\Models\Activity;

class ProveedorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

        $this->middleware('can:proveedors.index')->only('index');
        $this->middleware('can:proveedors.create')->only('create', 'store');
        $this->middleware('can:proveedors.edit')->only('edit', 'update');
        $this->middleware('can:proveedors.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedors= Proveedor::all();
        return view('proveedor.index',compact('proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedors= new Proveedor();
        $proveedors->codigo=$request->get('codigo');
        $proveedors->nombre_negocio=$request->get('nombre_negocio');
        $proveedors->direccion=$request->get('direccion');
        $proveedors->save();

        activity()->useLog('Proveedor')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Proveedor::all()->last()->id;
        $lastActivity->save();

        return redirect()->route('proveedors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedor.edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([//para validar los inputs, y mostrar mensaje
            'codigo'=>'required',
            'nombre_negocio'=>'required',
            'direccion'=>'required'
        ]);

       $proveedor->update($request->all());

       activity()->useLog('Proveedor')->log('Editado')->subject();
       $lastActivity = Activity::all()->last();
       $lastActivity->subject_id = Proveedor::all()->last()->id;
       $lastActivity->save();

       return redirect()->route('proveedors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {

        activity()->useLog('Proveedor')->log('Eliminado')->subject();
       $lastActivity = Activity::all()->last();
       $lastActivity->subject_id = Proveedor::all()->last()->id;
       $lastActivity->save();
       
        $proveedor->delete();

        

        return redirect()->route('proveedors.index');
    }
}
