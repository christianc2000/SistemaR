@extends('adminlte::page')

@section('title', 'CREAR PROVEEDOR')

@section('content_header')
    <h1>Crear Proveedor</h1>
@stop

@section('content')
<form action="{{route('proveedors.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
      <input id="codigo" name="codigo" type="number" class="form-control" tabindex="1"  required autofocus autocomplete="codigo">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Nombre Negocio</label>
        <input id="nombre_negocio" name="nombre_negocio" type="text" class="form-control" tabindex="2" required autofocus autocomplete="nombre_negocio">
    </div>
<!--ERROR nombre-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Direccion del negocio</label>
        <input id="direccion" name="direccion" type="text" class="form-control" tabindex="3" required autofocus autocomplete="direccion">
    <!--***************************************-->
    </div>
<!--ERROR precio-->
      <a href="{{route('proveedors.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
