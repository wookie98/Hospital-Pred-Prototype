<?php
session_start();
include("mysql.php");
$id=$_POST["id"];
$SQL="select * from atributos_cardiovascular a, historial h where paciente='$id' and a.id_historial=h.id_historial order by a.id_historial desc limit 1";

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
	$historial=$fila["id_historial"];
	$resultado=$fila["Resultado"];
	
	$SQL="select * from usuarios where Id='$id'";
	$res = $mysqli->query($SQL);
	$fila = $res->fetch_assoc();
	$nombre=$fila["nombre"];
	$apellidos=$fila["apellidos"];
	$nombre=$fila["nombre"];
	$sexo=$fila["sexo"];
	$nacimiento=$fila["fecha_nacimiento"];
	$permisos=$fila["permisos"];

	$json = array(//[] if multiple
	"id"=>$id,
	"permisos"=>$permisos,
	"sexo"=>$sexo,
	"nacimiento"=>$nacimiento,
	"nombre"=>$nombre,
	"apellidos"=>$apellidos,
	"hyper"=>$hyper,
	"heart"=>$heart,
	"married"=>$married,
	"work"=>$work,
	"Res"=>$Res,
	"gluc"=>$gluc,
	"smoking"=>$smoking,
	"bmi"=>$bmi,
	"rol"=>$fila["Rol"],
	"id_historial"=>$historial,
	"resultado"=>$resultado
	);

}
else
{
	$SQL="select * from usuarios where Id='$id'";
	$res = $mysqli->query($SQL);
	$fila = $res->fetch_assoc();
	$nombre=$fila["nombre"];
	$apellidos=$fila["apellidos"];
	$nombre=$fila["nombre"];
	$sexo=$fila["sexo"];
	$nacimiento=$fila["fecha_nacimiento"];
	$permisos=$fila["permisos"];
	$json = array("id"=>-1,
	"rol"=>$fila["Rol"],
	"permisos"=>$permisos,
	"sexo"=>$sexo,
	"nacimiento"=>$nacimiento,
	"nombre"=>$nombre,
	"apellidos"=>$apellidos);
}


echo json_encode($json);

?>