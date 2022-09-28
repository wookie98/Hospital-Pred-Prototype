<?php
session_start();
include("mysql.php");
$id=$_SESSION["Id"];
$SQL="select * from atributos_cardiovascular a, historial h, usuarios u where paciente='$id' and u.Id='$id' and a.id_historial=h.id_historial order by a.id_historial desc limit 1";

$res = $mysqli->query($SQL);
if($res->num_rows == 1)
{
	$fila = $res->fetch_assoc();
	$hyper=$fila["hypertension"];
	$heart=$fila["heart_disease"];
	$married=$fila["ever_married"];
	$work=$fila["work_type"];
	$Res=$fila["Residence_type"];
	$gluc=$fila["avg_glucose_level"];
	$smoking=$fila["smoking_status"];
	$bmi=$fila["bmi"];
	$permisos=$fila["permisos"];
}
else
{
	$id="-1";
	$hyper="";
	$heart="";
	$married="";
	$work="";
	$Res="";
	$gluc="";
	$smoking="";
	$bmi="";
	$permisos="";
	
}

$json = array(//[] if multiple
"id"=>$id,
"permisos"=>$_SESSION["permisos"],
"sexo"=>$_SESSION["sexo"],
"nacimiento"=>$_SESSION["nacimiento"],
"nombre"=>$_SESSION["nombre"],
"apellidos"=>$_SESSION["apellidos"],
"hyper"=>$hyper,
"heart"=>$heart,
"married"=>$married,
"work"=>$work,
"Res"=>$Res,
"gluc"=>$gluc,
"smoking"=>$smoking,
"bmi"=>$bmi,
"permisos"=>$permisos

);
echo json_encode($json);

?>