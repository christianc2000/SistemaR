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
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
   
<table id="clientes" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead>
        <tr>
            <th colspan="7" style="text-align: center; font-weight: bold; font-size: 25px">
                REPORTE DE CLIENTES
            </th>
        </tr>
    </thead>
    <thead class="bg-dark text-white">
       <tr>
        <th scope="col">#</th>
        <th scope="col">CI</th>
        <th scope="col">Nit</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Sexo</th>
        <th scope="col">Celular</th>
       </tr>
    </thead>    

<tbody>
    @foreach($clientes as $cliente )
    <tr>
        <td>{{$cliente->id}}</td>
        <td>{{$cliente->CI}}</td>
        <td>{{$cliente->Nit}}</td>
        <td>{{$cliente->Nombre}}</td>
        <td>{{$cliente->Apellido}}</td>
        <td>{{$cliente->Sexo}}</td>
        <td>{{$cliente->celular}}</td>
        <td>
        <form action="{{url('/cliente/'.$cliente->id)}}" method="post" >
       
        </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>