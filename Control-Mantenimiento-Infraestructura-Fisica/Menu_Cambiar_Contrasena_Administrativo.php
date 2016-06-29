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
<link rel="shortcut icon" href="../favicon.ico"></link>
<title>Control del Mantenimiento en la Infraestructura Física DEL ITFIP</title>

<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Pagina.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Miga.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Formularios.css"></link>
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
    						<li><a href="Salir.php" onclick="return confirm('Seguro que quiere cerrar sesión?')">Inicio</a></li>
    						<li><a href="Inicio_Sesion_Administrativo.php">Inicio De Sesión Administrativo</a></li>
    						<li><a href="Pagina_Principal_Administrativo.php">Página Principal Administrativo</a></li>
    						<li><a href="Menu_Cambiar_Contrasena_Administrativo.php">Menú Actualizar Administrativo</a></li>
						</ul>
				</div>
			</div>
		</div>

		<br></br>
		<div id="Content">
			<div id="path"></div>
				<div id="inicio">
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
				
					<div>
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Cmif_2.png" style="position: absolute; left: 0px; top: 350px;" alt="Logo2" title="Logo CMIF2"></img>
						<a href="Pagina_Principal_Administrativo.php">
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Volver.png" style="position: absolute; left: 35px; top: 610px;" width="250" height="80" alt="Volver" title="Click para regresar a la página anterior"></img>
						</a>
					</div>	
						
                        <form  method="post" action="Actualizar_Contrasena_Administrativo.php" style="position: absolute; left: 410px; top: 320px;"> 
                        <h1> Actualizar Contraseña Vicerrector Admnistrativo</h1>
                        	<div class="inset">
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Digite la nueva Contraseña </label>
                                    <input id="passwordsignup" name="Pass_Administrativo1" required="required" autofocus type="password" placeholder="Ingrese la nueva contraseña"></input>
                                </p>
                                
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Confirme la nueva Contraseña </label>
                                    <input id="passwordsignup" name="Pass_Administrativo2" required="required" type="password" placeholder="Ingrese la nueva contraseña"></input>
                                </p>
                             </div>             
                             
                          <p class="p-container">
    						<input type="submit" name="login" id="go" value="Actualizar"onclick="return confirm('Seguro que quiere actualizar la contraseña? Si continúa con este proceso la próxima vez deberá iniciar sesión con la contraseña actualizada')"></input>
  						  </p>							
                            </form>
                        </div>
     
				<div>
				<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copyright.png" style="position: absolute; left: -180px; top: 710px;"></img>
				</div>
		</div>
</body>
</html>