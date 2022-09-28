$("datos_button").onclick=function()
{
	var resp = ModelCall("11_admin", "datos", "text");
	//alert(resp);
	/*if(resp=="USER_OK")
	{
		Cambio();
		GetModule('02_header','header');
		GetModule('03_nav','nav');
		GetModule('04_main','main');
	}
	else
	{
		//$("login_msg").innerHTML="Usuario y password erroneo");
		//setTimeout("$('login_msg').innerHTML=''",3000);
	}
	//$("header").innerHTML=resp;*/
	return false;
}

$("borrar_button").onclick=function()
{
	var ajaxM = new XMLHttpRequest();
	ajaxM.open("POST", ("borrar_paciente.php"), false); /* false => SÍNCRIONO */
	ajaxM.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var x=$("paciente")
	var id=x.value;
	ajaxM.send("id="+id);
	
	var x=$("borrar_button");
	x.setAttribute("disabled",true);
	var x=$("datos_button");
	x.setAttribute("disabled",true);
	
	var x = $("sexo");
	x.value="";
	
	var x = $("nacimiento");
	x.value="";
	
	
	var x = $("permisos");
	x.value="";
	
	var x = $("nombre");
	x.value="";
	
	var x = $("apellidos");
	x.value="";
	
	var x = $("rol");
	x.value="";
	
	var x=$("paciente")
	
	for (var i=0; i<x.length; i++) {
    if (x.options[i].value == id)
        x.remove(i);
}
x.value="";
	
	return false;
}

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
	
	
	var x = $("permisos");
	x.value=data.permisos;
	
	var x = $("nombre");
	x.value=data.nombre;
	
	var x = $("apellidos");
	x.value=data.apellidos;
	
	var x = $("rol");
	x.value=data.rol;


}
}


$("paciente").onchange=function()
{
		mostrar_paciente();
		$("datos_button").removeAttribute("disabled");
		$("borrar_button").removeAttribute("disabled");
		var x=$("vacio");
		if(vacio!=null)
			$("paciente").remove(x);
}