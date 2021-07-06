@extends('adminlte::page')

@section('title', 'CREAR PERSONA')

@section('content_header')
    <h1>Editar Cargo</h1>
@stop

@section('content')
<form action="{{route('cargos.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
      <input id="codigo" name="codigo" type="number"  value="{{$unidaM->codigo}}" class="form-control" tabindex="1"  required autofocus autocomplete="codigo">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text"  value="{{$unidadM->descripcion}}" class="form-control" tabindex="2" required autofocus autocomplete="descripcion">
    </div>
<!--ERROR descripcion-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Sueldo</label>
        <input id="sueldo" name="sueldo" type="number"  value="{{$unidadM->sueldo}}" class="form-control" tabindex="3" required autofocus autocomplete="sueldo">
    <!--***************************************-->
    </div>
<!--ERROR precio-->
<div class="mb-3">
    <label for="" class="col-form-label">Perfil Usuaio</label>
    <!--RADIO BUTTON-->
    <div class="form-check">
        <input class="form-check-input" type="radio" value=true name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
          Con Usuario
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" value=false name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
          Sin Usuario
        </label>
      </div>
    <!--***************************************-->
</div>
<!--ERROR perfil_usuario-->
      <a href="{{route('cargos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
