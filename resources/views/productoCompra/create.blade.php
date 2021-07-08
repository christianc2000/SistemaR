@extends('adminlte::page')

@section('title', 'CREAR PLATO')

@section('content_header')
    <h1>Crear Producto de compra</h1>
@stop

@section('content')
<form action="{{route('productos.store')}}" method="POST">
    @csrf
    @if(count($errors)>0)
    <div class="alert alert-danger" rote="alert">
     <ul>
        @foreach($errors->all() as $erro)
          {{$error}}
        @endforeach
    </ul>
    </div>

    @endif
    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
<<<<<<< HEAD:resources/views/plato/create.blade.php
      <input id="codigo" name="codigo" type="number" step="any" value="0.00" class="form-control" tabindex="1"  required autofocus autocomplete="codigo">
=======
      <input id="id" name="id" type="text" class="form-control" tabindex="1"  required autofocus autocomplete="id">
>>>>>>> version2:resources/views/productoCompra/create.blade.php
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
    <label for="" class="col-form-label">Codigo de la unidad de medida</label>
    <input id="codigo" name="codigo" type="text" class="form-control" tabindex="2" required autofocus autocomplete="codigo">
</div>
<!--ERROR nombre-->

      <a href="{{route('productos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
