<form id="modelo" method="POST">

	<label>Elija el paciente</label>
	<br>
	<select id="paciente" name="paciente">
	<option id="vacio" value=""></option>
	</select>
	
	<h2 id="nombre">Nombre</h2>
	<br><br>
	
	<label>hipertensi&oacute;n</label>
	<input type="checkbox" name="hipertension" id="hipertension"/>
	<br><br>
	
	<label>enfermedad del coraz&oacute;n</label>
	<input type="checkbox" name="enfermedad corazon" id="enfermedad_corazon"/>
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
	<input type="number" name="glucosa" id="glucosa" min="0.00" max="300.00" step="0.01" value="150.00"/>
	<br><br>
	
	<label>BMI</label>
	<input type="number" name="bmi" id="bmi" min="0.0" max="100.0" step="0.1" value="50.0"/>
	<br><br>
	
	<label for="fuma">estado como fumador:</label>
	<select id="fuma" name="fuma">
	<option value="Unknown">Desconocido</option>
	<option value="formerly smoked">fumaba</option>
	<option value="smokes">fuma</option>
	<option value="never smoked">nunca ha fumado</option>
	</select>
	
	<input type="hidden" name="nacimiento" id="nacimiento" value="nacimiento"/>
	<input type="hidden" name="sexo" id="sexo" value=""/>
	<input type="hidden" name="OPC" id="OPC" value="cardiovascular"/>
	<button type="submit" id="modelo_button" disabled="disabled">Aceptar</button>
</form>
<div id="modelo_res"> </div>