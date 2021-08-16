@extends('adminlte::page')

@section('title', 'CREAR VENTA')

@section('content_header')
<h1>Registrar Venta</h1>
@stop

@section('content')
<form action="{{ route('ventas.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label class="col-form-label" for="">Cliente</label>
        <select  name="cliente" required
            id="cliente">
            <option selected value="xxxxxxxxxxx">sin cliente</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->Nombre}} {{ $cliente->Apellido}}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">

        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="sex">Llevar</label>
        <div class="col-md-9 col-sm-9 col-xs-18">

            <input type="radio" class="op" name="llevar" id="llevar" value="1"> <label for="llevar" class="mr-3"> Para
                llevar</label>

            <input type="radio" class="op" name="llevar" id="consumo" value="0"> <label for="consumo">Consumo
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
                <label class="col-form-label" for="">producto</label>
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
                    <th>Opciones</th>
                    <th>Cantidad</th>
                    <th>Producto</th>
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
    {{-- </div> --}}
    <!--ERROR precio-->
    <a href="{{ route('ventas.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
    {{-- <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button> --}}
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
