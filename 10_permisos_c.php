<?php
if(session_status()!=PHP_SESSION_ACTIVE
||$_SESSION["rol"]!="Admin")
{
	exit();
}
?>

