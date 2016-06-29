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
	$Id_Asignacion = $_GET['id'];	
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
    						<li><a href="Inicio_Sesion_Contratista.php">Inicio De Sesión Contratista</a></li>
    						<li><a href="Pagina_Principal_Contratista.php">Página Principal Contratista</a></li>
    						<li><a href="Trabajos_Asignados.php">Trabajos Asignados</a></li>
    						<li><a href="Enviar_Formato_Control_Contratista.php">Formato Control</a></li>
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
    					if ((isset($_SESSION['Nick_Contratista'])) && ($_SESSION['Nick_Contratista'] != ""))
    					{
							$Nombre = $_SESSION['Nombres_Contratista']; 
    						$Apellido1 = $_SESSION['Primer_Apellido_Contratista'];
    						$Apellido2 = $_SESSION['Segundo_Apellido_Contratista'];
    						echo "Bienvenido (a): ". $Nombre . " ". $Apellido1 . " " . $Apellido2;
    					}
    					else
    					{
    					}
    					?>
						</legend>   
						</fieldset>
						
					<div>
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Cmif_2.png" style="position: absolute; left: 20px; top: 350px;" alt="Logo2" title="Logo CMIF2"></img>
						<a href="Trabajos_Asignados.php">
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Volver.png" style="position: absolute; left: 35px; top: 710px;" width="250" height="80" alt="Volver" title="Click para regresar a la página anterior"></img>
						</a>
					</div>	
						
                            <form  method="post" action="Validar_Control.php?id=$Id_Asignacion" style="position: absolute; left: 410px; top: 320px;"> 
                          	<h1>Formato De Control</h1>
  								<div class="inset"> 
	                                <p> 
	                                    <label for="inputFehca" class="sr-only">Fecha inicio del control</label>
										<input type="date" name="Fecha_Inicio" style="width:440px" required="" autofocus=""></input>
										<br></br>
	                                </p>
	                                
	                                <p> 
	                                    <label for="inputFecha" class="sr-only">Fecha final del control</label>
										<input type="date" name="Fecha_Fin" style="width:440px" required=""></input>
										<br></br>
	                                </p>
	                                
									<p> 
	                                    <label for="inputObservacion" class="sr-only">Observaciones</label>
										<textarea id="informacion" style="width:440px" name="Observaciones" placeholder="Escriba aqui detalladamente las observaciones del mantenimiento (Máximo 250 caracteres)" cols="72" rows="6" required="" onkeyup="this.value = this.value.slice(0, 250)"></textarea>
										<br></br>	
	                                </p>
	                                
	                                <p> 
	                                    <label for="tipo">Porcentaje realizado</label>
					    				<select id="cbxPorcentaje" style="width:440px" name="Porcentaje" required="" cols="72">
											<option value="01">01. 10%</option>
											<option value="02">02. 20%</option>
											<option value="03">03. 30%</option>
											<option value="04">04. 40%</option>
											<option value="05">05. 50%</option>
											<option value="06">06. 60%</option>
											<option value="07">07. 70%</option>
											<option value="08">08. 80%</option>
											<option value="09">09. 90%</option>
											<option value="10">10. 100%</option>
											</select>
											<br></br>
	                                </p>
	                                <p>
		                                <label for="tipo">Id de la Asignación</label>
		                                <input type="text" name="IdAsignacion" value="<?php echo $Id_Asignacion;?>" readonly></input>
	                                </p>
       						</div>             
                          
                          <p class="p-container">
    						<input type="submit" name="login" id="go" value="Enviar" onclick="return confirm('Seguro que quiere enviar la información?')"></input>
  						  </p>							
                            </form>
                        </div>
                        </div>
                 </div>
				<div>
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copyright.png" style="position: absolute; left: 90px; top: 920px;"></img>
				</div>
</body>
</html>