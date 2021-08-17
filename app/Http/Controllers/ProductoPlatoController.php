<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ProductoPlatoController extends Controller
{
    public function __construct(){

        $this->middleware('can:productosPlatos.index')->only('index');
        $this->middleware('can:productosPlatos.create')->only('create', 'store');
        $this->middleware('can:productosPlatos.edit')->only('edit', 'update');
        $this->middleware('can:productosPlatos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productosPlatos= Producto::all();
        $unidadMedidas= UnidadMedida::all();//le paso los datos de la tabla unidadMedidas
        return view('productoPlato.index',compact('productosPlatos', 'unidadMedidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidadMedidas= UnidadMedida::all();
        return view('productoPlato.create', compact('unidadMedidas'));
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   


        $productosPlatos= new Producto();

        $productosPlatos->nombre=$request->get('nombre');
        if ($request->get('usoProducto')== 0){
            $productosPlatos->tipo_menu=false;
            $productosPlatos->tipo_compra=true;
        }
        if ($request->get('usoProducto')== 1){
            $productosPlatos->tipo_menu=true;
            $productosPlatos->tipo_compra=false;
            $productosPlatos->tipo_char=$request->get('tipoProducto');
            $productosPlatos->precio=$request->get('precio');
        }
        if ($request->get('usoProducto')== 2){
        $productosPlatos->tipo_menu=true;
        $productosPlatos->tipo_compra=true;
        $productosPlatos->tipo_char=$request->get('tipoProducto');
        $productosPlatos->precio=$request->get('precio');
        }

 
        $productosPlatos->codigo=$request->get('codigo');
        $productosPlatos->save();

        activity()->useLog('Producto')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Producto::all()->last()->id;
        $lastActivity->save(); 
        return redirect()->route('productosPlatos.index');
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
    public function edit(Producto $productosPlato)
    {  
        $unidadMedidas= UnidadMedida::all();
        return view('productoPlato.edit',compact('productosPlato','unidadMedidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Producto $productosPlato)
    {


        $productosPlato->nombre=$request->get('nombre');
        if ($request->get('usoProducto')== 0){
            $productosPlato->tipo_menu=false;
            $productosPlato->tipo_compra=true;
        }
        if ($request->get('usoProducto')== 1){
            $productosPlato->tipo_menu=true;
            $productosPlato->tipo_compra=false;
            $productosPlato->tipo_char=$request->get('tipoProducto');
            $productosPlato->precio=$request->get('precio');
        }
        if ($request->get('usoProducto')== 2){
        $productosPlato->tipo_menu=true;
        $productosPlato->tipo_compra=true;
        $productosPlato->tipo_char=$request->get('tipoProducto');
        $productosPlato->precio=$request->get('precio');
        }
     
       
        $productosPlato->codigo=$request->get('codigo');
        $productosPlato->save();

        activity()->useLog('Producto')->log('Editado')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Producto::all()->last()->id;
        $lastActivity->save(); 

       return redirect()->route('productosPlatos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $productosPlato)
    {
        $productosPlato->delete();

        activity()->useLog('Producto')->log('Eliminado')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Producto::all()->last()->id;
        $lastActivity->save(); 

        return redirect()->route('productosPlatos.index');
    }
}
