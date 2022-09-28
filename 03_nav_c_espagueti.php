<?php
session_start();
if(!isset($_SESSION["rol"]))
	exit();
?>
<?php
if($_SESSION["rol"]=="Paciente"|| $_SESSION["rol"]=="Medico" ||$_SESSION["rol"]=="Admin")
{
?>
$("menu_almacen").onclick=function()
{
	
}
<?php
}
if($_SESSION["rol"]=="Medico" ||$_SESSION["rol"]=="Admin")
{
?>
$("menu_clientes").onclick=function()
{
	
}
<?php
}
if($_SESSION["rol"]=="Admin")
{
	?>
	$("menu_usuarios").onclick=function()
{
	
}
	<?php
}
?>