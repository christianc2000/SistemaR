

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif
@extends('adminlte::page')

@section('title', 'INDEX PLATOS')

@section('content_header')
@stop

@section('content')
<form action="{{url('/cliente/'.$cliente->id)}}" method="post">
@csrf
{{method_field('PATCH')}}
@include('cliente.form',['modo'=>'Editar']);
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop