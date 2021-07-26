<h1>{{$modo}} Cliente </h1>
<div class="mb-3">
<label for="CI"  class="col-form-label">CI</label>
<input  class="form-control" tabindex="2" required autofocus autocomplete="ci" type="number"  value="{{isset($cliente->CI)?$cliente->CI:''}}" id="CI" name="CI" min="0" max="99999999">
</div>
<br>
<label for="Nit"  class="col-form-label">Nit</label>
<input  class="form-control" tabindex="2" required autofocus autocomplete="Nit" type="number" value="{{isset($cliente->Nit)?$cliente->Nit:''}}" id="Nit" name="Nit" min="0" max="99999999">
<br>
<label for="Nombre"  class="col-form-label">Nombre</label>
<input  class="form-control" tabindex="2" required autofocus autocomplete="Nombre" type="text" value="{{isset($cliente->Nombre)?$cliente->Nombre:''}}" name="Nombre">
<br>
<label for="Apellido"  class="col-form-label">Apellido</label>
<input  class="form-control" tabindex="2" required autofocus autocomplete="Apellido" type="text" value="{{isset($cliente->Apellido)?$cliente->Apellido:''}}" name="Apellido">
<br>
<label for="Sexo"  class="col-form-label">Sexo</label>
<input  class="form-control" tabindex="2" required autofocus autocomplete="Sexo" type="text" value="{{isset($cliente->Sexo)?$cliente->Sexo:''}}" name="Sexo">
<br>
<label for="Celular"  class="col-form-label">Celular</label>
<input  class="form-control" tabindex="2" required autofocus autocomplete="Celular"  type="number" value="{{isset($cliente->celular)?$cliente->celular:''}}" id="Celular" name="Celular" min="0" max="999999999">
<br>
<button class="btn btn-danger mb-4" type="submit" value="{{ $modo }} datos" tabindex="4">Guardar</button>

<a href="{{url('cliente/')}}" class="btn btn-primary mb-4" tabindex="4">Volver</a>

<br>

