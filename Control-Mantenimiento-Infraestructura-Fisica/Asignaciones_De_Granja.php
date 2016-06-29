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

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></meta>
<meta http-equiv="expires" content="0"></meta>
<link rel="shortcut icon" href="http://ryca.itfip.edu.co/RYCAWeb/public/img/logo.png"></link>

<title>Control del Mantenimiento en la Infraestructura Física DEL ITFIP</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Miga.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Formularios.css"></link>
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
						<li><a href="Menu_Asignaciones.php">Menú Asignación</a></li>
						<li><a href="Asignaciones_De_Trabajo.php">Asignaciones De Trabajo</a></li>
						<li><a href="Asignaciones_De_Granja.php">Mantanimientos De Granja</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div id="Content">
			<div id="path"></div>
			<div id="inicio">
				<br></br>
				<div>
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Cmif_2.png" style="position: absolute; left: 0px; top: 350px;" alt="Logo2" title="Logo CMIF2"></img>
					<a href="Asignaciones_De_Trabajo.php">
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Volver.png" style="position: absolute; left: 35px; top: 610px;" width="250" height="80" alt="Volver" title="Click para regresar a la página anterior"></img>
					</a>
				</div>
				
				<form method="post" action="Validar_Asignacion.php" style="position: absolute; left: 410px; top: 320px;">
				<h1>Realizar Asignacion Granja</h1>
				<div class="inset">								
				<?php
					include ("ConexionBD.php");
					$result = mysql_query ( "Select * from solicitud where Tipo_Mantenimiento = 'Granja' AND Id_Solicitud NOT IN (SELECT Solicitud_Id_Solicitud FROM `asignacion`)", $link );
				?> 
						<p>
							<label for="Solicitud_Pendiente" class="uname">Solicitudes Pendientes:</label> 
							<select name="Solicitudes" style="width:440px">
							<?php
								while ( $row = mysql_fetch_array ( $result ) ) 
								{
								  print ("<option value=\"" . $row ["Id_Solicitud"] . "\">" . $row ["Id_Solicitud"] . " .) " . $row ["Tipo_Mantenimiento"] . " / " . $row ["Sitio_Dano"] . " / " . $row ["Informacion_Solicitud"] . "</option>") ;
								}
								mysql_free_result ( $result );
							?> 
							</select> 
							<br></br>
							</p>
			 	 			
			 	 			<?php
								include ("ConexionBD.php");
								$result = mysql_query ( "SELECT Id_Contratista, Nombres_Contratista, Primer_Apellido_Contratista, Segundo_Apellido_Contratista FROM contratista WHERE Especialidad_Contratista = 'Granja'", $link );
							?> 
							<p>
								<label for="Contratista_Disponible" class="uname">Operarios Disponibles:</label>								
								<select name="Contratista" style="width:440px"> 
							<?php
								while ( $row = mysql_fetch_array ( $result ) ) 
								{
									print ("<option value=\"" . $row ["Id_Contratista"] . "\">" . $row ["Id_Contratista"] . " .) " . $row ["Nombres_Contratista"] . "  " . $row ["Primer_Apellido_Contratista"] . "  " . $row ["Segundo_Apellido_Contratista"] . "</option>") ;
								}
								mysql_free_result ( $result );
							?> 
							</select> 
							<br></br>
							</p>
							
							<p>
							<label for="inputObservacion" class="sr-only">Observaciones de la asignación</label>
							<textarea id="informacion" style="width:440px" name="Observaciones_Asignacion" placeholder="Escriba aqui detalladamente las observaciones del mantenimiento (Máximo 250 caracteres)" cols="72" rows="6" required="" maxlength="250"></textarea>
							</p>
							</div>             
                          
                          <p class="p-container"> 
							<input type="submit" value="Asignar Trabajo"onclick="return confirm('Seguro que quiere enviar la información?')"></input> 
							</p>
							</form>
						</div>
			<div>
				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copyright.png" style="position: absolute; left: -180px; top: 740px;"></img>
			</div>
		</div>
	</div>
			
</body>
</html>