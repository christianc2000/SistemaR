@extends('adminlte::page')

@section('title', 'EDITAR PLATO')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
<form action="{{route('proveedors.update',$proveedor)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
      <input id="codigo" name="codigo" type="text" value="{{$proveedor->codigo}}" required autofocus autocomplete="codigo" class="form-control" tabindex="1">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Nombre de negocio</label>
        <input id="nombre_negocio" name="nombre_negocio" type="text" value="{{$proveedor->nombre_negocio}}" required autofocus autocomplete="nombre_negocio" class="form-control" tabindex="2">
    </div>
<!--ERROR nombre-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">direccion</label>
        <input id="direccion" name="direccion" type="text" step="any" value="{{$proveedor->direccion}}" required autofocus autocomplete="precio" class="form-control" tabindex="3">
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
