<?php
$template = "templates/pdf.html";
$content = file_get_contents($template);
$pdf_file_name = $_REQUEST["pdf"];
$content = str_replace("{FILE.PDF}",$pdf_file_name,$content);
?>