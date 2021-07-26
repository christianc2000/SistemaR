@extends('adminlte::page')

@section('title', 'INDEX PLATOS')

@section('content_header')
    <h1>Lista de Compras</h1>
@stop

@section('content')
<a href="{{route('Nota_de_compras.create')}}" class="btn btn-primary mb-4" >CREAR</a>

<table id="encargados" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
       <tr>
          <th scope="col">Nro</th>
          <th scope="col">Fecha</th>
          <th scope="col">Total</th>
          <th scope="col">ACCIONES</th>
       </tr>
    </thead>
    <TBODY>

        @foreach ($notaCompra as $notaC)
          <tr>
              <td>{{$notaC->id}}</td>
              <td>{{$notaC->created_at}}</td>
              <td>{{$notaC->total}}</td>

              <td>
                <!--platos/{plato}/edit-->
                <!---->
                <form action="{{route('Nota_de_compras.destroy',$notaC)}}" method="POST">
                    <a href="{{route('Nota_de_compras.edit',$notaC)}}" class="btn btn-primary">Editar</a>
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
