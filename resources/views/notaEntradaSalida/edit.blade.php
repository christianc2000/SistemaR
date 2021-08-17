@extends('adminlte::page')

@section('title', 'CREAR NOTA ENTRADA SALIDA')

@section('content_header')
    <h1>Nota Entrada Salida</h1>
@stop

@section('content')


 
        @if ($notaEntradaSalida->tipo==0)
        <label for="" class="col-form-label">Tipo Entrada</label>        
    
        @endif
        @if ($notaEntradaSalida->tipo==1)
        <label for="" class="col-form-label">Tipo Salida</label>       
    
        @endif
        @if ($notaEntradaSalida->tipo==2)
        <label for="" class="col-form-label"> Tipo Perdida</label>          
        @endif  
        

<br/>
<form action="{{route('notaEntradaSalidas.destroy',$notaEntradaSalida)}}" method="POST" >
    <a  class="btn btn-primary">Imprimir</a>                        
    @csrf 
    @method('delete')
    <button type="submit" class="btn btn-danger">Cancelar Todo</button>
</form>

<form action="{{route('detalleNotaEntradaSalidas.store')}}"  method="POST">
@csrf
@method('post')
<div   class=  "row">

    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
    <label for="" class="col-form-label">Codigo de Nota</label>
    <input id="codigo"  name="codigo" type="number" class="form-control" readonly tabindex="2" required autofocus autocomplete="cantidad" value="{{$notaEntradaSalida->id}}"> 
    </div>
    </div>    
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
    <label for="" class="col-form-label">Producto</label>
    <select class="form-control selectpicker" aria-label=".form-select-sm example" id="producto" name="producto" required id="producto" >
        @foreach ($productos as $producto)
            <option value="{{$producto->id}}">{{$producto->nombre}}</option>
        @endforeach
    </select>
    </div>
    </div>


    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="form-group">
        <label for="" class="col-form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="2" required autofocus autocomplete="cantidad"  >
    </div>  
    </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
        <label for="" class="col-form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2" required autofocus autocomplete="descripcion"  >
        </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Agregar detalle</button>
</form>
<br/>
<table id="table" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
       <tr>
          <th scope="col">Producto</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Acciones</th>

       </tr>

    </thead>
    <TBODY>
        @foreach ($detalles as $detalle)

          <tr>
              <td>{{$producto->where('id',$detalle->producto_id)->first()->nombre}}</td>
              <td>{{$detalle->cantidad}}</td> 
              <td>{{$detalle->Descripcion}}</td>
              <td>
                    <form action="{{route('detalleNotaEntradaSalidas.destroy',$detalle)}}" method="POST">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                      
                        @csrf  <!--metodo para añadir token a un formulario-->
                        @method('delete')
                    </form>   
              </td>
          </tr>
          @endforeach
    </TBODY>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@if (!empty($error))
    <script language="javaScript"> alert('Ya existe esta combinacion') </script>
@endif

@stop
