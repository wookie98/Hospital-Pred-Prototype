/*
Librería con las funciones comunes del MOTOR AJAX
(y otras funciones útiles en javascript)
*/

function $(id){return document.getElementById(id);}

function GetDataForm(form)
{
	var f, data, pair, strData="";

	if( (f=$(form)) && (data=new FormData($(form))) )//si true es porque form es un id de formulario
	{
		if(data.entries) /* para chrome y firefox */
			for(pair of data.entries())//pair name y value
				strData+=pair[0] + "=" + encodeURIComponent(pair[1]) + "&";
		else /* para edge, explorer, safari, opera, ... */
			strData=ScanDataForm(f);  /* ver esta función a continuación */
	}
	else
		strData=form;
	return strData;
}

var ON=1; var OFF=0; /* cambiar estos valores si se considera oportuno */
function ScanDataForm(f)
{
	if(!f) return "";

	var i,j,x, val;
	var cad="";
	var radioNom="";

	for(i=0;i<f.length;i++) /* recorre todos los elementos 'x' del formulario */
	{
		x=f.elements[i];  /* ignorar elementos sin nombre*/
		if(typeof(x.name)!="undefined" && x.name.length>0)
		{
			val=undefined; /* inicialización del valor a 'no-definido' */
			switch(x.type) /* según sea el tipo del elementos de formulario */
			{
				case "text": case "password": case "hidden": case "textarea":
					val=x.value.trim();
					break;

				case "select-one":
					if(x.options.length>0 && x.selectedIndex>=0 && x.selectedIndex<x.options.length)
						val=(x.options[x.selectedIndex].value) ?
							x.options[x.selectedIndex].value : x.options[x.selectedIndex].text;
					break;

				case "checkbox":
					val=(x.checked)?ON:OFF; /* valores ON/OFF según 'checked' sí o no */
					break;
					
				case "radio":
					if(radioNom!=x.name)
					{
						radioNom=x.name;
						j=0;
						while(f.elements[radioNom][j] && val=="")
						{
							if(f.elements[radioNom][j].checked)
							val=f.elements[radioNom][j].value;
							j++;
						}
					}
					break;

				default: /* case "button": case "reset": case "submit": case "file": IGNORAR */
					val=undefined; /* no es necesario, se añade para entender mejor el código */
					break;

			}
			if(val!=undefined)
			{
				if(cad!="")
					cad+="&";
				cad+=x.name+"="+encodeURIComponent(val); /* par atributo=valor */
			}

		}
	}
	return cad; /* cadena de pares atributo/valor: "x1=val1&x2=val2&..." */
}


function Cambio()
{
	var tipo = ($("header").className=="header2" ? "1" : "2");
	$("header").className=("header"+tipo);
	$("footer").className=("footer"+tipo);
	$("nav").className=("nav"+tipo);
	$("main").className=("main"+tipo);
}

function LoadCSS(cssURL, cssID) 
{
	if(!$(cssID))
	{
		var css=document.createElement("link");
		css.id = cssID;
		css.rel = "stylesheet";
		css.type = "text/css";
		css.href = cssURL;
		css.media = "all";
		document.getElementsByTagName('head')[0].appendChild(css);
	}
}
function GetModule(mod, target)//mod es el nombre del modulo ej:clientes
{
	LoadCSS((mod+".css"), ("cssID_"+mod)); /* opcional */

	var ajaxV = new XMLHttpRequest();
	ajaxV.open("POST", (mod+"_v.php"), false); /* false => SÍNCRIONO */
	ajaxV.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxV.send();
	$(target).innerHTML=ajaxV.responseText; /* vuelca el texto en la capa indicada */

	var ajaxC = new XMLHttpRequest();
	ajaxC.open("POST", (mod+"_c.php"), false); /* false => SÍNCRIONO */
	ajaxC.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxC.send();
	try{eval(ajaxC.responseText);} /* ejecuta código Javascript */
	catch(e){console.log("## ERROR GetModule '"+mod+"'\n\n"+ajaxC.responseText);}
}

function GetModulePost(mod, target, post)//mod es el nombre del modulo ej:clientes
{
	LoadCSS((mod+".css"), ("cssID_"+mod)); /* opcional */

	var ajaxV = new XMLHttpRequest();
	ajaxV.open("POST", (mod+"_v.php"), false); /* false => SÍNCRIONO */
	ajaxV.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxV.send(post);
	$(target).innerHTML=ajaxV.responseText; /* vuelca el texto en la capa indicada */

	var ajaxC = new XMLHttpRequest();
	ajaxC.open("POST", (mod+"_c.php"), false); /* false => SÍNCRIONO */
	ajaxC.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxC.send();
	try{eval(ajaxC.responseText);} /* ejecuta código Javascript */
	catch(e){console.log("## ERROR GetModule '"+mod+"'\n\n"+ajaxC.responseText);}
}

function ModelCall(mod, form, type)
{
	var postData=GetDataForm(form); /* ver esta función a continuación */

	var ajaxM = new XMLHttpRequest();
	ajaxM.open("POST", (mod+"_m.php"), false); /* false => SÍNCRIONO */
	ajaxM.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxM.send(postData);
	if(type.toUpperCase()=="TEXT") /* Texto plano o Javascript/JSON */
		return ajaxM.responseText;
	try{return eval(ajaxM.responseText);}
	catch(e){console.log("## ERROR ModellCall '"+mod+"' / '"+form+"'\n\n"
                          + ajaxM.responseText);}
}

