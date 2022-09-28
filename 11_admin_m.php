<?php
session_start();
include("mysql.php");

/* 1) Seguridad y caracteres especiales */
$usr = $mysqli->real_escape_string($_POST["paciente"]);
$age = $mysqli->real_escape_string($_POST["nacimiento"]);
$sex = $mysqli->real_escape_string($_POST["sexo"]);
$nombre = $mysqli->real_escape_string($_POST["nombre"]);
$apellidos = $mysqli->real_escape_string($_POST["apellidos"]);
$rol = $mysqli->real_escape_string($_POST["rol"]);
$permisos = $mysqli->real_escape_string($_POST["permisos"]);

//echo $age;



/* 2) OPCIONES */
switch($_POST["OPC"])
{
	
	case "datos":
		/* dentro de CASE "LOGIN" */
$SQL="update usuarios set fecha_nacimiento='$age', sexo='$sex', nombre='$nombre', apellidos='$apellidos', Rol='$rol', permisos='$permisos' where id='$usr'";
$res = $mysqli->query($SQL);
		break;
		
	case "logout":
		$_SESSION["id"]=NULL;
	$_SESSION["login"]=NULL;
	$_SESSION["rol"]=NULL;
	$_SESSION["nombre"]=NULL;
	unset($_SESSION);
	session_destroy();
	break;
	default:
		break;
}

//print_r($_POST);

?>