<?php 
session_start();
include 'ConexionBD.php';
	if(isset($_SESSION['Nick_Contratista'])){
	echo "";
	}
	else {
		echo '<script> window.location="Inicio_Sesion_Contratista.php"; </script>';
	}

	$perfil = $_SESSION['Nick_Contratista'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0033)http://ryca.itfip.edu.co/RYCAWeb/ -->
<html lang="en">

<head>

<meta http-equiv="Content-Type"	content="text/html; charset=windows-1252"></meta>
<meta http-equiv="expires" content="0"></meta>
<link rel="shortcut icon" href="http://ryca.itfip.edu.co/RYCAWeb/public/img/logo.png"></link>
			

<title>Validando El Formato</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>

</head>

<body style="background-image: url(./Control_Mantenimiento_Infraestructura_files/Img/Fondo.png);">

				
<?php
include 'ConexionBD.php';

//Obtenemos valores del formulario registro usuario
$fecha_in = $_POST['Fecha_Inicio'];
$fecha_fin = $_POST['Fecha_Fin'];
$observacion = $_POST['Observaciones'];
$porcentaje = $_POST['Porcentaje'];
$Id_Asignacion = $_POST['IdAsignacion'];
//0btiene la longitud de un string
$req = (strlen($fecha_in)*strlen($fecha_fin)*strlen($observacion)*strlen($porcentaje)*strlen($Id_Asignacion)) or die('"<script> alert("Digite TODOS los campos")</script>" "<script> window.location="Trabajos_Asignados.php"</script>');

//Ingresamos la info a la base de datos
mysql_query("INSERT INTO seguimiento VALUES ('','$fecha_in','$fecha_fin','$observacion','$porcentaje','$Id_Asignacion',1)",$link) or die('"<script> alert("Ha ocurrido un error, Por favor vuelva a intentar")</script>" "<script> window.location="Trabajos_Asignados.php"</script>');

echo '<script> alert("Felicidades el formato se envió CORECTAMENTE");</script>';
echo '<script> window.location="Trabajos_Asignados.php"; </script>';

?>

</body>
</html>