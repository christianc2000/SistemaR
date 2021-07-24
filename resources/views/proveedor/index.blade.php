@extends('adminlte::page')

@section('title', 'PROVEEDOR')

@section('content_header')
    <h1>Lista de proveedores</h1>
@stop

@section('content')
@can('proveedors.create')
    <a href="{{route('proveedors.create')}}" class="btn btn-primary mb-4" >CREAR</a> 
@endcan

<table id="proveedors" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
       <tr>
          <th scope="col">CÓDIGO</th>
          <th scope="col">NOMBRE NEGOCIO</th>
          <th scope="col">DIRECCION</th>
          <th scope="col">ACCIONES</th>
       </tr>
       <!--'codigo','nombre_negocio','direccion'-->
    </thead>
    <TBODY>
        @foreach ($proveedors as $proveedor)
          <tr>
              <td>{{$proveedor->codigo}}</td>
              <td>{{$proveedor->nombre_negocio}}</td>
              <td>{{$proveedor->direccion}}</td>
              <td>
                <!--platos/{plato}/edit-->
                <!---->
                @can('proveedors.destroy')
                    <form action="{{route('proveedors.destroy',$proveedor)}}" method="POST">
                        <a href="{{route('proveedors.edit', $proveedor)}}" class="btn btn-primary">Editar</a>
                        @csrf  <!--metodo para añadir token a un formulario-->
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                @endcan
                
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
