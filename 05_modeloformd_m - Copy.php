<?php
session_start();
include("mysql.php");

/* 1) Seguridad y caracteres especiales */
$usr = $mysqli->real_escape_string($_SESSION["Id"]);
$age = $mysqli->real_escape_string($_SESSION["nacimiento"]);
$sex = $mysqli->real_escape_string($_SESSION["sexo"]);
echo $age;
if( isset($_POST["hipertension"]))
{
	$hyper=1;
}
else
	$hyper=0;
if( isset($_POST["enfermedad_corazon"]))
{
	$heart=1;
}
else
	$heart=0;
if( isset($_POST["alguna_vez_casado"]))
{
	$married=1;
}
else
	$married=0;
$work = $mysqli->real_escape_string($_POST["trabajo"]);
$residence = $mysqli->real_escape_string($_POST["residencia"]);
$glucose = $mysqli->real_escape_string($_POST["glucosa"]);
$bmi = $mysqli->real_escape_string($_POST["bmi"]);
$smoke = $mysqli->real_escape_string($_POST["fuma"]);


/* 2) OPCIONES */
switch($_POST["OPC"])
{
	
	case "cardiovascular":
		/* dentro de CASE "LOGIN" */
$SQL="select * from historial order by id_historial desc limit 1";
$res = $mysqli->query($SQL);
if($res->num_rows == 1)
{
	$fila = $res->fetch_assoc();
	$id= $fila["id_historial"];
	$id=$id+1;
}
else
{
	$id=0;
}
//SQL="Insert into atributos_cardiovascular ('hypertension','heart_disease','ever_married','work_type',
//'Residence_type', 'avg_glucose_level','bmi','smoking_status','id_historial') values ($hyper,$heart,$married,'$work','$residence',$glucose,$bmi,'$smoke',$id);";


$out= exec("python predcardio.py $sex $age $hyper $heart $married $work $residence $glucose $bmi $smoke",$output);
var_dump($output);
echo $out;
$SQL="Insert into atributos_cardiovascular values($hyper,$heart,$married,'$work','$residence',$glucose,$bmi,'$smoke',$id)";
$res = $mysqli->query($SQL);
$date=date('Y-m-d H:i:s');
$SQL="Insert into historial values ($usr,'cardiovascular','$date',$id,$out)";
$res = $mysqli->query($SQL);
#$out = shell_exec("python predcardio.py");

#echo $output;
/*if($res->num_rows == 1)
{ /* USER OK /
	$fila = $res->fetch_assoc();
	$_SESSION["id"]=$fila["id"];
	$_SESSION["login"]=$fila["login"];
	$_SESSION["rol"]=$fila["rol"];
	$_SESSION["nombre"]=$fila["nombre"]." ".$fila["apellido"]; //como es un array hay que concat con .
	echo "USER_OK";
}

else
{ /* USER ERROR /
	echo "user NO K";
}*/
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
