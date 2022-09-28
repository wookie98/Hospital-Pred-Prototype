<?php
session_start();
include("mysql.php");
$id=$_POST["id"];
$SQL="delete from usuarios where Id='$id'";

$res = $mysqli->query($SQL);
?>