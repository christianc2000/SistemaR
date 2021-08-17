@extends('adminlte::page')

@section('title', 'CREAR VENTA')

@section('content_header')
<h1>Registrar Venta</h1>
@stop

@section('content')
<form action="{{ route('ventas.update', $ventas->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">

        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="sex">Llevar</label>
        <div class="col-md-9 col-sm-9 col-xs-18">

            <input type="radio" class="op" name="llevar" id="llevar" value="1"
                {{ $ventas->llevar == '1' ? 'checked' : '' }}> <label for="llevar" class="mr-3"> Para
                llevar</label>

            <input type="radio" class="op" name="llevar" id="consumo" value="0"
                {{ $ventas->llevar == '0' ? 'checked' : '' }}> <label for="consumo">Consumo
                local</label>
            <br>
            @error('llevar')
                <small>*{{ $message }}</small>
            @enderror
        </div>
    </div>
    <!--*************productos**********************-->
    {{-- <div class="panel-body"> --}}
    <div class="row">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="">producto</label>
                <select class="form-control selectpicker" aria-label=".form-select-sm example" name="producto" required
                    onclick="mostrarPrecio()" id="producto">
                    <option selected value="xxxxxxxxxxx">Seleccionar</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}_{{ $producto->precio }}">{{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('producto')
                    <small>*{{ $message }} </small>
                @enderror
            </div>
        </div>
        <!--********************cantidad a vender*******************-->
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="pcantidad" class="col-form-label">cantidad</label>
                <input id="pcantidad" name="cantidad" type="number" class="form-control" tabindex="3" required autofocus
                    onkeyup="mostrarPrecio()" onmouseup="mostrarPrecio()" placeholder="cantidad"
                    autocomplete="direccion">
            </div>
        </div>
        <!--********************precio de producto*******************-->
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="pprecio" class="col-form-label">Precio</label>
                <input id="pprecio" name="pprecio" type="number" class="form-control" tabindex="3" required autofocus
                    placeholder="costo" disabled autocomplete="precio">
            </div>
        </div>
        <!--********************costo*******************-->
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="pcosto" class="col-form-label">costo de producto</label>
                <input id="pcosto" name="costo" type="number" class="form-control" tabindex="3" required autofocus
                    placeholder="costo total" autocomplete="precio">
            </div>
        </div>
    </div>

    {{-- boton agregar --}}
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            {{-- // guardar --}}
            <button type="submit" class="btn btn-primary" tabindex="4">Agregar</button>
            {{-- <button type="button" id="bt_add" class="btn btn-primary">agregar</button> --}}
        </div>
    </div>


    {{-- detalle de venta --}}
    <div class="card card-body">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color:#A9D0F5">
                    <th>QUITAR</th>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Precio venta</th>
                    <th>Subtotal</th>
                </thead>
                <tbody>
                    @foreach ($detalleventas as $detalleventa)

                        <th>
                            <a href='{{ url('ventas/eliminaDetalle', $detalleventa->id) }}' data-toggle="tooltip"
                                data-placement="right" title="Eliminar">
                                <div class="text-center">
                                    <div class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </th>
                        <th>{{ $detalleventa->cantidad }}</th>
                        @foreach ($productos as $producto)
                            @php
                                if ($producto->id == $detalleventa->producto_id) {
                                    $aux = $producto->nombre;
                                    $aux2 = $producto->precio;
                                }
                            @endphp
                        @endforeach
                        <th>{{ $aux }}</th>
                        <th>{{ $aux2 }}</th>
                        <th>{{ $detalleventa->costo_prod }}</th>

                </tbody>
                @endforeach
                <tfoot>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <h4 id="total">S/. {{ $ventas->costo }}</h4><input type="hidden" name="total_venta"
                            id="total_venta">
                    </th>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <a href='{{ url('ventas/carrito', $ventas->id) }}' onclick="return confirm('¿Esta seguro de cancelar la venta?')"
        data-toggle="tooltip" data-placement="right" title="Eliminar" class="btn btn-secondary">
        <i class="fas fa-trash-alt" aria-hidden="true"></i>cancelar
    </a>

    {{-- <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button> --}}
    <a href="{{ route('ventas.index') }}" class="btn btn-primary " tabindex="5">guardar</a>
</form>

<script language="javaScript">
    function mostrarPrecio() {
        datosArticulos = document.getElementById('producto').value.split('_');
        document.getElementById('pprecio').value = datosArticulos[1];
        $cant = document.getElementById('pcantidad').value.split('_');
        if ($cant != null) {
            $costototal = $cant * datosArticulos[1];
            document.getElementById('pcosto').value = $costototal;

        }
    }

    function mostrarPrecio2() {
        datosArticulos = document.getElementById('producto').value.split('_');
        $cant = document.getElementById('pcantidad').value.split('_');

        $costototal = $cant * datosArticulos[1];
        document.getElementById('pcosto').value = $costototal;

    }
</script>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
