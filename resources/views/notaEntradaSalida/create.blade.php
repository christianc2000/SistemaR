@extends('adminlte::page')

@section('title', 'CREAR NOTA ENTRADA SALIDA')

@section('content_header')
    <h1>Nota Entrada Salida</h1>
@stop

@section('content')
<form action="{{route('notaEntradaSalidas.store')}}" method="POST">
    @csrf
    <select class="form-control selectpicker" aria-label=".form-select-sm example" name="tipo" required id="tipo" style="width:15%">
        <option value=0>Entrada</option>
        <option value=1>Salida</option>
        <option value=2>Perdida</option>
    </select>
    <br/>
    <button type="submit" class="btn btn-primary">Crear Nota</button>
</form>
<br/>
<form >
    <button type="submit" class="btn btn-primary" disabled=true>Imprimir</button>                        
    @csrf  <!--metodo para añadir token a un formulario-->
    @method('delete')
    <button type="submit" class="btn btn-danger">Canelar</button>
</form>
  <br/>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@if (!empty($error))
    <script language="javaScript"> alert('Ya existe esta combinacion') </script>
@endif

@stop
