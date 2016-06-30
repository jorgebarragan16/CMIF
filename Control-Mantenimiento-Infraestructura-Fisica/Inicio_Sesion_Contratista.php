<?php 
session_start();
include 'ConexionBD.php';
if(isset($_SESSION['Nick_Contratista'])){
	echo '<script> window.location="Pagina_Principal_Contratista.php"; </script>';
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
    						<li><a href="Inicio_Sesion_Administrativo.php">Inicio De Sesión Contratista / Operarios</a></li>
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
  						<h1>Inicio de sesión para CONTRATISTAS u OPERARIOS</h1>
  						<div class="inset">
							<p>
    							<label for="usuario">Usuario</label>
    							<input type="text" name="Nick_Contratista" id="nick" autofocus required="required" placeholder="Ingrese el usuario" maxlength="20"></input>
  							</p>
  						
  							<p>
    							<label for="password">Contraseña</label>
    							<input type="password" name="Pass_Contratista" id="password" required="required" placeholder="Ingrese la contraseña" maxlength="15"></input>
  							</p>
  				       
                          </div>             
                          <p class="p-container">
    						<input type="submit" name="login_c" id="go" value="Iniciar Sesión"></input>
    						<input type="submit" name="Contrasena_C" id="go" value="Cambiar Contraseña"></input>
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

		if(isset($_POST['login_c']))
		{
			$nick_c = $_POST['Nick_Contratista'];
			$pass_c = $_POST['Pass_Contratista'];
			$log = mysql_query("SELECT * FROM contratista WHERE Nick_Contratista = '$nick_c' AND Pass_Contratista = '$pass_c'");
			
			if (mysql_num_rows($log)>0)
			{
				$row = mysql_fetch_array($log);//lista usuarios
				$_SESSION["Nick_Contratista"] = $row["Nick_Contratista"];
				$_SESSION['Id_Contratista'] = $row['Id_Contratista'];
				$_SESSION['Nombres_Contratista'] = $row['Nombres_Contratista'];
				$_SESSION['Primer_Apellido_Contratista'] = $row['Primer_Apellido_Contratista'];
				$_SESSION['Segundo_Apellido_Contratista'] = $row['Segundo_Apellido_Contratista'];
						
				echo 'Iniciando sesión para '.$_SESSION["Nick_Contratista"].'<p>';
				echo '<script> window.location="Pagina_Principal_Contratista.php"; </script>';
			}
			else {
				echo '<script> alert("Usuario o Contraseña INCORRECTOS");</script>';
				echo '<script> window.location="Inicio_Sesion_Contratista.php"; </script>';
			}
			
		}
		
		if(isset($_POST['Contrasena_C']))
		{
			$nick_c = $_POST['Nick_Contratista'];
			$pass_c = $_POST['Pass_Contratista'];
			$log = mysql_query("SELECT * FROM contratista WHERE Nick_Contratista = '$nick_c' AND Pass_Contratista = '$pass_c'");
				
			if (mysql_num_rows($log)>0)
			{
				$row = mysql_fetch_array($log);//lista usuarios
				$_SESSION["Nick_Contratista"] = $row["Nick_Contratista"];
				$_SESSION['Id_Contratista'] = $row['Id_Contratista'];
				$_SESSION['Nombres_Contratista'] = $row['Nombres_Contratista'];
				$_SESSION['Primer_Apellido_Contratista'] = $row['Primer_Apellido_Contratista'];
				$_SESSION['Segundo_Apellido_Contratista'] = $row['Segundo_Apellido_Contratista'];
		
				echo 'Iniciando sesión para '.$_SESSION["Nick_Contratista"].'<p>';
				echo '<script> window.location="Menu_Cambiar_Contrasena_Contratista.php"; </script>';
			}
			else {
				echo '<script> alert("Usuario o Contraseña INCORRECTOS");</script>';
				echo '<script> window.location="Inicio_Sesion_Contratista.php"; </script>';
			}
				
		}
?>