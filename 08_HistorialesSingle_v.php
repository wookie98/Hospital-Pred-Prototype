
	
	
<table id="usuarios">
<tr><th>Id</th><th>Nombre</th><th>apellidos</th><th>sexo</th><th>nacimiento</th><th>Rol</th><th>permisos</th></tr>

	
</table>
<h1>Elija el historial</h1>
<br>
	<select id="id_historial" name="id_historial">
	
	</select>

<div id="relleno"></div>
<form id="modelo" method="POST">
	<label>hipertensi&oacute;n</label>
	<input type="checkbox" name="hipertension" id="hipertension" readonly="readonly"/>
	<br><br>
	
	<label>enfermedad del coraz&oacute;n</label>
	<input type="checkbox" name="enfermedad_corazon" id="enfermedad_corazon" readonly="readonly"/>
	<br><br>
	
	<label>ha estado casado</label>
	<input type="checkbox" name="alguna_vez_casado" id="alguna_vez_casado"/>
	<br><br>
	
	<label for="trabajo">tipo de trabajo:</label>
	<select id="trabajo" name="trabajo">
	<option value="Private">Privado</option>
	<option value="Self-employed">Aut&oacute;nomo</option>
	<option value="Govt_job">Funcionario</option>
	<option value="children">Estudiante o niño</option>
	</select>
	
	<label for="residencia">tipo de residencia:</label>
	<select id="residencia" name="residencia">
	<option value="Rural">Rural</option>
	<option value="Urbano">Urbano</option>
	</select>
	
	<label>glucosa</label>
	<input type="number" name="glucosa" id="glucosa" min="0.00" max="300.00" step="0.01" value="150.00" readonly="readonly"/>
	<br><br>
	
	<label>BMI</label>
	<input type="number" name="bmi" id="bmi" min="0.0" max="100.0" step="0.1" value="50.0" readonly="readonly"/>
	<br><br>
	
	<label for="fuma">estado como fumador:</label>
	<select id="fuma" name="fuma">
	<option value="Unknown">Desconocido</option>
	<option value="formerly smoked">fumaba</option>
	<option value="smokes">fuma</option>
	<option value="never smoked">nunca ha fumado</option>
	</select>
	<br>
	<input type="text" id="resultado" readonly="readonly"/>
	
	
</form>