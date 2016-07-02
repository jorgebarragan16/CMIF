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
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/demo.css"></link>
<link rel="stylesheet" type="text/css" href="./Control_Mantenimiento_Infraestructura_files/Estilo_Formularios.css"></link>
<script src="./Control_Mantenimiento_Infraestructura_files/JavaScripts/Mayuscula.js"></script>

<script>
function justNumbers(e) {
	var keynum = window.event ? window.event.keyCode : e.which;
	if ( keynum == 8 ) return true;
	return /\d/.test(String.fromCharCode(keynum));
	}

</script>
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
    						<li><a href="Menu_Contratistas.php">Menú Contratista</a></li>
    						<li><a href="Registro_Contratistas.php">Registrar Contratista</a></li>
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
						<a href="Menu_Contratistas.php">
						<img src="./Control_Mantenimiento_Infraestructura_files/Img/Volver.png" style="position: absolute; left: 35px; top: 710px;" width="250" height="80" alt="Volver" title="Click para regresar a la página anterior"></img>
						</a>
					</div>	
						
                	<form  method="post" action="Validar_Registro_Contratista.php" style="position: absolute; left: 410px; top: 320px;">
  						<h1>Registro De Contratistas U Operarios</h1>
  						<div class="inset">
							<p>
                                    <label for="Nombre">Nombres</label>
                                    <input name="Nombres_Contratista" required="required" type="text" placeholder="Ingrese los nombres" autofocus maxlength="30"></input>
                                </p>
                                
                                <p> 
                                    <label for="Apellido">Primer Apellido</label>
                                    <input name="Primer_Apellido_Contratista" required="required" type="text" placeholder="Ingrese el primer apellido" maxlength="30"></input>
                                </p>
                                
                                <p> 
                                     <label for="Apellido">Segundo Apellido</label>
                                    <input name="Segundo_Apellido_Contratista" required="required" type="text" placeholder="Ingrese el segundo apellido" maxlength="30"></input>
                                </p>
                                
                                <p>
				  					<label for="tipodocumento">Seleccione el tipo Documento:</label>
										<select id="cbxDocumento" style="width:440px" name="Tipo_Documento">
											<option value="TI">01. Tarjeta De Identidad</option>
											<option value="CC">02. Cedúla De Ciudadanía</option>
											<option value="CE">03. Cedúla Extranjera</option>
										</select>
										<br></br>
				  				</p>
				  				
				  				<p> 
                                     <label for="Num-Documento">Numero de Documento</label>
                                  	 <input name="CC_Contratista" required="required" type="text" placeholder="Ingrese el numero de documento" maxlength="10" onkeypress="return justNumbers(event);"></input>
                                </p>
                                
                                <p> 
                                    <label for="Num-Documento">Numero de Celular</label>
                                    <input name="Cel_Contratista" required="required" type="text" placeholder="Ingrese el numero de celular" maxlength="10"onkeypress="return justNumbers(event);"></input>
                                </p>
                                
                                <p> 
                                    <label for="Email">Email</label>
                                    <input name="Email_Contratista" required="required" type="email" placeholder="Ingrese el correo , correo@itfip.edu.co"maxlength="40"></input> 
                                </p>
                                
                                <p>
    								<label for="usuario">Usuario</label>
    								<input type="text" name="Nick_Contratista" id="nick"  required="required" placeholder="Ingrese el usuario" maxlength="20"></input>
  								</p>
  						
  								<p>
	    							<label for="password">Contraseña</label>
	    							<input type="password" name="Pass_Contratista" id="password" required="required" placeholder="Ingrese la contraseña" maxlength="15"></input>
  								</p>
                                
                                <p>
				  					<label for="especialidad">Seleccione el area especialidad:</label>
										<select id="cbxEspecialidad" style="width:440px" name="Especialidad_Contratista">
											<option value="Electricidad">01. Electricidad</option>
											<option value="Jardinería">02. Jardinería</option>
											<option value="Piscina">03. Piscina</option>
											<option value="Granja">04. Granja</option>
											<option value="Zonas Verdes">05. Zonas Verdes</option>
											<option value="Aseo General">06. Aseo General</option>
											<option value="Reparaciones Generales">07. Reparaciones Generales</option>
											<option value="Otro">08. Otro</option>
										</select>
				  				</p>
                		</div>             
                          
                          <p class="p-container">
    						<input type="submit" name="login" id="go" value="Registrar Contratista"></input>
  						  </p>							
                            </form>
                        </div>
                        </div>
                 </div>
				<div>
					<img src="./Control_Mantenimiento_Infraestructura_files/Img/Copyright.png" style="position: absolute; left: 90px; top: 1230px;"></img>
				</div>
</body>
</html>