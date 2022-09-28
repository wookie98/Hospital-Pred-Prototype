<form id="register_form"method="POST">
<label>identificador(SIP si se tiene)</label>
<input type="text" name="id" id="id" placeholder="SIP" required />
<br><br>

<label>Nombre</label>
<input type="text" name="nombre" id="nombre" placeholder="Nombre" required />
<br><br>

<label>Apellidos</label>
<input type="text" name="apellidos" id="apellidos" required placeholder="apellidos"/>
<br><br>

<label>Fecha de nacimiento</label>
<input type="date" name="nacimiento" id="nacimiento" required min="1900-01-01" value="1970-01-01"/>
<br><br>

<label>Sexo</label>
<select id="sexo" name="sexo">
	<option value="0">Hombre</option>
	<option value="1">Mujer</option>
</select>
<br><br>
<label>Contraseña</label>
<input type="password" name="pwd" id="pwd" placeholder="contraseña" required />
	<br/><br/>
	<input type="hidden" name="OPC" id="OPC" value="Register" />
	<button type="submit" id="register_enviar">Aceptar</button>
</form>