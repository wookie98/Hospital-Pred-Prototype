<?php
session_start();
if(!isset($_SESSION["rol"]))
	exit();

switch($_SESSION["rol"]){
case "Paciente":
include("03_nav_paciente_c.php");
break;
case "Medico":
include("03_nav_paciente_c.php");
include("03_nav_medico_c.php");
break;
case "Admin":
include("03_nav_medico_c.php");
include("03_nav_paciente_c.php");
include("03_nav_admin_c.php");
break;
}
?>