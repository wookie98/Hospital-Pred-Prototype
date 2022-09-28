<?php
session_start();
include("mysql.php");
$id=$_SESSION["Id"];
$SQL="select * from usuarios";

$res = $mysqli->query($SQL);
if($res->num_rows>0)
{
	while ($fila = $res->fetch_array()){
		$id=$fila["Id"];
		$sexo=$fila["sexo"];
		$nombre=$fila["nombre"];
		$apellidos=$fila["apellidos"];
		$nacimiento=$fila["fecha_nacimiento"];
		$permisos=$fila["permisos"];
		$rol=$fila["Rol"];
		
		$json[] = array(//[] if multiple
		"id"=>$id,
		"sexo"=>$sexo,
		"nacimiento"=>$nacimiento,
		"nombre"=>$nombre,
		"apellidos"=>$apellidos,
		"permisos"=>$permisos,
		"rol"=>$rol
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

?>