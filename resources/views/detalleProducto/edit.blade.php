@extends('adminlte::page')

@section('title', 'EDITAR DETALLE PRODUCTO')

@section('content_header')

@section('content')
<form action="{{route('detalleProductos.update',$detalle)}}" method="POST">
    @csrf
    @method('PUT')
    <br/>
<div class="mb-3">
    <label for="" class="col-form-label">Producto contenedor</label>
    {{-- <input id="codigo" name="codigo" type="number" class="form-control" tabindex="2" required autofocus autocomplete="codigo"> --}}
    <select class="form-select" aria-label="Default select example" id="productoContenedor" name="productoContenedor" disabled=true >
        @foreach ($producto as $prod)
        @if ($detalle->producto_A_id!=$prod->id)
            <option value="{{$prod->id}}">{{$prod->nombre}}</option>
        @else
            <option selected=true value="{{$prod->id}}">{{$prod->nombre}}</option>
        @endif
           
            
        @endforeach       
      </select>
</div>

<br/>


<div class="mb-3">
    <label for="" class="col-form-label">Producto contenido</label>
    {{-- <input id="codigo" name="codigo" type="number" class="form-control" tabindex="2" required autofocus autocomplete="codigo"> --}}
    <select class="form-select" aria-label="Default select example" id="productoContenido" name="productoContenido"  disabled=true>
        @foreach ($producto as $prod)
        @if ($detalle->producto_B_id!=$prod->id)
            <option value="{{$prod->id}}">{{$prod->nombre}}</option>
        @else
            <option selected=true value="{{$prod->id}}">{{$prod->nombre}}</option>
        @endif
        @endforeach       
      </select>
</div>

<br/>

<div class="mb-3">
    <label for="" class="col-form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="2" required autofocus autocomplete="cantidad" value="{{$detalle->cantidad}}">
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
