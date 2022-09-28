<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<script src="index.js"></script>
</head>
<body>
	<form id="datos" name="datos">
		
		<input type="text" id="nombre" name="nombre"/>
		<input type="password" id="PWD" name="PWD"/>
		<input type="checkbox" id="ok" name="ok"/>
		<select id="seleccion" name="seleccion">
			<option>1</option><!--si escribo value pilla value sino no-->
			<option>2</option>
			<option>3</option>
		</select>
		
		<textarea id="rellena" name="rellena"></textarea>
</form>
<button onclick="alert(GetDataForm('datos'))">Ver 1</button><br/>
<button onclick="alert(ScanDataForm($('datos')))">Ver 2</button><br/>
</body>
</html>