@extends('layouts.plantillabase');

@section('title', 'EDITAR PLATOS')

@section('contenido')
  <form action="{{route('platos.update',$platos)}}" method="POST">
    @csrf
    @method('PUT');

    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
      <input id="codigo" name="codigo" type="text" value="{{old('codigo',$plato->codigo)}}" class="form-control" tabindex="1">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{old('nombre',$plato->nombre)}}" class="form-control" tabindex="2">
    </div>
<!--ERROR nombre-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Precio</label>
        <input id="precio" name="precio" type="number" step="any" value="{{old('precio',$plato->precio)}}" class="form-control" tabindex="3">
    <!--***************************************-->
    </div>
<!--ERROR precio-->
      <a href="platos.index" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </form>
@endsection
