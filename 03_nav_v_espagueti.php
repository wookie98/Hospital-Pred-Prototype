<?php
session_start();
if(!isset($_SESSION["rol"]))
	exit();

if($_SESSION["rol"]=="Paciente" ||$_SESSION["rol"]=="Admin")
	echo "<button id='menu_almacen'>Almacen</button><br/>";
if($_SESSION["rol"]=="comercial" ||$_SESSION["rol"]=="admin")
	echo "<button id='menu_clientes'>clientes</button><br/>";
if($_SESSION["rol"]=="admin")
	echo "<button id='menu_usuarios'>usuarios</button><br/>";
{
	
}
?>
<h1>hola soy el menu</h1>