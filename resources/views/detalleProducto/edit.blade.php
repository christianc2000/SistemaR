@extends('adminlte::page')

@section('title', 'EDITAR DETALLE PRODUCTO')

@section('content_header')

@section('content')
<form action="{{route('detalleProductos.store')}}" method="POST">
    @csrf

    <br/>
<div class="mb-3">
    <label for="" class="col-form-label">Producto contenedor</label>
    {{-- <input id="codigo" name="codigo" type="number" class="form-control" tabindex="2" required autofocus autocomplete="codigo"> --}}
    <select class="form-select" aria-label="Default select example" id="productoContenedor" name="productoContenedor" >
        @foreach ($producto as $prod)
            <option value="{{$prod->id}}">{{$prod->nombre}}</option>
        @endforeach       
      </select>
</div>

<br/>


<div class="mb-3">
    <label for="" class="col-form-label">Producto contenedor</label>
    {{-- <input id="codigo" name="codigo" type="number" class="form-control" tabindex="2" required autofocus autocomplete="codigo"> --}}
    <select class="form-select" aria-label="Default select example" id="productoContenido" name="productoContenido" >
        @foreach ($producto as $prod)
            <option value="{{$prod->id}}">{{$prod->nombre}}</option>
        @endforeach       
      </select>
</div>

<br/>

<div class="mb-3">
    <label for="" class="col-form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="2" required autofocus autocomplete="cantidad">
</div>

<br/>

      <a href="{{route('detalleProductos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
  </form>
  <br/>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
