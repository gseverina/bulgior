<?php
$template = "templates/msg_box.html";
$content = file_get_contents($template);
$content = str_replace("{msg_error}" ,"La opción seleccionada no está disponible.",$content);

?>