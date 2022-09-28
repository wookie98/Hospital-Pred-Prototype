<?php
session_start();
include("mysql.php");
$id=$_POST["id"];
$SQL="select * from atributos_cardiovascular a, historial h where Paciente='$id' and a.id_historial=h.id_historial order by a.id_historial desc";

$res = $mysqli->query($SQL);
if($res->num_rows>0)
{
	while ($fila = $res->fetch_array()){
		$id=$fila["id_historial"];
		$json[] = array(//[] if multiple
		"id"=>$id,
		);


}
	
}
/*
$json[] = array(//[] if multiple
"id"=>$id,
"permisos"=>$permisos,
"sexo"=>$sexo,
"nacimiento"=>$nacimiento,
"nombre"=>$nombre,
"apellidos"=>$apellidos,
"rol"=>$rol

);*/
echo json_encode($json);
