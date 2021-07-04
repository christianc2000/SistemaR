@extends('adminlte::page')

@section('title', 'CREAR PLATO')

@section('content_header')
    <h1>Crear Plato</h1>
@stop

@section('content')
<form action="{{route('platos.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
      <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1"  required autofocus autocomplete="codigo">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2" required autofocus autocomplete="nombre">
    </div>
<!--ERROR nombre-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Precio</label>
        <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" tabindex="3" required autofocus autocomplete="precio">
    <!--***************************************-->
    </div>
<!--ERROR precio-->
      <a href="{{route('platos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
