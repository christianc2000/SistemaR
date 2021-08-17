<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Venta;
use Illuminate\Http\Request;

class carroVentaController extends Controller
{
    public function eliminar($id){
        $venta=Venta::find($id);
        $detalleventas=$venta->detalle_ventas;
        foreach ($detalleventas as $detalleventa) {
            $detalleventa->delete();
        }
        $venta->delete();
        return redirect()->route('ventas.index');
    }

    public function eliminarDetalleVenta($id){
        $detalleVenta=DetalleVenta::find($id);
        $detalle=$detalleVenta->costo_prod;
        $venta=Venta::find($detalleVenta->venta_id);
        $costo=$venta->costo;
        $venta->costo=$costo-$detalle;
        $venta->update();
        $detalleVenta->delete();
        return redirect()->route('ventas.edit', $venta->id);
    }
}
