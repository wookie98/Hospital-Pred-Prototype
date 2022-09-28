<form id="datos" method="POST">

	<label>Elija el paciente</label>
	<br>
	<select id="paciente" name="paciente">
	<option id="vacio" value="0"></option>
	</select>
	
	
	
	<br><br>
	
	<input type="text" name="nombre" id="nombre" value=""/>
	
	<input type="text" name="apellidos" id="apellidos" value=""/>
	
	<select id="rol" name="rol">
	<option>Admin</option>
	<option value="Medico">Medico</option>
	<option>Paciente</option>
	</select>
	
	<select id="sexo" name="sexo">
	<option value="1">Mujer</option>
	<option value="0">Hombre</option>
	</select>
	
	<select id="permisos" name="permisos">
	<option>1</option>
	<option>0</option>
	</select>
	
	
	
	<input type="date" name="nacimiento" id="nacimiento" value="nacimiento"/>
	
	<input type="hidden" name="OPC" id="OPC" value="datos"/>
	<button type="submit" id="datos_button" disabled="disabled">Actualizar</button>
</form>
<br><br>
<button type="submit" id="borrar_button" disabled="disabled">Borrar</button>