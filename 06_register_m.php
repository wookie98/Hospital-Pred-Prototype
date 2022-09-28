<?php
session_start();
include("mysql.php");

/* 1) Seguridad y caracteres especiales */
$id = $mysqli->real_escape_string($_POST["id"]);
$pwd = $mysqli->real_escape_string($_POST["pwd"]);

$nombre = $mysqli->real_escape_string($_POST["nombre"]);
$apellidos = $mysqli->real_escape_string($_POST["apellidos"]);
$sexo = $mysqli->real_escape_string($_POST["sexo"]);
$nacimiento = $mysqli->real_escape_string($_POST["nacimiento"]);

/* 2) OPCIONES */
switch($_POST["OPC"])
{
	case "Register":
		/* dentro de CASE "LOGIN" */
$SQL="SELECT * FROM  usuarios "
    ."WHERE id='$id'";
$res = $mysqli->query($SQL);
if($res->num_rows == 1)
{
	echo "user NO K"; /* USER Already in */
}
else
{
	$SQL="Insert into usuarios values('$id','$nacimiento','$nombre','$apellidos',PASSWORD('$pwd'),$sexo,'Paciente',0)";
$res = $mysqli->query($SQL);
	$_SESSION["Id"]=$id;
	#$_SESSION["login"]=$fila["login"];
	$_SESSION["rol"]="Paciente";
	$_SESSION["nombre"]=$nombre; //como es un array hay que concat con .
	$_SESSION["apellidos"]=$apellidos;
	$_SESSION["nacimiento"]=$nacimiento;
	$_SESSION["sexo"]=$sexo;
	$_SESSION["permisos"]=0;
	echo "USER_OK";
}
		break;
	echo "LOgin out";
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