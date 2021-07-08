@extends('adminlte::page')

@section('title', 'EDITAR PLATO')

@section('content_header')
    <h1>Editar Unidad de medida</h1>
@stop

@section('content')
<form action="{{route('unidadMedidas.update',$unidadMedida)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
      <input id="codigo" name="codigo" type="text" value="{{$unidadMedida->codigo}}" required autofocus autocomplete="codigo" class="form-control" tabindex="1">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" value="{{$unidadMedida->descripcion}}" required autofocus autocomplete="descripcion" class="form-control" tabindex="2">
    </div>
<!--ERROR nombre-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Abreviatura</label>
        <input id="abreviatura" name="abreviatura" type="text" step="any" value="{{$unidadMedida->abreviatura}}" required autofocus autocomplete="abreviatura" class="form-control" tabindex="3">
    <!--***************************************-->
    </div>
<!--ERROR precio-->

        <a href="{{route('unidadMedidas.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
