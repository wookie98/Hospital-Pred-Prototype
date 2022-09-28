<?php
if(session_status()!=PHP_SESSION_ACTIVE
||$_SESSION["rol"]!="Medico"&& $_SESSION["rol"]!="Admin")
{
	exit();
}
?>

<a id="menu_medico">M&eacute;dico</a><br><br>

<a id="menu_historial">Historiales</a><br><br>

<a id="menu_permisos">Cambiar Permisos</a><br><br>