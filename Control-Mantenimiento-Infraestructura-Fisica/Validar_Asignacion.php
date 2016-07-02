<?php 
session_start();
include 'ConexionBD.php';
	if(isset($_SESSION['Nick_Administrativo'])){
	echo "";
	}
	else {
		echo '<script> window.location="Inicio_Sesion_Administrativo.php"; </script>';
	}

	$perfil = $_SESSION['Nick_Administrativo'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0033)http://ryca.itfip.edu.co/RYCAWeb/ -->
<html lang="en">

<head>

<meta http-equiv="Content-Type"	content="text/html; charset=windows-1252"></meta>
<meta http-equiv="expires" content="0"></meta>
<link rel="shortcut icon" href="http://ryca.itfip.edu.co/RYCAWeb/public/img/logo.png"></link>
			

<title>Validando La Asignación</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>

</head>

<body style="background-image: url(./Control_Mantenimiento_Infraestructura_files/Img/Fondo.png);">
				
<?php
include 'ConexionBD.php';

//Obtenemos valores del formulario registro usuario
$observaciones = $_POST['Observaciones_Asignacion'];
$solicitud = $_POST['Solicitudes'];
$contratista = $_POST['Contratista'];
//$id_usuario = $_POST['Id_Usuario'];
//$id_solicitud = $_POST['Id_Solicitud'];
//$id_contratista = $_POST['Id_Contratista'];
//0btiene la longitud de un string
$req = (strlen($observaciones)*strlen($solicitud)*strlen($contratista)) or die('"<script> alert("Digite TODOS los campos")</script>" "<script> window.location="Asignaciones_De_Trabajo.php"</script>');

//Ingresamos la info a la base de datos

mysql_query("INSERT INTO asignacion VALUES ('','$observaciones', '$solicitud','$contratista',1)",$link) or die('"<script> alert("'.mysql_error().'")</script>" "<script> window.location="Asignaciones_De_Trabajo.php"</script>');

echo '<script> alert("Se ha asignado el trabajo con éxito");</script>';
echo '<script> window.location="Asignaciones_De_Trabajo.php"; </script>';
?>
</body>
</html>
