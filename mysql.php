<?php
$mysqli = @new mysqli('localhost', 'root', '', 'dswptfg');
if ($mysqli->connect_error)
{
    echo "Ha fallado la conexión con la base de datos";
	exit();
}
elseif(!$mysqli->set_charset("utf8"))
{
	echo "Ha fallado la selección de charset=utf8";
	exit();
}
function Query2JSON($SQL, $OBJ=false)
{
	GLOBAL $mysqli; // requiere conexión MySQLi (variable global)

	if(!($res = $mysqli->query($SQL)))
	{
		echo "<hr/><b>ERROR Query2JSON: <hr/>SQL: $SQL</b><hr/>";
		exit();
	}

	// array numérico o asociativo Describe 01_usuarios shows information of table 
	$modo=( ($OBJ===true || strtoupper($OBJ)=="OBJ" || strtoupper($OBJ)=="OBJECT")
	       ? MYSQLI_ASSOC : MYSQLI_NUM );

	// inicializa array vacío
	$rows = array();

	while( ($row=$res->fetch_array($modo)) )
		array_push($rows, $row);
	return json_encode($rows, JSON_UNESCAPED_UNICODE);
}
function POST2EscapeString()//Explicación variables super gloabales
{
	GLOBAL $mysqli; // requiere conexión MySQLi (variable global)

	foreach($_POST as $key=>$val)
	{
		GLOBAL $$key;
		$$key = $mysqli->real_escape_string($_POST[$key]);
	}
}

?>
