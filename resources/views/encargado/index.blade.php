@extends('adminlte::page')

@section('title', 'INDEX PLATOS')

@section('content_header')
    <h1>Lista de Encargados</h1>
@stop

@section('content')
<a href="{{route('encargados.create')}}" class="btn btn-primary mb-4" >CREAR</a>

<table id="encargados" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
       <tr>
          <th scope="col">CI</th>
          <th scope="col">Nombre(s)</th>
          <th scope="col">Apellido(s)</th>
          <th scope="col">Direccion</th>
          <th scope="col">Sexo</th>
          <th scope="col">Negocio</th>
          <th scope="col">ACCIONES</th>
       </tr>
    </thead>
    <TBODY>

        @foreach ($encargados as $encargado)
          <tr>
              <td>{{$encargado->ci}}</td>
              <td>{{$encargado->nombre}}</td>
              <td>{{$encargado->apellido}}</td>
              <td>{{$encargado->direccion}}</td>
              <td>{{$encargado->sexo}}</td>
              <td>{{$encargado->nombre_negocio}}</td>
              <td>
                <!--platos/{plato}/edit-->
                <!---->
                <form action="{{route('encargados.destroy',$encargado->ci)}}" method="POST">
                    <a href="{{route('encargados.edit',$encargado->ci)}}" class="btn btn-primary">Editar</a>
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
     $('#encargados').DataTable({
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>
@stop
