<?php
//require("get_programas_acad_alumno.req");

$header = file_get_contents("templates/header.html");
/*
$header = str_replace("{nombre_alumno}" ,$sesion_data["nom_usuario"],$header);
$option = '<option value="{nro_prog_acad}" selected>{carrera_alumno}</option>';
$options = '';
for($i = 0; $i < count($sesion_data["carreras"]); $i++)
{
	if($i>0)
	{
		$options .= $option;
		$option = '<option value="{nro_prog_acad}" selected>{carrera_alumno}</option>';
	}
	
	$option = str_replace("{nro_prog_acad}" ,$sesion_data["carreras"][$i][0],$option);
	$option = str_replace("{carrera_alumno}",$sesion_data["carreras"][$i][2],$option);
	
	if($sesion_data["nro_prog_acad"] != $sesion_data["carreras"][$i][0])
	{
		$option = str_replace("selected","",$option);
	}
}
$options .= $option;
$header = str_replace("{carreras}",$options,$header);
*/
?>
