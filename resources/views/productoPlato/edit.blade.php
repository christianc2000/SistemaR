@extends('adminlte::page')

@section('title', 'EDITAR PLATO')

@section('content_header')
    <h1>Editar Plato</h1>
@stop
<script language="javaScript">

    function habilitacion(){
        var opcion1 =document.getElementById(0);
        var opcion2 =document.getElementById(1);
        var opcion3 =document.getElementById(2);
        if (opcion1.selected) {
            var precio=document.getElementById('precio');
             precio.disabled=true;
             document.getElementById("tipoProducto").disabled=true;
        }
        if (opcion2.selected) {
            var precio=document.getElementById('precio');
             precio.disabled=false;
             document.getElementById("tipoProducto").disabled=false;
   
        }
        if (opcion3.selected) {
            var precio=document.getElementById('precio');
          precio.disabled=false;
          document.getElementById("tipoProducto").disabled=false;
        
        }
    
    }


</script>
@section('content')
<form action="{{route('productosPlatos.update',$productosPlato)}}" method="POST">
    @csrf
    @method('PUT')
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{$productosPlato->nombre}}" required autofocus autocomplete="nombre" class="form-control" tabindex="2">
    </div>
<!--ERROR nombre-->

<!--***************************************-->
<div class="mb-3">
    <label for="" class="col-form-label">Precio</label>
    <input id="precio" name="precio" type="number" value="{{$productosPlato->precio}}" required autofocus autocomplete="precio" class="form-control" tabindex="2"  onclick="habilitacion();">
</div>
<!--ERROR precio-->

<!--***************************************-->
<br/>
<div class="mb-3">
    <label for="" class="col-form-label">unidad de medida</label>
    {{-- <input id="codigo" name="codigo" type="number" class="form-control" tabindex="2" required autofocus autocomplete="codigo"> --}}
    <select class="form-select" aria-label="Default select example" id="codigo" name="codigo" >
        @foreach ($unidadMedidas as $unidadMedida)
            <option value="{{$unidadMedida->codigo}}">{{$unidadMedida->descripcion}}</option>

        @endforeach       
      </select>
</div>

<br/>

<div class="mb-3">
    <label for="" class="col-form-label">tipo de producto</label>
    {{-- <input id="codigo" name="codigo" type="number" class="form-control" tabindex="2" required autofocus autocomplete="codigo"> --}}
    <select class="form-select" aria-label="Default select example" id="tipoProducto" name="tipoProducto" >
        <option value='B' >Bebida</option>
        <option value='P' >Plato</option>
        <option value='L' >Presa</option>
      </select>
</div>
<br/>
<div class="mb-3">
    <label for="" class="col-form-label">Uso de producto</label>
    {{-- <input id="codigo" name="codigo" type="number" class="form-control" tabindex="2" required autofocus autocomplete="codigo"> --}}
    <select class="form-select" aria-label="Default select example" id="usoProducto" name="usoProducto" onload='habilitacion();' onchange='habilitacion();'>
        <option value=0 id=0 >Ingrediente</option>
        <option value=1 id=1 >Menu</option> 
        <option value=2 id=2 >Ingrediente y Menu</option>
      </select>
</div>
<br/>
<!--ERROR precio-->

        <a href="{{route('productosPlatos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
