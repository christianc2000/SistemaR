@extends('adminlte::page')

@section('title', 'EDITAR PLATO')

@section('content_header')
    <h1>Editar Producto del menu de Bebida</h1>
@stop

@section('content')
<form action="{{route('productosBebidas.update',$productosBebida)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
      <input id="id" name="id" type="text" value="{{$productosBebida->id}}" required autofocus autocomplete="id" class="form-control" tabindex="1">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{$productosBebida->nombre}}" required autofocus autocomplete="nombre" class="form-control" tabindex="2">
    </div>
<!--ERROR nombre-->

<!--***************************************-->
<div class="mb-3">
    <label for="" class="col-form-label">Precio</label>
    <input id="precio" name="precio" type="number" value="{{$productosBebida->precio}}" required autofocus autocomplete="precio" class="form-control" tabindex="2">
</div>
<!--ERROR precio-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Codigo unidad de medida</label>
        <input id="codigo" name="codigo" type="number" step="any" value="{{$productosBebida->codigo}}" required autofocus autocomplete="codigo" class="form-control" tabindex="3">
    <!--***************************************-->
    </div>
<!--ERROR precio-->

        <a href="{{route('productosBebidas.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
