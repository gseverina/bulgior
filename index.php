<?php
error_reporting(0);
if(isSet($_GET['opc']))
{
	if ( ! preg_match( "/^[0-9]{1,2}$/", $_GET['opc'] ) )  
	{  
		exit("CHAU !!");
	}  
}
$content = "";
$header  = "";
$fecha   = date("d/m/Y");
$hora    = date("H:i:s");
$menu    = "";
$menu2   = "";
$footer  = file_get_contents("templates/footer.html");
$_debug  = "";
$layout  = file_get_contents("templates/page_layout1.html");

$sesion_data = array();
$dbConnectionOK = true;

if(isSet($_REQUEST["sid"]))
{
	//Connect to database...
	require("req/connect_db.php");
	if($dbConnectionOK)
	{
		//salir ?
		if(isSet($_REQUEST["acc"]) && $_REQUEST["acc"] == "salir")
		{
			require("req/salir.php");
			header('location: index.php');
		}
			
		//validar sesion...
		$sesionOK = true;
		require("req/validar_sesion.php");
		if($sesionOK)
		{
			//cambiar carrera ?
			if(isSet($_REQUEST["acc"]) && $_REQUEST["acc"] == "cc")
			{
				require("req/cambiar_carrera.php");
				header('location: index.php?sid='.$_REQUEST["sid"].'&opc='.$_REQUEST["opc"]);
			}
			
			//load header...
			require("req/header.php");
			
			//load home page...
			require("req/home.php");
		}
		else
		{
			$layout  = file_get_contents("templates/page_layout_login.html");
			require("req/login.php");
		}
	}
}
else
{
	$layout  = file_get_contents("templates/page_layout_login.html");
	require("req/login.php");
}

$layout = str_replace("{header}" ,$header ,$layout);
$layout = str_replace("{fecha}"  ,$fecha  ,$layout);
$layout = str_replace("{hora}"   ,$hora   ,$layout);
$layout = str_replace("{menu}"   ,$menu   ,$layout);
$layout = str_replace("{menu2}"  ,$menu2  ,$layout);
$layout = str_replace("{footer}" ,$footer ,$layout);
$layout = str_replace("{content}",$content,$layout);
$layout = str_replace("{debug}"  ,$_debug ,$layout);

if(isSet($_REQUEST["sid"]))
	$layout = str_replace("{sid}",$_REQUEST["sid"],$layout);
if(isSet($_REQUEST["opc"]))
	$layout = str_replace("{opc}",$_REQUEST["opc"],$layout);

echo $layout;

if($dbConnectionOK)
{
	//mysql_close();
}

?>
