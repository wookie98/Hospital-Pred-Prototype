<?php
if(session_status()!=PHP_SESSION_ACTIVE
|| $_SESSION["rol"]!="Admin")
{
	exit();
}
?>
<a id="menu_admin">Administrar usuarios</a><br>