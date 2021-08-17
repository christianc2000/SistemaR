<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetalleNotaEntradaSalida;
use App\Models\NotaEntradaSalida;
use App\Models\Producto;


class DetalleNotaEntradaSalidaController extends Controller
{

    public function index()
    {

    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        $detalle= new DetalleNotaEntradaSalida();
        $codigo = $request->get('codigo');
        $detalle->nota_id = $codigo;
        $detalle->producto_id = $request-> get('producto');
        $detalle->cantidad = $request-> get('cantidad');
        $detalle->descripcion = $request ->get('descripcion');
        $detalle->save();

        $notaEntradaSalida = NotaEntradaSalida::where('id',$detalle->nota_id)->first();

        return redirect()->route('notaEntradaSalidas.edit',$notaEntradaSalida);
    }


    public function show(DetalleNotaEntradaSalida $detalleNotaEntradaSalida)
    {

    }

    public function edit($id)
    {

    }


    public function update(Request $request, DetalleNotaEntradaSalida $detalleNotaEntradaSalida)
    {

        
    }

    public function destroy(DetalleNotaEntradaSalida $detalleNotaEntradaSalida)
    {   
        $detalleNotaEntradaSalida->delete();
        $notaEntradaSalida = NotaEntradaSalida::where('id',$detalleNotaEntradaSalida->nota_id)->first();
        return redirect()->route('notaEntradaSalidas.edit',compact('notaEntradaSalida'));
    }
}
