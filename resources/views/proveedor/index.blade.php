@extends('adminlte::page')

@section('title', 'PROVEEDOR')

@section('content_header')
    <h1>Lista Proveedores</h1>
@stop

@section('content')
<a href="{{route('proveedor.create')}}" class="btn btn-primary mb-4" >CREAR</a>

<table id="proveedor" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
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
                <form action="" method="POST">
                    <a href="" class="btn btn-primary">Editar</a>
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
     $('#proveedor').DataTable({
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>
@stop
