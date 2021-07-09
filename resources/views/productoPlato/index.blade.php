@extends('adminlte::page')

@section('title', 'INDEX PRODUCTO PLATO')

@section('content_header')
    <h1>Lista de productos menu de los platos</h1>
@stop

@section('content')
<a href=" {{route('productosPlatos.create')}} " class="btn btn-primary mb-4" >CREAR</a>

<table id="productosPlatos" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
        
       <tr>
          <th scope="col">CÓDIGO</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">PRECIO</th>
          <th scope="col">CODIGO DE LA UNIDAD DE MEDIDA</th>
          <th scope="col">ACCIONES</th>
       </tr>
    </thead>
    <TBODY>
        @foreach ($productosPlatos as $productosPlato)
            @if ($productosPlato->tipo_menu==true && $productosPlato->tipo_char=='P')
                <tr>
                <td>{{$productosPlato->id}}</td>
                <td>{{$productosPlato->nombre}}</td>
                <td>{{$productosPlato->precio}}</td>
                <td>{{$productosPlato->codigo}}</td>
                <td>
                    <!--platos/{plato}/edit-->
                    <!---->
                    <form action="{{route('productosPlatos.destroy',$productosPlato)}}" method="POST">
                        <a href="{{route('productosPlatos.edit', $productosPlato)}}" class="btn btn-primary">Editar</a>
                        @csrf  <!--metodo para añadir token a un formulario-->
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endif
            
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
     $('#productosPlatos').DataTable({
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>
@stop
