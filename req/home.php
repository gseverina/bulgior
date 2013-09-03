<?php
$menu = file_get_contents("templates/menu_p.html");

if(!isSet($_REQUEST["acc"]))
{
	$_REQUEST["acc"] = "cons";
}

switch($_REQUEST["acc"])
{
	case "cons":
		$menu2 = file_get_contents("templates/menu_c.html");
		break;
	case "tram":
		$menu2 = file_get_contents("templates/menu_t.html");
		break;	
	case "cc";
		$menu2 = file_get_contents("templates/menu_c.html");
		break;
}

if(!isSet($_REQUEST["opc"]))
{
	$_REQUEST["opc"] = "0";
}

switch($_REQUEST["opc"])
{
	case 0:
		$content = '<p align="center"><img src="../images/construccion.png"></p>';
		break;
		
	case 1:
		require("req/pdf.php");
		break;
		
	case 2:
		require("req/pdf.php");
		break;
		
	case 3:
		require("req/pdf.php");
		break;
		
	case 4:
		require("req/pdf.php");
		break;
		
	case 5:
		require("req/pdf.php");
		break;
		
	case 6:
		require("req/pdf.php");
		break;
		
	case 7:
		require("req/pdf.php");
		break;
		
	case 8:
		require("req/pdf.php");
		break;
		
	case 9:
		require("req/pdf.php");
		break;
		
	case 10:
		require("req/pdf.php");
		break;
		
	case 11:
		require("req/pdf.php");
		break;
		
	case 12:
		require("req/pdf.php");
		break;
		
	case 13:
		require("req/pdf.php");
		break;
		
	case 14:
		require("req/pdf.php");
		break;
		
	case 15:
		require("req/pdf.php");
		break;
		
	case 16:
		require("req/pdf.php");
		break;
		
	case 17:
		require("req/pdf.php");
		break;
		
	default:
		require("opcion_no_implementada.php");
		break;
}
?>
