<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaEntradaSalida;
use App\Models\DetalleNotaEntradaSalida;
use App\Models\Producto;
use App\Models\User;

class NotaEntradaSalidaController extends Controller
{
    public function index()
    {
        $nota = NotaEntradaSalida::all();
        $usuario= User::all();
        return view('notaEntradaSalida.index',compact('nota','usuario'));
    }

    public function create()
    {
        return view('notaEntradaSalida.create');
    }

    public function store(Request $request)
    {   

        $nota = new NotaEntradaSalida();
        $nota->tipo = $request->get('tipo'); //Entrada , Salida , Perdida
        $nota->user_id = auth()->user()->id;
        $nota->save();
        return redirect()->route('notaEntradaSalidas.edit',$nota);
       
    }

    public function edit(NotaEntradaSalida $notaEntradaSalida)
    {  
        $productos=Producto::all();
        $detalles=DetalleNotaEntradaSalida::all()->where('nota_id',$notaEntradaSalida->id);
        return view('notaEntradaSalida.edit',compact('notaEntradaSalida','productos','detalles'));
    }

    public function update(Request $request,NotaEntradaSalida $notaEntradaSalida)
    {   
        $cantidad=$request->get('cantidad');
        $detalleProducto->cantidad = $cantidad;
        $detalleProducto->save();

        return redirect()->route('notaEntradaSalidas.index');
    }

    public function destroy(NotaEntradaSalida $notaEntradaSalida)
    {
       $notaEntradaSalida->delete();
      //  $usuario = Auth::user();
      return redirect()->route('notaEntradaSalidas.index');

    }
}
