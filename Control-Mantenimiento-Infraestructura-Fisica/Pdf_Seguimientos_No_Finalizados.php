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

$result1 = mysql_query("SELECT Id_Seguimiento, Fecha_Inicio, Fecha_Final, Observacion, Tipo_Mantenimiento, Sitio_Dano, Porcentaje, Nombres_Contratista, Primer_Apellido_Contratista, Segundo_Apellido_Contratista, Nombres_Administrativo, Primer_Apellido_Administrativo, Segundo_Apellido_Administrativo FROM seguimiento, asignacion, solicitud, contratista, administrativo WHERE seguimiento.Asignacion_Id_Asignacion = asignacion.Id_Asignacion AND asignacion.Solicitud_Id_Solicitud = solicitud.Id_Solicitud AND asignacion.Contratista_Id_Contratista = contratista.Id_Contratista AND seguimiento.Administrativo_Id_Administrativo = administrativo.Id_Administrativo AND Fecha_Final='0000/00/00'", $link );
$result2 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_FinaL='0000/00/00'", $link );

$htmlTable='<table>
<tr>
<td>ID</td>
<td>Fecha inicio</td>
<td>Fecha fin</td>
<td>Obervaciones</td>
<td>Tipo de mantenimiento</td>
<td>Sitio del daño</td>
<td>Porcentaje</td>
<td>Nombre del contratista</td>
<td>Nombre del administrativo</td>
</tr>';

while ($datos = mysql_fetch_array($result1)){
	$htmlTable .= "<tr>
				<td>{$datos[0]}</td>
				<td>{$datos[1]}</td>
				<td>{$datos[2]}</td>
				<td>{$datos[3]}</td>
				<td>{$datos[4]}</td>
				<td>{$datos[5]}</td>
				<td>{$datos[6]}</td>
				<td>{$datos[7]} {$datos[8]} {$datos[9]}</td>
				<td>{$datos[10]} {$datos[11]} {$datos[12]}</td>
				</tr>
";
}

while ($datos = mysql_fetch_array($result2)){
	$htmlTable .= "<tr>
	<td>{$datos[0]}</td>
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
$pdf->WriteHTML("Seguimiento a los mantenimientos NO FINALIZADOS<br>");
$pdf->WriteHTML($htmlTable);
$pdf->Output();
?>