@extends('adminlte::page')

@section('title', 'CREAR PLATO')

@section('content_header')
    <h1>Crear Producto Menu de Bebida</h1>
@stop

@section('content')
<form action="{{route('productosBebidas.store')}}" method="POST">
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
      <input id="id" name="id" type="number" class="form-control" tabindex="1"  required autofocus autocomplete="id">
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
    <label for="" class="col-form-label">Precio</label>
    <input id="precio" name="precio" type="number" class="form-control" tabindex="2" required autofocus autocomplete="precio">
</div>
<!--ERROR precio-->

<!--***************************************-->
<div class="mb-3">
    <label for="" class="col-form-label">Codigo de la unidad de medida</label>
    {{-- <input id="codigo" name="codigo" type="number" class="form-control" tabindex="2" required autofocus autocomplete="codigo"> --}}
    <select class="form-select" aria-label="Default select example" id="codigo" name="codigo">
        <option selected>unidades de medidas</option>
        @foreach ($unidadMedidas as $unidadMedida)
            <option value="{{$unidadMedida->codigo}}">{{$unidadMedida->descripcion}}</option>
        @endforeach       
      </select>
</div>
<!--ERROR nombre-->

      <a href="{{route('productosBebidas.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
