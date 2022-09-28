<?php
if($_SESSION["rol"]!="Medico"&& $_SESSION["rol"]!="Admin")
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

function leerPacientesMed(){
// recupera el objeto html desplegable de companias
// crea el objeto httprequest
oXML = AJAXCrearObjeto();

oXML.open('POST', 'lista_pacientes.php');
oXML.onreadystatechange = leerDatosMed;
oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// lanza la peticion enviando los parametros
oXML.send("");
}


function leerDatosMed(){
	
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
$("menu_medico").onclick=function()
{
	
	GetModule('05_modeloformd','main');
	leerPacientesMed();
}

$("menu_historial").onclick=function()
{
	
	GetModule('07_historiales','main');
	leerPacientes();
	return false;
}




//----------------------------------------------------------




$("menu_permisos").onclick=function()
{
	
	GetModule('10_permisos','main');
	leerPermisos();
	return false;
}

function leerPacientes(cond){
// recupera el objeto html desplegable de companias
// crea el objeto httprequest
oXML = AJAXCrearObjeto();

oXML.open('POST', 'lista_pacientes.php');
oXML.onreadystatechange = leerDatos;
oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// lanza la peticion enviando los parametros
oXML.send("");
}


function leerDatos(){
	
// Comprobamos que se han recibido los datos
if (oXML.readyState == 4) {
// Accedemos al JSON recibido
var data = eval('('+oXML.responseText+')');

for (var i=0;i<data.length;i++)
{
		var table = $("usuarios");

		var row = document.createElement("tr");
		
		var x=document.createElement("td");
		x.innerHTML = data[i].id;
		row.appendChild(x);
		
		
		var x=document.createElement("td");
		x.innerHTML = data[i].nombre;
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data[i].apellidos;
		row.appendChild(x);
		
		var x=document.createElement("td");
		if(data[i].sexo==1)
			x.innerHTML = "mujer";
		else
			x.innerHTML = "hombre";
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data[i].nacimiento;
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data[i].rol;
		row.appendChild(x);
		
		
		
		var x=document.createElement("td");
		x.innerHTML = data[i].permisos;
		
		row.appendChild(x);
		
	
		
			var x=document.createElement("td");
			x.innerHTML = data[i].permisos;
			row.appendChild(x);
		
			var x = document.createElement("button");
			x.innerHTML = "ver todos los historiales del paciente";
			var g_id= data[i].id;
		
			(function(id){
				x.addEventListener("click", function() {
					MostrarHistoriales(id);
				})
			})(g_id)		
		
		row.appendChild(x);
		
		
		
		table.appendChild(row);
}

}
}

function MostrarHistoriales(id)
{
	GetModulePost('08_historialesSingle','main',id);
	leerHistoriales(id);
	return false;
}

function UpdatePermisos(id,permisos)
{
	var ajaxM = new XMLHttpRequest();
	ajaxM.open("POST", ("10_permisos_m.php"), false); /* false => SÍNCRIONO */
	ajaxM.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxM.send("id="+id+"&permisos="+permisos);
}

function leerHistoriales(id){
// recupera el objeto html desplegable de companias
// crea el objeto httprequest
oXML = AJAXCrearObjeto();

oXML.open('POST', 'consulta_paciente.php');
oXML.onreadystatechange = leerDatosHistorial;
oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// lanza la peticion enviando los parametros
oXML.send("id="+id);

}


function leerDatosHistorial(){
	
// Comprobamos que se han recibido los datos
if (oXML.readyState == 4) {
// Accedemos al JSON recibido
var data = eval('('+oXML.responseText+')');


		var table = $("usuarios");

		var row = document.createElement("tr");
		
		var x=document.createElement("td");
		x.innerHTML = data.id;
		x.id="user_id";
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data.nombre;
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data.apellidos;
		row.appendChild(x);
		
		var x=document.createElement("td");
		if(data.sexo==1)
			x.innerHTML = "mujer";
		else
			x.innerHTML = "hombre";
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data.nacimiento;
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data.rol;
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data.permisos;
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data.permisos;
		
		row.appendChild(x);
		
		table.appendChild(row);

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
		
		
		var x = $("residencia");
		if(data.Res==1)
			x.value="Rural";
		else
			x.value="Urbano";
		
				
		var x = $("trabajo");
		x.value=data.work;
		
		var x = $("glucosa");
		x.value=data.gluc;
		
		var x = $("bmi");
		x.value=data.bmi;
		
		var x = $("fuma");
		x.value=data.smoking;
		
		var x = $("id_historial");
		var option = document.createElement("option");
		option.text = data.id_historial;
		x.add(option);
		
		var x=$("resultado");
		x.value=data.resultado+"%";
		
		}
		else
		{
			var body=$("relleno");
			body.innerHTML="No tiene historiales";
		}
		
}
}



//---------------------------Permisos---------------------------------
function leerPermisos(){
// recupera el objeto html desplegable de companias
// crea el objeto httprequest
oXML = AJAXCrearObjeto();

oXML.open('POST', 'lista_pacientes.php');
oXML.onreadystatechange = leerDatosPermisos;
oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// lanza la peticion enviando los parametros
oXML.send("");
}

var g_id;

function leerDatosPermisos(){
	
// Comprobamos que se han recibido los datos
if (oXML.readyState == 4) {
// Accedemos al JSON recibido
var data = eval('('+oXML.responseText+')');

for (var i=0;i<data.length;i++)
{
		var table = $("usuarios");

		var row = document.createElement("tr");
		
		var x=document.createElement("td");
		x.innerHTML = data[i].id;
		row.appendChild(x);
		
		
		var x=document.createElement("td");
		x.innerHTML = data[i].nombre;
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data[i].apellidos;
		row.appendChild(x);
		
		var x=document.createElement("td");
		if(data[i].sexo==1)
			x.innerHTML = "mujer";
		else
			x.innerHTML = "hombre";
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data[i].nacimiento;
		row.appendChild(x);
		
		var x=document.createElement("td");
		x.innerHTML = data[i].rol;
		row.appendChild(x);
		
		
		
		var x=document.createElement("td");
		x.innerHTML = data[i].permisos;
		
		row.appendChild(x);
		
			var g_id= data[i].id;
		
		
			var x=document.createElement("td");
			var y=document.createElement("select");
			var z=document.createElement("option");
			z.innerHTML="1";
			y.add(z);
			var z=document.createElement("option");
			z.innerHTML="0";
			y.add(z);
			y.value=data[i].permisos;
			(function(id){
				y.addEventListener("change", function() {
					UpdatePermisos(id,this.value);
				})
			})(g_id)
			if(data[i].rol!="Paciente")
			{
				y.setAttribute("disabled",true);
			}
			x.appendChild(y);
			row.appendChild(x);
		
			
			
		
		row.appendChild(x);
		
		
		
		table.appendChild(row);
}

}
}
