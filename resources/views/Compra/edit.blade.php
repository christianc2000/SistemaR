@extends('adminlte::page')

@section('title', 'EDITAR ENCARGADO')

@section('content_header')
    <h1>Editar Encargado</h1>
@stop

@section('content')
<form action="{{route('encargados.update',$encargado->ci)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="" class="col-form-labelel">CI</label>
      <input id="ci" name="ci" type="text" value="{{$encargado->ci}}" class="form-control" tabindex="1"  required autofocus autocomplete="ci">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{$encargado->nombre}}" class="form-control" tabindex="2" required autofocus autocomplete="nombre">
    </div>
<!--ERROR nombre-->

<!--****************APELLIDOS***********************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Apellido</label>
        <input id="apellido" name="apellido" type="text" value="{{$encargado->apellido}}" class="form-control" tabindex="3" required autofocus autocomplete="apellido">
    <!--***************************************-->
    </div>
    <!--****************DIRECCION***********************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Dirección</label>
        <input id="direccion" name="direccion" type="text" value="{{$encargado->direccion}}" class="form-control" tabindex="3" required autofocus autocomplete="direccion">
    <!--***************************************-->
    </div>
    <!--*************sexo**********************-->
    <div class="form-group">

        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Sexo</label>
          <div class="col-md-9 col-sm-9 col-xs-18">

                <input type="radio" class="op" name="sexo" id="sexo" value="M" {{($encargado->sexo == "M") ? 'checked': ''}}> Masculino

                <input type="radio" class="op" name="sexo" id="sexo" value="F" {{($encargado->sexo == "F") ? 'checked': ''}}> Femenino
            </div>
           </div>
     <!--*************NOMBRE NEGOCIO**********************-->
     <div>
        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Seleccionar Negocio</label>
     <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="nombre_negocio">
        <option selected >Seleccionar</option>
        @foreach ($proveedors as $proveedor)
          <option value="{{$proveedor->codigo}}">{{$proveedor->nombre_negocio}}</option>
        @endforeach
      </select>
    </div>

<!--ERROR precio-->
      <a href="{{route('encargados.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
      <br>
      <br>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
