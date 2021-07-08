@extends('adminlte::page')

@section('title', 'CREAR CARGO')

@section('content_header')
    <h1>Crear Cargo</h1>
@stop

@section('content')
<form action="{{route('cargos.store')}}" method="POST">
    @csrf
    @if(count($errors)>0)
    <div class="alert alert-danger" rote="alert">
     <ul>
        @foreach($errors->all() as $error)
          {{$error}}
        @endforeach
    </ul>
    </div>

    @endif
    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
      <input id="codigo" name="codigo" type="number" step="any" value="" class="form-control" tabindex="1"  required autofocus autocomplete="codigo">
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
        <label for="" class="col-form-label">Sueldo</label>
        <input id="sueldo" name="sueldo" type="number" step="any" value="0.00" class="form-control" tabindex="3" required autofocus autocomplete="sueldo">
    <!--***************************************-->
    </div>
<!--ERROR precio-->
<!--*************perfil usuario**************************-->
<div class="form-group">

    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"></label>
      <div class="col-md-9 col-sm-9 col-xs-18">

            <input type="radio" class="op" name="perfil_usuario" id="perfil_usuario" value="1"> CON USUARIO
            <br>
            <input type="radio" class="op" name="perfil_usuario" id="perfil_usuario" value="0"> SIN USUARIO
        </div>
       </div>

<!--ERROR perfil usuario-->
      <a href="{{route('cargos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
