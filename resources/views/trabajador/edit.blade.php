@extends('adminlte::page')

@section('title', 'EDITAR TRABAJADOR')

@section('content_header')
    <h1>Editar Trabajador</h1>
@stop

@section('content')
<form action="{{route('trabajadors.update',$trabajadors->ci)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="" class="col-form-labelel">CI</label>
      <input id="ci" name="ci" type="text" value="{{$trabajadors->ci}}" class="form-control" tabindex="1"   autofocus autocomplete="ci">
      <br>
            @error('ci')
                <small>*{{$message}}</small>
            @enderror
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{$trabajadors->nombre}}" class="form-control" tabindex="2" required autofocus autocomplete="nombre">
        <br>
        @error('nombre')
            <small>*{{$message}}</small>
        @enderror
    </div>
<!--ERROR nombre-->

<!--****************APELLIDOS***********************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Apellido</label>
        <input id="apellido" name="apellido" type="text" value="{{$trabajadors->apellido}}" class="form-control" tabindex="3" required autofocus autocomplete="apellido">
        <br>
        @error('apellido')
            <small>*{{$message}}</small>
        @enderror
    <!--***************************************-->
    </div>
    <!--****************DIRECCION***********************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Dirección</label>
        <input id="direccion" name="direccion" type="text" value="{{$trabajadors->direccion}}" class="form-control" tabindex="3" required autofocus autocomplete="direccion">
        <br>
        @error('direccion')
            <small>*{{$message}}</small>
        @enderror
    <!--***************************************-->
    </div>
    <!--*************sexo**********************-->
    <div class="form-group">

        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Sexo</label>
        <div class="col-md-9 col-sm-9 col-xs-18">

                <input type="radio" class="op" name="sexo" id="sexo" value="M" {{($trabajadors->sexo == "M") ? 'checked': ''}}> Masculino

                <input type="radio" class="op" name="sexo" id="sexo" value="F" {{($trabajadors->sexo == "F") ? 'checked': ''}}> Femenino
        </div>
        
    </div>
    <!--*************ESTADO DEL TRABAJADOR**********************-->
    <div>
        @php
            $activ='';
            $inactiv='';
            if($trabajadors->estado=='1'){
                $activ='selected';
            }else{
                $inactiv='selected';
            }
        @endphp
        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Seleccionar Estado</label>
     <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="estado">
        {{-- <option selected >Seleccionar</option> --}}
          <option value='1' {{$activ}}>activo</option>
          <option value='0' {{$inactiv}}>inactivo</option>
      </select>
      <br>
      @error('estado')
          <small>*{{$message}} </small>
      @enderror
    </div>
     <!--*************NOMBRE NEGOCIO**********************-->
     <div>
        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Seleccionar Cargo</label>
        
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="codCargo">
            {{-- <option selected >Seleccionar</option> --}}
                 @foreach ($cargos as $cargo)
                 @php
                    $carg='';
                    if($trabajadors->cod_cargo==$cargo->codigo){
                        $carg='selected';
                    }
                 @endphp
            <option value="{{$cargo->codigo}}" {{$carg}}>{{$cargo->descripcion}}</option>
                @endforeach
        </select>
      <br>
        @error('codCargo')
            <small>*{{$message}}</small>
        @enderror
    </div>

<!--ERROR precio-->
      <a href="{{route('trabajadors.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
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
