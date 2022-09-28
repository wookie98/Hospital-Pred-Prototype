<?php
if(session_status()!=PHP_SESSION_ACTIVE
||$_SESSION["rol"]!="Admin")
{
	exit();
}
?>
function leerAdmin(){
// recupera el objeto html desplegable de companias
// crea el objeto httprequest
oXML = AJAXCrearObjeto();

oXML.open('POST', 'lista_pacientes.php');
oXML.onreadystatechange = leerDatosAdmin;
oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// lanza la peticion enviando los parametros
oXML.send("");
}


function leerDatosAdmin(){
	
// Comprobamos que se han recibido los datos
if (oXML.readyState == 4) {
// Accedemos al JSON recibido
var data = eval('('+oXML.responseText+')');

for (var i=0;i<data.length;i++)
{
		var x = $("paciente");
		var option = document.createElement("option");
		option.text = data[i].id;
		x.add(option);
		
}
}
}
$("menu_admin").onclick=function()
{
	
	GetModule('11_admin','main');
	leerAdmin();
}

