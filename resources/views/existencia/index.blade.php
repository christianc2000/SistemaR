@extends('adminlte::page')

@section('title', 'INVENTARIO')

@section('content_header')
    <h1>Nota de Entrada y Salida</h1>
@stop

@section('content')
{{-- @can('proveedors.create') --}}
    <a href="{{route('ventas.create')}}" class="btn btn-primary mb-4" >CREAR</a> 
{{-- @endcan --}}

<table id="proveedors" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
       <tr>
          <th scope="col">ID</th>
          <th scope="col">PRODUCTO</th>
          <th scope="col">CANTIDAD</th>
          <th scope="col">TIPO</th>
          <th scope="col">ACCIONES</th>
       </tr>
       <!--'codigo','nombre_negocio','direccion'-->
    </thead>
    <TBODY>
        @foreach ($ventas as $venta)
          <tr>
              <td>{{$venta->id}}</td>
              @php
              $nombre='usario eliminado';
                  if($venta->user_id != null){
                    $nombre=$venta->user->name;
                  }
              @endphp
              <td>{{$nombre}}</td>
              <td>{{$venta->costo}}</td>
              <td> TIPO</td>
              <td>
                <!--platos/{plato}/edit-->
                <!---->
                {{-- @can('proveedors.destroy') --}}
                    <form action="{{route('ventas.destroy',$venta)}}" method="POST">
                        <a href="{{route('ventas.show', $venta)}}" class="btn btn-primary">Mostrar</a>
                        @csrf  <!--metodo para añadir token a un formulario-->
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
