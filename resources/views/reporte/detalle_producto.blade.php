<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table {
            border: 1px solid grey;
            border-collapse: collapse;
        }
        .table th,
        .table td {
            border: 1px solid grey;
            padding: 4px;
            padding-top: 9px;
            padding-bottom: 4px;
        }
    </style>
        @php
        $totaldetalle_producto = 0;
        @endphp
    <table id="detalleP" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
        <thead>
            <tr>
                <th colspan="3" style="text-align: center; font-weight: bold; font-size: 25px">
                    REPORTE DE LISTA DE PRODUCTO
                </th>
            </tr>
        </thead>
        <thead class="bg-dark text-white">
            
           <tr>
              <th scope="col">PRODUCTO CONTENEDOR</th>
              <th scope="col">PRODUCTO CONTENIDO</th>
              <th scope="col">CANTIDAD</th>
           </tr>
        </thead>
        <TBODY>
            @foreach ($detalle_p as $detalle)
                    <tr>
                    <td>{{$producto->where('id',$detalle->producto_A_id)->first()->nombre}}</td>
                    <td>{{$producto->where('id',$detalle->producto_B_id)->first()->nombre}}</td>
                    <td>{{$detalle->cantidad}}</td>
                    <td>
    
                    </td>
                </tr>
    
                
            @endforeach
            
        </TBODY>
    </table>