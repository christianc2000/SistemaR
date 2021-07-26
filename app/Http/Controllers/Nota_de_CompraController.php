<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota_de_compra;

class Nota_de_CompraController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth');
    //     $this->middleware('can:Nota_de_compras.index')->only('index');
    //     $this->middleware('can:Nota_de_compras.create')->only('create', 'store');
    //     $this->middleware('can:Nota_de_compras.edit')->only('edit', 'update');
    //     $this->middleware('can:Nota_de_compras.destroy')->only('destroy');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notaCompra=Nota_de_compra::all();
        return view('Compra.index',compact('notaCompra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Compra.create');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
