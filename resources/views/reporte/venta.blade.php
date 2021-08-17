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
              $totalventa = 0;
              @endphp
<table id="proveedors" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead>
        <tr>
            <th colspan="3" style="text-align: center; font-weight: bold; font-size: 25px">
                REPORTE VENTA 
            </th>
        </tr>
    </thead>
    <thead class="bg-dark text-white">
       <tr> 
          <th scope="col">ID</th>
          <th scope="col">USUARIO</th>
          <th scope="col"> MONTO TOTAL</th>
          
       </tr>
       <!--'codigo','nombre_negocio','direccion'-->
    </thead>
    <TBODY>
        @foreach ($ventas as $venta)
          <tr>
              <td>{{$venta->id}}</td>
              @php
              $nombre='usario eliminado';
              $totalventa += $venta->costo*1;
                  if($venta->user_id != null){
                    $nombre=$venta->user->name;
                  }
              @endphp
              <td>{{$nombre}}</td>
              <td>{{$venta->costo}}</td>
          </tr>
        @endforeach
        <tr>
            <td colspan="2">
                total venta
            </td>

            <td>
                {{$totalventa}} 
            </td>
        </tr>
    </TBODY>
</table>

</body>
</html>