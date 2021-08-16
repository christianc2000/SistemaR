@extends('adminlte::page')

@section('title', 'CREAR VENTA')

@section('content_header')
    <h1>Detalle de Venta</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <h5 class="card-title m-2">Detalle</h5>
                <div class="card-body">
                    <h4>ID: <small>{{ $venta->id }}</small></h4>
                    <h4>Costo total: <small>{{ $venta->costo }} Bs</small></h4>
                    <h4>{{ $venta->llevar == '1' ? 'Comida para llevar' : 'Comida para comer en la rosticeria' }} </h4>
                    <h4>Fecha de venta: <small>{{ $venta->created_at }}</small></h4>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <h5 class="card-title m-2">Usuario que realizo la venta</h5>
                <div class="card-body">
                    <h4>Id: <small>{{ $user->id }}</small></h4>
                    <h4>Nombre: <small>{{ $user->name }}</small></h4>
                    <h4>Correo electronico: <small>{{ $user->email }}</small></h4>
                </div>
            </div>
        </div>
    </div>

    @php
        $detalleVentas=$venta->detalle_ventas;
    @endphp

    <h5 class="m-2">Productos vendidos</h5>
    @foreach ($detalleVentas as $detalleVenta)
    <div class="card">
        <div class="card-body">
            <h4>ID= <small>{{ $detalleVenta->producto_id }}</small></h4>
            @foreach ($productos as $producto)
            @php
                if($producto->id==$detalleVenta->producto_id){
                    $aux=$producto->nombre;
                    $aux2=$producto->precio;
                }
            @endphp
            @endforeach
            <h4>Nombre de producto: <small>{{$aux}} </small></h4>
            <h4>Precio: <small>{{$aux2}}</small> bs</h4>
            <h4>Cantidad: <small>{{$detalleVenta->cantidad}}</small> </h4>
            <h4>Costo: <small>{{$detalleVenta->costo_prod}}</small> </h4>
        </div>
    </div>
    @endforeach
    
    <a href="{{ route('ventas.index') }}" class="btn btn-primary mb-3" tabindex="5">Volver</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
