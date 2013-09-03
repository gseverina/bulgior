<?php
if(isSet($_REQUEST["usuario"]))
{
	//Connect to database...
	$dbConnectionOK = true;
	require("connect_db.php");
	if(!$dbConnectionOK)
	{
		return;
	}
	
	if($_REQUEST["usuario"] == 'bulgior' and $_REQUEST["clave"] == '73376')
	{
		$sid = uniqid();
		$sql = "insert into session(sid) values('" . $sid . "');";
		$res = mysql_query($sql);
		if(!$res)
		{
			$_debug = mysql_error();
			$sesionOK = false;
			return;	
		}

		header('location: index.php?sid='.$sid);
	}
	else
	{
		$content = file_get_contents("templates/msg_error.html");
		$content .= file_get_contents("templates/login.html");
	
		$content = str_replace("{msg_error}",'identificación incorrecta',$content);
	}
	
	/*
	$sql = "execute dbo.ag_login '".$_REQUEST["usuario"]."','".$_REQUEST["clave"]."'";
	$res = mssql_query($sql);
	while($row = mssql_fetch_row($res))
	{
		if($row[0] == 1 && strtoupper($row[1]) == 'OK')
		{
			$sql = "execute dbo.ag_crear_sesion '".$_REQUEST["usuario"]."'";
			$res = mssql_query($sql);
			$row = mssql_fetch_row($res);
			header('location: index.php?sid='.$row[0]);
		}
	}
	
	
	$content = file_get_contents("templates/msg_error.html");
	$content .= file_get_contents("templates/login.html");
	
	$content = str_replace("{msg_error}",'identificación incorrecta',$content);
	*/
}
else
{
	$content = file_get_contents("templates/login.html");
}
?>