
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
var boleanoDropDown=false;
$("id_historial").onclick=function()
{
	if(boleanoDropDown==false)
	{
		boleanoDropDown=true;
		mostrar_historiales()
	}
}

$("id_historial").onchange=function()
{
	mostrar_paciente();
}

function mostrar_paciente(){
// recupera el objeto html desplegable de companias
// crea el objeto httprequest
oXML = AJAXCrearObjeto();

oXML.open('POST', 'consulta_pacienteHistorial.php');
oXML.onreadystatechange = leerPaciente;
oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// lanza la peticion enviando los parametros
oXML.send("id="+$("user_id").innerHTML+"&id_historial="+$("id_historial").value);
}

function mostrar_historiales(){
// recupera el objeto html desplegable de companias
// crea el objeto httprequest
oXML = AJAXCrearObjeto();

oXML.open('POST', 'lista_historiales.php');
oXML.onreadystatechange = leerDatos;
oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// lanza la peticion enviando los parametros
oXML.send("id="+$("user_id").innerHTML);
}

function leerDatos(){
	
// Comprobamos que se han recibido los datos
if (oXML.readyState == 4) {
// Accedemos al JSON recibido
var data = eval('('+oXML.responseText+')');

for (var i=1;i<data.length;i++)
{
		var x = $("id_historial");
		var option = document.createElement("option");
		option.text = data[i].id;
		x.add(option);
		
}
}
}


function leerPaciente(){
	
// Comprobamos que se han recibido los datos
if (oXML.readyState == 4) {
// Accedemos al JSON recibido
var data = eval('('+oXML.responseText+')');


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
		
		var x=$("resultado");
		x.value=data.resultado+"%";
		}
		

}
}
