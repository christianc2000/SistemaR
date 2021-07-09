@extends('adminlte::page')

@section('title', 'EDITAR PRESA')

@section('content_header')
    <h1>Editar Presa</h1>
@stop

@section('content')
<form action="{{route('productosPresas.update',$productosPresa)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
      <input id="id" name="id" type="text" value="{{$productosPresa->id}}" required autofocus autocomplete="id" class="form-control" tabindex="1">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{$productosPresa->nombre}}" required autofocus autocomplete="nombre" class="form-control" tabindex="2">
    </div>
<!--ERROR nombre-->

<!--***************************************-->
<div class="mb-3">
    <label for="" class="col-form-label">Precio</label>
    <input id="precio" name="precio" type="number" value="{{$productosPresa->precio}}" required autofocus autocomplete="precio" class="form-control" tabindex="2">
</div>
<!--ERROR precio-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Codigo unidad de medida</label>
        <input id="codigo" name="codigo" type="number" step="any" value="{{$productosPresa->codigo}}" required autofocus autocomplete="codigo" class="form-control" tabindex="3">
    <!--***************************************-->
    </div>
<!--ERROR precio-->

        <a href="{{route('productosPresas.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
