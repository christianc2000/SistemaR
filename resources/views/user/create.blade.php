@extends('adminlte::page')

@section('title', 'CREAR USUARIO')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @if (count($errors) > 0)
            <div class="alert alert-danger" rote="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>

        @endif
        <div class="mb-3">
            <label for="" class="col-form-labelel">Nombre</label>
            <input id="codigo" name="name" type="text" step="any" value="" class="form-control" tabindex="1" required
                autofocus autocomplete="codigo">
            @error('name')
                <br>
                <small>{{ $message }} </small>
            @enderror
        </div>
        <!--ERROR NOmbre-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Correo electronico</label>
            <input id="descripcion" name="email" type="email" class="form-control" tabindex="2" required autofocus
                autocomplete="descripcion">
            @error('email')
                <br>
                <small>*{{ $message }} </small>
            @enderror
        </div>
        <!--ERROR correo electronico-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Contraseña</label>
            <input id="sueldo" name="password" type="password" step="any" class="form-control" tabindex="3" required
                autofocus autocomplete="sueldo">
            @error('password')
                <br>
                <small>*{{ $message }} </small>
            @enderror
            <!--***************************************-->
        </div>
        <!--ERROR contraseña-->

        <!--*************trabajador para el cual crear ususario**************************-->
        <div class="">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="">Trabajador</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ci_trab">
                <option selected value="">Seleccion al personal</option>
                @foreach ($users as $user)
                    {{-- <option value="{{$user->ci}}" >{{$user}} </option> --}}
                    <option value="{{ $user->ci }}">{{ $user->nombre }} {{ $user->ap }} </option>
                @endforeach
            </select>
        </div>

        <!--***************************************-->
        <div class="mb-3">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Lista de roles</label>
            @foreach ($roles as $role)
                <div class="form-check">
                    <input type="radio" class="op" name="rol" id="{{ $role->id }}" value="{{ $role->id }}">
                    <label for="{{ $role->id }}">{{ $role->name }} </label>
                </div>
            @endforeach
            @error('rol')
                <small>*{{ $message }} </small>
            @enderror
        </div>

        <!--asignar rol-->
        <a href="{{ route('users.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
