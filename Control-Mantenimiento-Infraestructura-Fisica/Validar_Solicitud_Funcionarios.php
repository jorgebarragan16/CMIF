<?php 
session_start();
include 'ConexionBD.php';
	if(isset($_SESSION['Nick_Usuario'])){
	echo "";
	}
	else {
		echo '<script> window.location="Inicio_Sesion_Funcionarios.php"; </script>';
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0033)http://ryca.itfip.edu.co/RYCAWeb/ -->
<html lang="en">

<head>

<meta http-equiv="Content-Type"	content="text/html; charset=windows-1252"></meta>
<meta http-equiv="expires" content="0"></meta>
<link rel="shortcut icon" href="http://ryca.itfip.edu.co/RYCAWeb/public/img/logo.png"></link>
			

<title>Validando La Solicitud</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>

</head>

<body style="background-image: url(./Control_Mantenimiento_Infraestructura_files/Img/Fondo.png);">
				
<?php
include 'ConexionBD.php';

//Obtenemos valores del formulario registro usuario
$fecha = $_POST['Fecha_Solicitud'];
$tipo = $_POST['cbxTipo_Mantenimiento'];
$sitio = $_POST['cbxSitio_Dano'];
$info = $_POST['Infomacion'];
$id_f = $_SESSION['Id_Usuario'];
//0btiene la longitud de un string
$req = (strlen($fecha)*strlen($tipo)*strlen($sitio)*strlen($info)) or die('"<script> alert("Digite TODOS los campos")</script>" "<script> window.location="Enviar_Formato_Solicitud_Funcionarios.php"</script>');

//Ingresamos la info a la base de datos

mysql_query("INSERT INTO solicitud VALUES ('','$fecha','$tipo','$sitio','$info',1,'$id_f')",$link) or die('"<script> alert("'.mysql_error().'")</script>" "<script> window.location="Enviar_Formato_Solicitud_Funcionarios.php"</script>');

echo '<script> alert("Solicitud Registrada");</script>';
echo '<script> window.location="Pagina_Principal_Funcionarios.php"; </script>';
?>
</body>
</html>
