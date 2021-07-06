@extends('adminlte::page')

@section('title', 'CREAR CARGO')

@section('content_header')
    <h1>Crear Cargo</h1>
@stop

@section('content')
<form action="" method="POST">
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
        <label for="" class="col-form-label">Sueldo</label>
        <input id="sueldo" name="sueldo" type="number" step="any" value="0.00" class="form-control" tabindex="3" required autofocus autocomplete="sueldo">
    <!--***************************************-->
    </div>
<!--ERROR precio-->
<!--*************perfil usuario**************************-->
<div class="mb-3">
    <label for="" class="col-form-label">Perfil Usuario</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
          Con Usuario
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
          Sin Usuario
        </label>
      </div>
<!--***************************************-->
</div>
<!--ERROR precio-->
      <a href="" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
