<?php
$srv = "localhost";
$usr = "bulgio";
$pwd = "racno";
$db  = "bulgior_com_ar_test";

if(!$con = mysql_connect($srv,$usr,$pwd))
{
	$dbConnectionOK = false;
	$_debug = "Error: No se pudo establecer la conexión con la base de datos. " . mysql_error();
}
elseif(!mysql_select_db($db))
{
	$dbConnectionOK = false;
	$_debug = "Error: No se pudo seleccionar la base de datos. " . mysql_error();
}
?>