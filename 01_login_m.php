<?php
session_start();
include("mysql.php");

/* 1) Seguridad y caracteres especiales */
$usr = $mysqli->real_escape_string($_POST["usr"]);
$pwd = $mysqli->real_escape_string($_POST["pwd"]);

/* 2) OPCIONES */
switch($_POST["OPC"])
{
	case "LOGIN":
		/* dentro de CASE "LOGIN" */
$SQL="SELECT * FROM  usuarios "
    ."WHERE id='$usr' AND password=PASSWORD('$pwd')";
$res = $mysqli->query($SQL);
if($res->num_rows == 1)
{ /* USER OK */
	$fila = $res->fetch_assoc();
	$_SESSION["Id"]=$fila["Id"];
	#$_SESSION["login"]=$fila["login"];
	$_SESSION["rol"]=$fila["Rol"];
	$_SESSION["nombre"]=$fila["nombre"];
	$_SESSION["apellidos"]=$fila["apellidos"]; 
	$_SESSION["nacimiento"]=$fila["fecha_nacimiento"];
	$_SESSION["sexo"]=$fila["sexo"];
	$_SESSION["permisos"]=$fila["permisos"];
	echo "USER_OK";
}
else
{ /* USER ERROR */
	echo "user NO K";
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
