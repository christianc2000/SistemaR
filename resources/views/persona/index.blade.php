@extends('adminlte::page')

@section('title', 'PERSONAS')

@section('content_header')
    <h1>Lista Personas</h1>
@stop

@section('content')
<a href="{{route('platos.create')}}" class="btn btn-primary mb-4" >CREAR</a>

<table id="platos" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
       <tr>
          <th scope="col">CÓDIGO</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">PRECIO</th>
          <th scope="col">ACCIONES</th>
       </tr>
    </thead>
    <TBODY>
        @foreach ($platos as $plato)
          <tr>
              <td>{{$plato->codigo}}</td>
              <td>{{$plato->nombre}}</td>
              <td>{{$plato->precio}}</td>
              <td>
                <!--platos/{plato}/edit-->
                <!---->
                <form action="{{route('platos.destroy',$plato)}}" method="POST">
                    <a href="{{route('platos.edit', $plato)}}" class="btn btn-primary">Editar</a>
                    @csrf  <!--metodo para añadir token a un formulario-->
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </td>
          </tr>
        @endforeach
    </TBODY>
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
     $('#platos').DataTable({
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>
@stop
