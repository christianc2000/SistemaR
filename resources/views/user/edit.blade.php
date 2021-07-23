@extends('adminlte::page')

@section('title', 'EDITAR PLATO')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
<form action="{{route('users.update',$user->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="" class="col-form-labelel">Nombre de usuario</label>
      <input id="id" name="name" type="text" value="{{$user->name}}" required autofocus autocomplete="id" class="form-control" tabindex="1">
    </div>
<!--ERROR codigo-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Correo electronico</label>
        <input id="nombre" name="email" type="text" value="{{$user->email}}" required autofocus autocomplete="nombre" class="form-control" tabindex="2">
    </div>
<!--ERROR nombre-->

<!--***************************************-->
<div class="mb-3">
    <label for="" class="col-form-label">Contraseña</label>
    <input id="precio" name="password" type="password" value="{{$user->password}}" required autofocus autocomplete="precio" class="form-control" tabindex="2">
</div>
<!--ERROR precio-->

<!--***************************************-->
    <div class="mb-3">
        <label for="" class="col-form-label">Editar trabajador al que pertenece</label>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ci_trab" >
            {{-- <option selected>Seleccionar</option> --}}
            <option value='{{$user->ci_trab}}' selected>Mantener</option>
            <option value=''>Quitar trabajador</option>
            @foreach ($users as $user)
            {{-- <option value="{{$user->ci}}" >{{$user}} </option> --}}
              <option value="{{$user->ci}}" >{{$user->nombre}} {{$user->ap}} </option>
            @endforeach
        </select>

    <!--***************************************-->
    </div>
<!--ERROR precio-->

        <a href="{{route('users.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
