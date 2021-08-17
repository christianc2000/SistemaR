@extends('adminlte::page')

@section('title', 'INVENTARIO')

@section('content_header')
    <h1>Nota de Entrada y Salida</h1>
@stop

@section('content')
{{-- @can('proveedors.create') --}}
    <a href="{{route('notaEntradaSalidas.create')}}" class="btn btn-primary mb-4" >CREAR</a> 

{{-- @endcan --}}

<table id="proveedors" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
       <tr>
          <th scope="col">ID</th>
          <th scope="col">USUARIO</th>
          <th scope="col">TIPO</th>
          <th scope="col">FECHA - HORA</th>
          <th scope="col">ACCIONES</th>
       </tr>
       <!--'codigo','nombre_negocio','direccion'-->
    </thead>
    <TBODY>
        @foreach ($nota as $not)
          <tr>
              <td>{{$not->id}}</td>
              <td>{{$usuario->where('id',$not->user_id)->first()->name}}</td> 
              @if ($not->tipo == 0)
                    <td>Entrada</td>
                 @else
                  @if ($not->tipo ==1)
                  <td>Salida</td>
                  @else
                  <td>Perdida</td>
                  @endif
              @endif
              <td>{{$not->created_at}}</td>
              <td>
                <!--platos/{plato}/edit-->
                <!---->
                {{-- @can('proveedors.destroy') --}}
                    <form action="{{route('notaEntradaSalidas.destroy',$not)}}" method="POST">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <a class="btn btn-primary">Mostrar</a>
                        @csrf  <!--metodo para añadir token a un formulario-->
                        @method('delete')
                    </form>
                {{-- @endcan --}}
                
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
     $('#proveedors').DataTable({
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>

@stop
