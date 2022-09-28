<?php
session_start();
if(!isset($_SESSION["rol"]))
	exit();
?>
$("boton_salir").onclick=function()
{
	ModelCall("01_login", "OPC=logout", "text");
	
	$("header").innerHTML="";
	
	$("nav").innerHTML="";
	
	//$("footer").innerHTML="";
	GetModule('01_login','main');
	Cambio();
	
	}


