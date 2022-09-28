/*
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

function mostrar_paciente(){
// recupera el objeto html desplegable de companias
// crea el objeto httprequest
oXML = AJAXCrearObjeto();

oXML.open('POST', 'consulta_paciente.php');
oXML.onreadystatechange = leerDatosSingle;
oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// lanza la peticion enviando los parametros
oXML.send("id="+$("paciente").value);
}


function leerDatosSingle(){
	
// Comprobamos que se han recibido los datos
if (oXML.readyState == 4) {
// Accedemos al JSON recibido
var data = eval('('+oXML.responseText+')');

	var x = $("sexo");
	x.value=data.sexo;
	var x = $("nacimiento");
	x.value=data.nacimiento;
	
	var x = $("nombre");
	x.innerHTML=data.nombre+" "+data.apellidos;

if (data.id>=0)
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
		
}
else
{
	
	var x = $("hipertension");
	x.checked=false;
		
	var x = $("alguna_vez_casado");
	x.checked=false;
		
		
	var x = $("enfermedad_corazon");
	x.checked=false;
		
		
	var x = $("residencia");
	x.value="Rural";
		
			
	var x = $("trabajo");
	x.value="Private";
		
		
	var x = $("glucosa");
	x.value=100;
		
	var x = $("bmi");
	x.value=20;
		
	var x = $("fuma");
	x.value="Unknown";
}
}
}


$("paciente").onchange=function()
{
		mostrar_paciente();
		$("modelo_button").removeAttribute("disabled");
		var x=$("vacio");
		if(vacio.value="elija")
			$("paciente").remove(x);
}

function leerPacientes(){
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
		var x = $("paciente");
		var option = document.createElement("option");
		option.text = data[i].id;
		x.add(option);
		
}

}
}


$("solicitar_historial").onclick=function()
{
	var resp = GetModule('07_historiales','main');
	
}*/