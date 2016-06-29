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

$result1 = mysql_query ( "SELECT COUNT(*) FROM contratista WHERE Especialidad_Contratista = 'Electricidad'", $link );
$result2 = mysql_query ( "SELECT COUNT(*) FROM contratista WHERE Especialidad_Contratista = 'Jardinería'", $link );
$result3 = mysql_query ( "SELECT COUNT(*) FROM contratista WHERE Especialidad_Contratista = 'Piscina'", $link );
$result4 = mysql_query ( "SELECT COUNT(*) FROM contratista WHERE Especialidad_Contratista = 'Granja'", $link );
$result5 = mysql_query ( "SELECT COUNT(*) FROM contratista WHERE Especialidad_Contratista = 'Zonas Verdes'", $link );
$result6 = mysql_query ( "SELECT COUNT(*) FROM contratista WHERE Especialidad_Contratista = 'Aseo General'", $link );
$result7 = mysql_query ( "SELECT COUNT(*) FROM contratista WHERE Especialidad_Contratista = 'Reparaciones Generales'", $link );
$result8 = mysql_query ( "SELECT COUNT(*) FROM contratista WHERE Especialidad_Contratista = 'Otro'", $link );
$result9 = mysql_query ( "SELECT COUNT(*) FROM contratista", $link );

$htmlTable='<table>
<tr>
<td>Electricidad</td>
<td>Jardinería</td>
<td>Piscina</td>
<td>Granja</td>
<td>Zonas Verdes</td>
<td>Aseo General</td>
<td>Reparaciones Generales</td>
<td>Otro</td>
<td>Total</td>
</tr>';

while ($datos = mysql_fetch_array($result1)){
	$htmlTable .= "<tr><td>{$datos[0]}</td>";
}

while ($datos = mysql_fetch_array($result2)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
while ($datos = mysql_fetch_array($result3)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
while ($datos = mysql_fetch_array($result4)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
while ($datos = mysql_fetch_array($result5)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
while ($datos = mysql_fetch_array($result6)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
while ($datos = mysql_fetch_array($result7)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
while ($datos = mysql_fetch_array($result8)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
while ($datos = mysql_fetch_array($result9)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
$htmlTable .= '</table>';


$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_1.png', 10, 10, 194, 35);
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_2.png', 10, 46, 195, 5);
$pdf->SetFont('Arial','B',12);
$pdf->WriteHTML("<br><br><br><br><br><br><br><br><br>");
$pdf->WriteHTML("Especialidad de los contratistas u operarios registrados <br>");
$pdf->WriteHTML($htmlTable);
$pdf->Output();
?>