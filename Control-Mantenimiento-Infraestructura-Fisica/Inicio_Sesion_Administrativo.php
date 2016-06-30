<?php 
session_start();
include 'ConexionBD.php';
if(isset($_SESSION['Nick_Administrativo'])){
	echo '<script> window.location="Pagina_Principal_Administrativo.php"; </script>';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0033)http://ryca.itfip.edu.co/RYCAWeb/ -->
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></meta>
<meta http-equiv="expires" content="0"></meta>
<link rel="shortcut icon" href="http://ryca.itfip.edu.co/RYCAWeb/public/img/logo.png"></link>

<title>Control del Mantenimiento en la Infraestructura Física DEL ITFIP</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Formularios.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Miga.css"></link>
<script src="./Control_Mantenimiento_Infraestructura_files/JavaScripts/Mayuscula.js"></script>

<style>
	.error {color:red;}
	.resultado {color:green;}
	</style>
</head>

<body style="background-image: url(./Control_Mantenimiento_Infraestructura_files/Img/Fondo.png);">
	<div id="Container">
		<div id="Header">
			<div align="center">
				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Banner_1.png" width="1090" height="150" alt="Banner 1" title="Banner CMIF"></img>
				<br></br>
				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Banner_2.png" width="1090" height="35" alt="Banner 2" title="Banner CMIF"></img>
				<br></br>
				<div id="migas">
						<ul id="breadcrumbs-one">
    						<li><a href="Inicio.php">Inicio</a></li>
    						<li><a href="Inicio_Sesion_Administrativo.php">Inicio De Sesión Administrativo</a></li>
						</ul>
				</div>
			</div>
		</div>

		<br></br>
		<div id="Content">
			<div id="path"></div>
				<div id="inicio">
					<div>
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Cmif_2.png" style="position: absolute; left: 20px; top: 350px;" alt="Logo2" title="Logo CMIF2"></img>
					</div>	
				
                	<form  method="post" action="" style="position: absolute; left: 410px; top: 320px;">
  						<h1>Inicio de sesión para VICERECTOR ADMINISTRATIVO</h1>
  						<div class="inset">
							<p>
    							<label for="usuario">Usuario</label>
    							<input type="text" name="Nick_Administrativo" id="nick" autofocus required="required" placeholder="Ingrese el usuario" maxlength="20"></input>
  							</p>
  						
  							<p>
    							<label for="password">Contraseña</label>
    							<input type="password" name="Pass_Administrativo" id="password" required="required" placeholder="Ingrese la contraseña" maxlength="15"></input>
  							</p>
  				       
                          </div>             
                          <p class="p-container">
							<input type="submit" name="login" id="go" value="Iniciar Sesión"></input>
    						<input type="submit" name="Contrasena_A" id="go" value="Cambiar Contraseña"></input>
  						  </p>							
                            </form>
                        </div>
     
				<div>
				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copyright.png" style="position: absolute; left: -180px; top: 710px;"></img>
				</div>
		</div>
	</div>
</body>
</html>

<?php
include 'ConexionBD.php';

	if(isset($_POST['login']))
	{
		$nick = $_POST['Nick_Administrativo'];
		$pass = $_POST['Pass_Administrativo'];
		$log = mysql_query("SELECT * FROM administrativo WHERE Nick_Administrativo = '$nick' AND Pass_Administrativo = '$pass'");
		
		if (mysql_num_rows($log)>0)
		{
			$row = mysql_fetch_array($log);//lista usuarios
			$_SESSION['Id_Administrativo'] = $row['Id_Administrativo'];
			$_SESSION["Nick_Administrativo"] = $row["Nick_Administrativo"];
			$_SESSION['Nombres_Administrativo'] = $row['Nombres_Administrativo'];
			$_SESSION['Primer_Apellido_Administrativo'] = $row['Primer_Apellido_Administrativo'];
			$_SESSION['Segundo_Apellido_Administrativo'] = $row['Segundo_Apellido_Administrativo'];
					
			echo 'Iniciando sesión para '.$_SESSION["Nick_Administrativo"].'<p>';
			echo '<script> window.location="Pagina_Principal_Administrativo.php"; </script>';
		}
	
		
		else {
			echo '<script> alert("Usuario o Contraseña INCORRECTOS");</script>';
			echo '<script> window.location="Inicio_Sesion_Administrativo.php"; </script>';
		}
	}
	
	if(isset($_POST['Contrasena_A']))
	{
		$nick = $_POST['Nick_Administrativo'];
		$pass = $_POST['Pass_Administrativo'];
		$log = mysql_query("SELECT * FROM administrativo WHERE Nick_Administrativo = '$nick' AND Pass_Administrativo = '$pass'");
	
		if (mysql_num_rows($log)>0)
		{
			$row = mysql_fetch_array($log);//lista usuarios
			$_SESSION['Id_Administrativo'] = $row['Id_Administrativo'];
			$_SESSION["Nick_Administrativo"] = $row["Nick_Administrativo"];
			$_SESSION['Nombres_Administrativo'] = $row['Nombres_Administrativo'];
			$_SESSION['Primer_Apellido_Administrativo'] = $row['Primer_Apellido_Administrativo'];
			$_SESSION['Segundo_Apellido_Administrativo'] = $row['Segundo_Apellido_Administrativo'];
				
			echo 'Iniciando sesión para '.$_SESSION["Nick_Administrativo"].'<p>';
			echo '<script> window.location="Menu_Cambiar_Contrasena_Administrativo.php"; </script>';
		}
	
	
		else {
			echo '<script> alert("Usuario o Contraseña INCORRECTOS");</script>';
			echo '<script> window.location="Inicio_Sesion_Administrativo.php"; </script>';
		}
	}
?>