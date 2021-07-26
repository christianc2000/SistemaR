@extends('adminlte::page')

@section('title', 'CREAR VENTA')

@section('content_header')
    <h1>Registrar Venta</h1>
@stop

@section('content')
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf

        <div class="form-group">

            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="sex">Llevar</label>
            <div class="col-md-9 col-sm-9 col-xs-18">

                <input type="radio" class="op" name="llevar" id="llevar" value="1"> <label for="llevar" class="mr-3"> Para
                    llevar</label>

                <input type="radio" class="op" name="llevar" id="consumo" value="0"> <label for="consumo">Consumo
                    local</label>
                <br>
                @error('sexo')
                    <small>*{{ $message }}</small>
                @enderror
            </div>
        </div>
        <!--*************productos**********************-->
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="">producto</label>
                        <select class="form-control selectpicker" aria-label=".form-select-sm example" name="pidproducto"
                            onclick="mostrarPrecio()" id="pidproducto">
                            <option selected>Seleccionar</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}_{{ $producto->precio }}">{{ $producto->nombre }}
                                </option>
                            @endforeach
                        </select>
                        {{-- <br>
            @error('codCargo')
                <small>*{{ $message }} </small>
            @enderror --}}
                    </div>
                </div>
                <!--********************cantidad a vender*******************-->
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad" class="col-form-label">cantidad</label>
                        <input id="pcantidad" name="pcantidad" type="number" class="form-control" tabindex="3" required
                            autofocus placeholder="cantidad" autocomplete="direccion">
                    </div>
                </div>
                <!--********************precio de producto*******************-->
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="precio" class="col-form-label">Precio</label>
                        <input id="pprecio" name="pprecio" type="number" class="form-control" tabindex="3" required
                            autofocus placeholder="costo" disabled autocomplete="precio">
                    </div>
                </div>
            </div>
            {{-- boton agregar --}}
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <button type="button" id="bt_add" class="btn btn-primary">agregar</button>
                </div>
            </div>
            {{-- detalle de venta --}}
            <div class="card card-body">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">
                            <th>Opciones</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio venta</th>
                            <th>Subtotal</th>
                        </thead>
                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <h4 id="total">S/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta">
                            </th>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--ERROR precio-->
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>


    <script language="javaScript">
        function mostrarPrecio() {
            datosArticulos = document.getElementById('pidproducto').value.split('_');
            document.getElementById('pprecio').value = datosArticulos[1];
        }
    </script>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
