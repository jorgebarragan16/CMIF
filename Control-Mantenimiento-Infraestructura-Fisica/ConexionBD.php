<?php
//Conexion con la base de datos y el servidor
mysql_connect("192.168.11.34", "cmif", "deb186f8db36d53252d651c1a0fbb98d") or die("<script> alert('No se ha encontrado el servidor');</script><script> window.location='index.php'</script>");
$db = mysql_select_db("control_mantenimiento",$link) or die("<script> alert('ERROR al concetarse con la base de datos CONTROL DE MANTENIMIENTO')</script><script> window.location='index.php'</script>");

?>