<?php
session_start();
include("mysql.php");

/* 1) Seguridad y caracteres especiales */
$id = $mysqli->real_escape_string($_POST["id"]);
$permisos = $mysqli->real_escape_string($_POST["permisos"]);


/* 2) OPCIONES */
$SQL="update usuarios set permisos=$permisos where id='$id'";
$res = $mysqli->query($SQL);

?>