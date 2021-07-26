<h1>{{$modo}} Cliente </h1>
<label for="CI">CI</label>
<input type="number"  value="{{isset($cliente->CI)?$cliente->CI:''}}" id="CI" name="CI" min="0" max="99999999">
<br>
<label for="Nit">Nit</label>
<input type="number" value="{{isset($cliente->Nit)?$cliente->Nit:''}}" id="Nit" name="Nit" min="0" max="99999999">
<br>
<label for="Nombre">Nombre</label>
<input type="text" value="{{isset($cliente->Nombre)?$cliente->Nombre:''}}" name="Nombre">
<br>
<label for="Apellido">Apellido</label>
<input type="text" value="{{isset($cliente->Apellido)?$cliente->Apellido:''}}" name="Apellido">
<br>
<label for="Sexo">Sexo</label>
<input type="text" value="{{isset($cliente->Sexo)?$cliente->Sexo:''}}" name="Sexo">
<br>
<label for="Celular">Celular</label>
<input type="number" value="{{isset($cliente->celular)?$cliente->celular:''}}" id="Celular" name="Celular" min="0" max="999999999">
<br>
<label for="Enviar">Enviar</label>
<input type="submit" value="{{ $modo }} datos">

<a href="{{url('cliente/')}}">Volver</a>

<br>