<?php
if(session_status()!=PHP_SESSION_ACTIVE
||($_SESSION["rol"]!="Paciente"&& $_SESSION["rol"]!="Admin" && $_SESSION["rol"]!="Medico"))
{
	exit();
}
?>
<a id="menu_paciente">Consulta personal</a><br><br>