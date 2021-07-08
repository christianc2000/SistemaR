@extends('adminlte::page')

@section('title', 'CREAR PLATO')

@section('content_header')
    <h1>Crear Unidad de medida</h1>
@stop

@section('content')
<form action="{{route('unidadMedidas.store')}}" method="POST">
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
      <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1"  required autofocus autocomplete="codigo">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2" required autofocus autocomplete="descripcion">
    </div>
<!--ERROR nombre-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Abreviatura</label>
        <input id="abreviatura" name="abreviatura" type="text" step="any" value="" class="form-control" tabindex="3" required autofocus autocomplete="abreviatura">
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
