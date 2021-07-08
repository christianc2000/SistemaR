@extends('adminlte::page')

@section('title', 'INDEX PRODUCTO COMPRA')

@section('content_header')
    <h1>Lista de productos de compra</h1>
@stop

@section('content')
<a href=" {{route('productos.create')}} " class="btn btn-primary mb-4" >CREAR</a>

<table id="productos" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
       <tr>
          <th scope="col">CÓDIGO</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">CODIGO DE LA UNIDAD DE MEDIDA</th>
          <th scope="col">ACCIONES</th>
       </tr>
    </thead>
    <TBODY>
        @foreach ($productos as $producto)
          <tr>
              <td>{{$producto->id}}</td>
              <td>{{$producto->nombre}}</td>
              <td>{{$producto->codigo}}</td>
              <td>
                <!--platos/{plato}/edit-->
                <!---->
                <form action="{{route('productos.destroy',$producto)}}" method="POST">
                    <a href="{{route('productos.edit', $producto)}}" class="btn btn-primary">Editar</a>
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