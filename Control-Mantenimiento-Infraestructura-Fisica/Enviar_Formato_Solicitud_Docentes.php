<?php 
session_start();
include 'ConexionBD.php';
	if(isset($_SESSION['Nick_Usuario'])){
	echo "";
	}
	else {
		echo '<script> window.location="Inicio_Sesion_Docentes.php"; </script>';
	}

	$perfil = $_SESSION['Nick_Usuario'];
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
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/demo.css"></link>
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
    						<li><a href="Inicio_Sesion_Docentes.php">Inicio De Sesión Docentes</a></li>
    						<li><a href="Pagina_Principal_Docentes.php">Página Principal Docentes</a></li>
    						<li><a href="Enviar_Formato_Solicitud_Docentes.php">Formato Solicitud</a></li>
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
    					if ((isset($_SESSION['Nick_Usuario'])) && ($_SESSION['Nick_Usuario'] != ""))
    					{
    						$Nombre = $_SESSION['Nombres_Usuario']; 
    						$Apellido1 = $_SESSION['Primer_Apellido_Usuario'];
    						$Apellido2 = $_SESSION['Segundo_Apellido_Usuario'];
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
						<a href="Pagina_Principal_Docentes.php">
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Volver.png" style="position: absolute; left: 35px; top: 610px;" width="250" height="80" alt="Volver" title="Click para regresar a la página anterior"></img>
						</a>
					</div>	
						
                            <form  method="post" action="Validar_Solicitud_Docentes.php" style="position: absolute; left: 410px; top: 320px;"> 
                                <h1> Formato De Solicitud DOCENTES</h1>
                                <div class="inset"> 
	                                <p> 
	                                    <label for="inputFehca" class="sr-only" required="" autofocus="">Fecha de solicitud</label>
										<input id="datepicker" type="date" style="width:440px" name="Fecha_Solicitud" min="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>"></input>
										<br></br>
	                                </p>
                                
                                <p> 
                                    <label for="tipo">Tipo de mantenimiento</label>
				    					<select id="cbxTipo_Mantenimiento" style="width:440px" name="cbxTipo_Mantenimiento" required="">
											<option value="Electricidad">01. Electricidad</option>
											<option value="Jardineria">02. Jardinería</option>
											<option value="Piscina">03. Piscina</option>
											<option value="Granja">04. Granja</option>
											<option value="Zonas Verdes">05. Zonas Verdes</option>
											<option value="Aseo General">06. Aseo General</option>
											<option value="Reparaciones Generales">07. Reparaciones Generales</option>
											<option value="Otro">08. Otro</option>
										</select>
										<br></br>
                                </p>
                                
                                <p> 
                                    <label for="sitio">Sitio del daño:</label>
										<select id="cbxSitio_Daño" style="width:440px" name="cbxSitio_Dano" required="">
											<option value="Salon De Clases">01. Salón De Clases</option>
											<option value="Sala De Sistema">02. Sala De Sistema</option>
											<option value="Biblioteca">03. Biblioteca</option>
											<option value="Oficinas">04. Oficinas</option>
											<option value="Laboratorios">05. Laboratorios</option>
											<option value="Banos">06. Baño</option>
											<option value="Coliseo">07. Coliseo</option>
											<option value="Zonas Verdes">08. Zonas Verdes</option>
											<option value="Parqueadero">09. Parqueadero</option>
											<option value="Pasillos">10. Pasillos</option>
											<option value="Gimnasio">11. Gimnasio</option>
											<option value="Otro">12. Otro</option>
										</select>
										<br></br>
                                </p>
                                
                                <p> 
                                    <label for="inputObservacion" class="sr-only">Información detallada del daño</label>
									<textarea id="informacion" name="Infomacion" placeholder="Escriba aqui detalladamente la solicitud, identifique claramente el lugar y la labor de mantenimiento a realizar (Máximo 250 caracteres)" cols="60" rows="6" required="" maxlength="250"></textarea>	
                                </p>
                              </div>             
                          
                          <p class="p-container">
    						<input type="submit" name="login" id="go" value="Enviar Solicitud" onclick="return confirm('Seguro que quiere enviar la información?')"></input>
  						  </p>							
                            </form>
                        </div>
                        </div>
                 </div>
				<div>
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copyright.png" style="position: absolute; left: 90px; top: 810px;"></img>
				</div>
</body>
</html>