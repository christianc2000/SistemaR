@extends('layouts.plantillabase');
@section('title', 'PLATO')
@section('contenido')

    <a href="{{route('platos.create')}}" class="btn btn-primary" >CREAR</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <th scope="col">CÓDIGO</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO</th>
            <th scope="col">ACCIONES</th>
        </thead>
        <TBODY>
            @foreach ($platos as $plato)
              <tr>
                  <td>{{$plato->codigo}}</td>
                  <td>{{$plato->nombre}}</td>
                  <td>{{$plato->precio}}</td>
                  <td>
                    <a href="" class="btn btn-info">Editar</a>
                    <button class="btn btn-danger">Eliminar</button>
                  </td>
              </tr>
            @endforeach
        </TBODY>
    </table>
@endsection
