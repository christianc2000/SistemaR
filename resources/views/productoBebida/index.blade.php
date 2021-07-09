@extends('adminlte::page')

@section('title', 'INDEX PRODUCTO COMPRA')

@section('content_header')
    <h1>Lista de productos menu de bebidas</h1>
@stop

@section('content')
<a href=" {{route('productosBebidas.create')}} " class="btn btn-primary mb-4" >CREAR</a>

<table id="productosBebidas" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
        
       <tr>
          <th scope="col">CÓDIGO</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">PRECIO</th>
          <th scope="col">UNIDAD DE MEDIDA</th>
          <th scope="col">ACCIONES</th>
       </tr>
    </thead>
    <TBODY>
        @foreach ($productosBebidas as $productosBebida)
            @if ($productosBebida->tipo_menu==true && $productosBebida->tipo_char=='B')
                <tr>
                <td>{{$productosBebida->id}}</td>
                <td>{{$productosBebida->nombre}}</td>
                <td>{{$productosBebida->precio}}</td>

                @foreach ($unidadMedidas as $unidadMedida)
                    @if ($productosBebida->codigo==$unidadMedida->codigo)
                        <td>{{$unidadMedida->descripcion}}</td>
                    @endif
                @endforeach 

                <td>
                    <!--platos/{plato}/edit-->
                    <!---->
                    <form action="{{route('productosBebidas.destroy',$productosBebida)}}" method="POST">
                        <a href="{{route('productosBebidas.edit', $productosBebida)}}" class="btn btn-primary">Editar</a>
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
       $('#productosBebidas').DataTable({
           "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
       });
   } );
  </script>
@stop
