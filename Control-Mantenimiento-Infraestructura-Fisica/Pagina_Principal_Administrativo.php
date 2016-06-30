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
			

<title>Control del Mantenimiento en la Infraestructura Física DEL ITFIP</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Miga.css"></link>
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
    						<li><a href="Salir.php" onclick="return confirm('Seguro que quiere cerrar sesión?')">Inicio</a></li>
    						<li><a href="Inicio_Sesion_Administrativo.php">Inicio De Sesión Administrativo</a></li>
    						<li><a href="Pagina_Principal_Administrativo.php">Página Principal Administrativo</a></li>
						</ul>
				</div>
			</div>
		</div>

		<div id="Content">
			<div id="path"></div>
				<div id="inicio" >
    					<fieldset>
    					<legend>
    					<br></br>
    					<?php
    					if ((isset($_SESSION['Nick_Administrativo'])) && ($_SESSION['Nick_Administrativo'] != ""))
    					{
    						$Nombre = $_SESSION['Nombres_Administrativo']; 
    						$Apellido1 = $_SESSION['Primer_Apellido_Administrativo'];
    						$Apellido2 = $_SESSION['Segundo_Apellido_Administrativo'];
    						echo "Bienvenido (a): ". $Nombre . " ". $Apellido1 . " " . $Apellido2;
    					}
    					else
    					{
    					}
    					?>
						</legend>   
						</fieldset>
					
					<a href="Menu_Informacion.php">
    				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Menu_Informacion.png" style="position: absolute; left: 1px; top: 300px;" width="250" height="80" alt="Menú De Información" title="Click para consultar los codigos de los mantenimientos"></img>
					</a>
					
					<a href="Menu_Contratistas.php">
    				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Menu_Contratistas.png" style="position: absolute; left: 365px; top: 300px;" width="250" height="80" alt="Menú Contratistas" title="Click para consultar los datos de los contratistas o funcionarios"></img>
					</a>
						
					<a href="Menu_Solicitudes.php">
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Menu_Solicitudes.png" style="position: absolute; left: 735px; top: 300px;" width="250" height="80" alt="Menú Solicitudes" title="Click para consultar las solicitudes de los mantenimientos"></img>
					</a>
						
					<a href="Menu_Asignaciones.php">
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Menu_Asignaciones.png" style="position: absolute; left: 1px; top: 420px;" width="250" height="80" alt="Menú Asignaciones" title="Click para consultar las asignaciones"></img>
					</a>
						
					<a href="Menu_Seguimiento.php">
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Menu_Seguimiento.png" style="position: absolute; left: 365px; top: 420px;" width="250" height="80" alt="Menú Seguimiento" title="Click para consultar el historial de los mantenimientos"></img>
					</a>
					
					<a href="Menu_Cambiar_Contrasena_Administrativo.php">
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Cambiar_Contraseña.png" style="position: absolute; left: 735px; top: 420px;" width="250" height="80" alt="Menú Seguimiento" title="Click para cambiar su contraseña"></img>
					</a>
																	
					<a href="Copia_Seguridad.php" onclick="return confirm('Seguro que quiere descargar la copia de seguridad?')">
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copia_Seguridad.png" style="position: absolute; left: 1px; top: 540px;" width="250" height="80" alt= "Descargar Copia de seguridad" title="Click para descargar copia de seguridad de la base de datos (Backup)"></img>
					</a>
						
					<!-- <a href="Restaurar_Copia_Seguridad.php">
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Subir_Copia_Seguridad.png" style="position: absolute; left: 365px; top: 540px;" width="250" height="80" alt="Subir Copia de seguridad" title="Click para importar la copia de seguridad de la base de datos (Restore)"></img>
					</a> -->
						
					<a href="Salir.php" onclick="return confirm('Seguro que quiere cerrar sesión?')">
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Cerrar_Sesion.png" style="position: absolute; left: 365px; top: 570px;" width="250" height="50" alt="Cerrar Sesion" title="Click para finalizar la sesión"></img>
					</a>
  				</div>
 		 		
 		 		<div>
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copyright.png" style="position: absolute; left: -180px; top: 701px;"></img>
				</div>
		</div>
	</div>
</body>
</html>