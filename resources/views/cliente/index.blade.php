
@extends('adminlte::page')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
<a href="{{url('/cliente/create')}}">Registrar nuevo cliente</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>CI</th>
            <th>Nit</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Sexo</th>
            <th>Celular</th>
            <th>Acciones</th>
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
                
            <a href="{{url('/cliente/'.$cliente->id.'/edit')}}">
                    Editar
            </a>
             | 

            <form action="{{url('/cliente/'.$cliente->id)}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('Confirmas eliminar?')"
             value="Borrar">
            </form>



            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
     $('#encargados').DataTable({
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>
@stop
