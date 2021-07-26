

@extends('adminlte::page')
@section('content_header')
    
@stop

@section('content')
<form action="{{ url('/cliente') }}" method="post">
@csrf 
@include('cliente.form',['modo'=>'Crear']);

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
