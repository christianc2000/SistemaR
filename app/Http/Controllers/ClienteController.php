<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ClienteController extends Controller
{

    public function __construct(){
        // $this->middleware('auth');
        // $this->middleware('can:cliente.index')->only('index');
        // $this->middleware('can:cliente.create')->only('create', 'store');
        // $this->middleware('can:cliente.edit')->only('edit', 'update');
        // $this->middleware('can:cliente.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
       // $datos['clientes'] =cliente::paginate(10);
        //return view('cliente.index', $datos);
    }
    public function iprimir(){
        //dd("hola");
        $clientes = Cliente::all();
        $pdf=\PDF::loadview('reporte.cliente',compact('clientes'));
    return $pdf ->download('cliente.pdf');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.create');
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
        //$datosCliente=request()->all();
        $datosCliente = request()->except('_token');
        Cliente::insert($datosCliente);
        
        
        activity()->useLog('Cliente')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Cliente::all()->last()->id;
        $lastActivity->save();

        return redirect('cliente')->with('mensaje','Cliente agregado con exito');
        //return response()->json($datosCliente);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente=cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCliente = request()->except('_token', '_method');
        cliente::where('id','=',$id)->update($datosCliente);

        $cliente=cliente::findOrFail($id);


        activity()->useLog('Cliente')->log('Editado')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Cliente::all()->last()->id;
        $lastActivity->save();


        return view('cliente.edit', compact('cliente'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        activity()->useLog('Cliente')->log('Eliminado')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Cliente::all()->last()->id;
        $lastActivity->save();

        Cliente::destroy($id);
        return redirect('cliente')->with('mensaje','Empleado borrado');
    }
}
