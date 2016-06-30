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


require 'fpdf17/HtmlTable.php';

$result = mysql_query ( "SELECT Id_Solicitud, Fecha_Solicitud, Tipo_Mantenimiento, Sitio_Dano, Informacion_Solicitud, Nombres_Administrativo, Primer_Apellido_Administrativo, Segundo_Apellido_Administrativo, Id_Usuario FROM solicitud, administrativo WHERE solicitud.Administrativo_Id_Administrativo = administrativo.Id_Administrativo", $link );

$htmlTable='<table>
<tr>
<td>ID</td>
<td>Fecha De La Solicitud</td>
<td>Tipo De Mantenimiento</td>
<td>Sitio Del Daño</td>
<td>Información De La Solicitud</td>
<td>Nombre Del Administrativo</td>
<td>Id Del Usuario</td>
</tr>';

while ($datos = mysql_fetch_array($result)){
	$htmlTable .= "<tr>
				<td>{$datos[0]}</td>
				<td>{$datos[1]}</td>
				<td>{$datos[2]}</td>
				<td>{$datos[3]}</td>
				<td>{$datos[4]}</td>
				<td>{$datos[5]} {$datos[6]} {$datos[7]}</td>
				<td>{$datos[8]}</td>				
				</tr>
";
}
$htmlTable .= '</table>';


$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_1.png', 10, 10, 194, 35);
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_2.png', 10, 46, 195, 5);
$pdf->SetFont('Arial','B',12);
$pdf->WriteHTML("<br><br><br><br><br><br><br><br><br>");
$pdf->WriteHTML("Solicitudes de mantenimiento registradas<br>");
$pdf->WriteHTML($htmlTable);
$pdf->Output();
?>