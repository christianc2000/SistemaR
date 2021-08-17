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
            padding-top: 8px;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    @php
    $totalcompra = 0;
    @endphp
    <table id="encargados" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
        <thead>
            <tr>
                <th colspan="3" style="text-align: center; font-weight: bold; font-size: 25px">
                    REPORTE COMPRA
                </th>
            </tr>
        </thead>
        <thead class="bg-dark text-white">
           <tr>
              <th scope="col">Nro</th>
              <th scope="col">Fecha</th>
              <th scope="col">Total</th>
           </tr>
        </thead>
        <TBODY>
    
            @foreach ($notaCompra as $notaC)
              <tr>
                  <td>{{$notaC->id}}</td>
                  <td>{{$notaC->created_at}}</td>
                  <td>{{$notaC->total}}</td>
    
                  <td>
                    <!--platos/{plato}/edit-->
                    <!---->
                    <form action="{{route('Nota_de_compras.destroy',$notaC)}}" method="POST">
                       
                    </form>
                  </td>
              </tr>
              @endforeach
              <tr>
                <td colspan="2">
                    total compra
                </td>
    
                <td>
                    {{$totalcompra}} 
                </td>
            </tr>
        </TBODY>
    </table>