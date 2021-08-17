
@extends('adminlte::page')

@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
<a href=" {{route('cliente.create')}} " class="btn btn-primary mb-4" >REGISTRAR UN NUEVO CLIENTE</a>
<a href='/reportecliente-pdf' class="btn btn-primary mb-4" target="_blank">REPORTE</a> 

    <table id="clientes" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
        <thead class="bg-dark text-white">
           <tr>
            <th scope="col">#</th>
            <th scope="col">CI</th>
            <th scope="col">Nit</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Sexo</th>
            <th scope="col">Celular</th>
            <th scope="col">Acciones</th>
           </tr>
        </thead>    

    <tbody>
        @foreach($clientes as $cliente )
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->CI}}</td>
            <td>{{$cliente->Nit}}</td>
            <td>{{$cliente->Nombre}}</td>
            <td>{{$cliente->Apellido}}</td>
            <td>{{$cliente->Sexo}}</td>
            <td>{{$cliente->celular}}</td>
            <td>
            <form action="{{url('/cliente/'.$cliente->id)}}" method="post" >
           
            @method('delete')
            <a href="{{url('/cliente/'.$cliente->id.'/edit')}}" class="btn btn-primary mb-4">Editar</a>
            @csrf
             <button type="submit" class="btn btn-danger mb-4" onclick="return confirm('Confirmas eliminar?')" value="Borrar">Eliminar</button>

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
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
