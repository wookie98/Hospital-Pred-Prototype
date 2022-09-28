<?php
if($_SESSION["rol"]!="Medico"&& $_SESSION["rol"]!="Admin" && $_SESSION["rol"]!="Paciente" )
{
	exit();
}
?>

//Lo de DAI pero con JSON en lugar de XML
function AJAXCrearObjeto(){
var obj;
if (window.XMLHttpRequest) { // no es IE
obj = new XMLHttpRequest();
//alert('El navegador no es IE');
}
else { // Es IE o no tiene el objeto
try {
obj = new ActiveXObject("Microsoft.XMLHTTP");
// alert('El navegador utilizado es IE');
}
catch (e) {
// alert('El navegador utilizado no está soportado');
}
}
//alert('realizado');
return obj;
}

function mostrar_pacientePac(){
// recupera el objeto html desplegable de companias
// crea el objeto httprequest
oXML = AJAXCrearObjeto();

oXML.open('POST', 'consulta_propia.php');
oXML.onreadystatechange = leerDatosSinglePac;
oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// lanza la peticion enviando los parametros
oXML.send("");
}


function leerDatosSinglePac(){
	
// Comprobamos que se han recibido los datos
if (oXML.readyState == 4) {
// Accedemos al JSON recibido
var data = eval('('+oXML.responseText+')');

//for (var i=0;i<data.length;i++)
	if(data.id!="-1")
	{
		var x = $("hipertension");
		if(data.hyper==1)
			x.checked=true;
		else
			x.checked=false;
		
		var x = $("alguna_vez_casado");
		if(data.married==1)
			x.checked=true;
		else
			x.checked=false;
		
		
		var x = $("enfermedad_corazon");
		if(data.heart==1)
			x.checked=true;
		else
			x.checked=false;
	
		var x = $("sexo");
		if(data.sexo==1)
			x.value="mujer";
		else
			x.value="hombre";
		
		var x = $("residencia");
		if(data.Res==1)
			x.value="Rural";
		else
			x.value="Urbano";
		
		
		var x = $("nombre");
		x.value=data.nombre;
		
		var x = $("apellidos");
		x.value=data.apellidos;
		
		var x = $("trabajo");
		x.value=data.work;
		
		
		
		var x = $("glucosa");
		x.value=data.gluc;
		
		var x = $("bmi");
		x.value=data.bmi;
		
		var x = $("fuma");
		x.value=data.smoking;
		
		var x = $("nacimiento");
		x.value=data.nacimiento;
		
		
			var x = $("id");
			x.value=data.id;
		if(data.permisos=="0")
		{
			var x=$("modelo_button");
		x.disabled=true;
		}
		else
		{
			var x=$("modelo_button");
		x.disabled=false;
		}
	}
	else
	{
		var x=$("secret");
		x.innerHTML="No tiene historiales";
		var x=$("modelo_button");
		x.disabled=true;
	}
	

}
}


$("menu_paciente").onclick=function()
{
	
	GetModule('05_modeloformp','main');
	mostrar_pacientePac();
}
