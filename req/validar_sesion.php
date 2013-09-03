<?php
$sql = "select datediff(date_created, curdate()) res from session where sid = '" . $_REQUEST["sid"] . "'";

$res = mysql_query($sql);
if(!$res)
{
	$sesionOK = false;
	return;	
}

$row = mysql_fetch_assoc($res);
if(!$row)
{
	$sesionOK = false;
	return;	
}

if($row['res'] != 0)
{
	$sesionOK = false;
	return;	
}

?>