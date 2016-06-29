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

$result1 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/01/01' AND '2016/12/31'", $link );
$result2 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_FinaL='0000/00/00'", $link );
$result3 = mysql_query ( "SELECT COUNT(*) FROM seguimiento", $link );


$htmlTable='<table>
<tr>
<td>Año 2016</td>
<td>No finalizados</td>
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
$htmlTable .= '</table>';


$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_1.png', 10, 10, 194, 35);
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_2.png', 10, 46, 195, 5);
$pdf->SetFont('Arial','B',12);
$pdf->WriteHTML("<br><br><br><br><br><br><br><br><br>");
$pdf->WriteHTML("Seguimiento a los mantenimientos por años registrados <br>");
$pdf->WriteHTML($htmlTable);
$pdf->Output();
?>