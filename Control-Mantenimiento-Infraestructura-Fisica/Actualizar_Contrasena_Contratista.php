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
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>

<title>Validando La Contraseña</title>

</head>

<body style="background-image: url(./Control_Mantenimiento_Infraestructura_files/Img/Fondo.png);">
		
<?php
include 'ConexionBD.php';
//Obtenemos valores del formulario registro usuario
$passw_c1 = $_POST['Pass_Contratista1'];
$passw_c2 = $_POST['Pass_Contratista2'];

//0btiene la longitud de un string
$req = (strlen($passw_c1)*strlen($passw_c2)) or die('"<script> alert("Digite TODOS los campos")</script>" "<script> window.location="Menu_Cambiar_Contrasena.php"</script>');

		if($passw_c1 == $passw_c2)
		{
			//Ingresamos la info a la base de datos
			mysql_query("UPDATE contratista SET Pass_Contratista = '$passw_c2' WHERE Nick_Contratista='".$perfil."' LIMIT 1", $link) or die('"<script> alert("Ha ocurrido un error, por favor vuelva a intentarlo")</script>" "<script> window.location="Menu_Cambiar_Contrasena_Contratista.php"</script>');
			echo '<script> alert("Felicidades ha actualizado su contrasena, por favor ingrese de nuevo con la contraseña actualizada");</script>';
			echo '<script> window.location="Salir.php"; </script>';
		}
		
		else
		{
			echo '<script> alert("Las nuevas contraseñas NO coinciden");</script>';
			echo '<script> window.location="Menu_Cambiar_Contrasena_Contratista.php"; </script>';
		}	
?>
</body>
</html>		