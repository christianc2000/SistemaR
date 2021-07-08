@extends('adminlte::page')

@section('title', 'EDITAR CARGO')

@section('content_header')
    <h1>Editar Cargo</h1>
@stop

@section('content')
<form action="{{route('cargos.update',$cargo)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="" class="col-form-labelel">Código</label>
      <input id="codigo" name="codigo" type="number" step="any" value="{{$cargo->codigo}}" required autofocus autocomplete="codigo" class="form-control" tabindex="1">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" value="{{$cargo->descripcion}}" required autofocus autocomplete="descripcion" class="form-control" tabindex="2">
    </div>
<!--ERROR Descripcion-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Sueldo</label>
        <input id="sueldo" name="sueldo" type="number" step="any" value="{{$cargo->sueldo}}" required autofocus autocomplete="sueldo" class="form-control" tabindex="3">
    <!--***************************************-->
    </div>
<!--ERROR Sueldo-->
<!--***************************************-->
<div class="form-group">

    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name"></label>
      <div class="col-md-9 col-sm-9 col-xs-18">

            <input type="radio" class="op" name="perfil_usuario" id="perfil_usuario" value="1"  {{($cargo->perfil_usuario == 1) ? 'checked': ''}}> CON USUARIO
            <br>
            <input type="radio" class="op" name="perfil_usuario" id="perfil_usuario" value="0"  {{($cargo->perfil_usuario == 0) ? 'checked' : '' }}> SIN USUARIO
        </div>
       </div>
<!--***************************************-->
</div>
<!--ERROR Sueldo-->

        <a href="{{route('cargos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
