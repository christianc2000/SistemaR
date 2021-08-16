<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table id="proveedors" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
       <tr>
          <th scope="col">ID</th>
          <th scope="col">USUARIO</th>
          <th scope="col">COSTO</th>
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

</body>
</html>