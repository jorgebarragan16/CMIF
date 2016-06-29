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

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"></meta>
<meta http-equiv="expires" content="0"></meta>
<link rel="shortcut icon" href="http://ryca.itfip.edu.co/RYCAWeb/public/img/logo.png"></link>

<title>Control del Mantenimiento en la Infraestructura Física DEL ITFIP</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Miga.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Tabla.css"></link>
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
						<li><a href="Inicio_Sesion_Contratista.php">Inicio De Sesión Contratistas</a></li>
						<li><a href="Pagina_Principal_Contratista.php">Página Principal Contratistas</a></li>
						<li><a href="Trabajos_Asignados.php">Trabajos Asignados</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div id="Content">
			<div id="path"></div>
			<div id="inicio">
				<fieldset>
					<legend>
						<br></br>
    					<?php
    					if ((isset($_SESSION['Nick_Contratista'])) && ($_SESSION['Nick_Contratista'] != ""))
    					{
							$Nombre = $_SESSION['Nombres_Contratista']; 
    						$Apellido1 = $_SESSION['Primer_Apellido_Contratista'];
    						$Apellido2 = $_SESSION['Segundo_Apellido_Contratista'];
    						echo "Bienvenido (a): ". $Nombre . " ". $Apellido1 . " " . $Apellido2;
    					}
    					?>
						</legend>
				</fieldset>
						
						<?php 
						$Id = $_SESSION['Id_Contratista'];
						$result = mysql_query("SELECT Id_Asignacion, Fecha_Solicitud, Tipo_Mantenimiento, Sitio_Dano, Informacion_Solicitud, Observaciones_Asignacion, Nombres_Usuario, Primer_Apellido_Usuario, Segundo_Apellido_Usuario, Nombres_Contratista, Primer_Apellido_Contratista, Segundo_Apellido_Contratista, Nombres_Administrativo, Primer_Apellido_Administrativo, Segundo_Apellido_Administrativo FROM asignacion, usuario, solicitud, contratista, administrativo WHERE asignacion.Usuario_Id_Usuario = usuario.Id_Usuario AND asignacion.Solicitud_Id_Solicitud = solicitud.Id_Solicitud AND asignacion.Contratista_Id_Contratista = contratista.Id_Contratista AND asignacion.Administrativo_Id_Administrativo = administrativo.Id_Administrativo AND asignacion.Contratista_Id_Contratista = $Id AND Id_Asignacion NOT IN (SELECT Asignacion_Id_Asignacion FROM `seguimiento`)", $link );
						
						echo "<table border='3'>
							<tr>
								<th scope='colgroup' colspan='10' align='center'>Trabajos Asignados</th>
							</tr>
						<tr>
							<td>Seleccione el trabajo</td>
							<td>ID</td>
							<td>Fecha De La Solicitud</td>
							<td>Tipo De Mantenimiento</td>
							<td>Sitio Del Daño</td>
							<td>Información De La Solicitud</td>
							<td>Observación de la asignación</td>
							<td>Usuario</td>
							<td>Nombre Del Operario</td>
							<td>Nombre Del Administrativo</td>
						</tr>";
					while ($row = mysql_fetch_row($result))
					{
						echo "<tr>";
						echo "<tr>";
						echo "<td><input type='radio' name='Casilla' value='{$row[0]}' onClick=window.location='Enviar_Formato_Control_Contratista.php?id={$row[0]}'></input></td>";
						echo "<td>$row[0]</td>";  
						echo "<td>$row[1]</td>";  
						echo "<td>$row[2]</td>"; 
						echo "<td>$row[3]</td>";
						echo "<td>$row[4]</td>";
						echo "<td>$row[5]</td>";
						echo "<td>$row[6] $row[7] $row[8] </td>";
						echo "<td>$row[9] $row[10] $row[11] </td>";
						echo "<td>$row[12] $row[13] $row[14] </td>";
					}
					echo "</table>";
					?>
					
					<a href="Pagina_Principal_Contratista.php">
    				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Volver.png" style="position: absolute; left: 365px; top: 615px;" width="250" height="80" alt="Menú Contratistas" title="Click para regresar a la página principal"></img>
					</a>
					
				</div>

				<div>
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copyright.png" style="position: absolute; left: -180px; top: 701px;"></img>
				</div>
			</div>
		</div>

</body>
</html>