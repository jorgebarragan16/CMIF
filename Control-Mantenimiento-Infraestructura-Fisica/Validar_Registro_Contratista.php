<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0033)http://ryca.itfip.edu.co/RYCAWeb/ -->
<html lang="en">

<head>

<meta http-equiv="Content-Type"	content="text/html; charset=windows-1252"></meta>
<meta http-equiv="expires" content="0"></meta>
<link rel="shortcut icon" href="http://ryca.itfip.edu.co/RYCAWeb/public/img/logo.png"></link>
			

<title>Validando Al Contratista</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>

</head>

<body style="background-image: url(./Control_Mantenimiento_Infraestructura_files/Img/Fondo.png);">
				
<?php
include 'ConexionBD.php';

//Obtenemos valores del formulario registro usuario
$nombre_c = $_POST['Nombres_Contratista'];
$p_apellido_c = $_POST['Primer_Apellido_Contratista'];
$s_apellido_c = $_POST['Segundo_Apellido_Contratista'];
$tipo_doc_c = $_POST['Tipo_Documento'];
$numero_doc_c = $_POST['CC_Contratista'];
$cel_c = $_POST['Cel_Contratista'];
$email_c = $_POST['Email_Contratista'];
$nick_c = $_POST['Nick_Contratista'];
$passw_c = $_POST['Pass_Contratista'];
$especialidad_c = $_POST['Especialidad_Contratista'];


//0btiene la longitud de un string
$req = (strlen($nombre_c)*strlen($p_apellido_c)*strlen($s_apellido_c)*strlen($tipo_doc_c)*strlen($numero_doc_c)*strlen($cel_c)*strlen($email_c)*strlen($nick_c)*strlen($passw_c)*strlen($especialidad_c)) or die('"<script> alert("Digite TODOS los campos")</script>" "<script> window.location="Registro_Contratista.php"</script>');

//Ingresamos la info a la base de datos
$consulta="SELECT * FROM contratista WHERE CC_Contratista= ".$numero_doc_c;
$resultado=mysql_query($consulta) or die (mysql_error());
if (mysql_num_rows($resultado)>0)
	{
		echo '<script> alert("El numero de documento coinciden con un usuario ya registrado, intente de nuevo");</script>';
		echo '<script> window.location="Registro_Contratistas.php"; </script>';
	}
	else
	{
		mysql_query("INSERT INTO contratista VALUES ('','$nombre_c','$p_apellido_c','$s_apellido_c','$tipo_doc_c','$numero_doc_c','$cel_c','$email_c','$nick_c','$passw_c','$especialidad_c',1,0)",$link) or die('"<script> alert("ERROR!! Vuelva a intentar")</script>" "<script> window.location="Registro_Contratista.php"</script>');
		echo '<script> alert("Se ha registrado a un nuevo operario u contratista con éxtio");</script>';
		echo '<script> window.location="Menu_Contratistas.php"; </script>';
	} 
?>

</body>
</html>
