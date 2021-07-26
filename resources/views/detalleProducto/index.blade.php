@extends('adminlte::page')

@section('title', 'INDEX DETALLE PRODUCTO')

@section('content_header')
    <h1>Lista de detalles de productos</h1>
@stop

@section('content')
<a href=" {{route('detalleProductos.create')}} " class="btn btn-primary mb-4" >CREAR</a>

<table id="detalleP" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
        
       <tr>
          <th scope="col">PRODUCTO CONTENEDOR</th>
          <th scope="col">PRODUCTO CONTENIDO</th>
          <th scope="col">CANTIDAD</th>
          <th scope="col">ACCIONES</th>
       </tr>
    </thead>
    <TBODY>
        @foreach ($detalle_p as $detalle)
                <tr>
                <td>{{$producto->where('id',$detalle->producto_A_id)->first()->nombre}}</td>
                <td>{{$producto->where('id',$detalle->producto_B_id)->first()->nombre}}</td>
                <td>{{$detalle->cantidad}}</td>
                <td>

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
     $('#productosPlatos').DataTable({
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>
@stop
