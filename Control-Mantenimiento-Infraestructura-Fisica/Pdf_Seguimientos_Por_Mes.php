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

$result1 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/01/01' AND '2016/01/31'", $link );
$result2 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/02/01' AND '2016/02/28'", $link );
$result3 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/03/01' AND '2016/03/31'", $link );
$result4 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/04/01' AND '2016/04/30'", $link );
$result5 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/05/01' AND '2016/05/31'", $link );
$result6 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/06/01' AND '2016/06/30'", $link );
$result7 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/07/01' AND '2016/07/31'", $link );
$result8 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/08/01' AND '2016/08/31'", $link );
$result9 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/09/01' AND '2016/09/30'", $link );
$result10 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/10/01' AND '2016/10/31'", $link );
$result11 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/11/01' AND '2016/11/30'", $link );
$result12 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_Inicio AND Fecha_Final BETWEEN '2016/12/01' AND '2016/12/31'", $link );
$result13 = mysql_query ( "SELECT COUNT(*) FROM seguimiento", $link );


$htmlTable='<table>
<tr>
<td>Enero</td>
<td>Febrero</td>
<td>Marzo</td>
<td>Abril</td>
<td>Mayo</td>
<td>Junio</td>
<td>Julio</td>
<td>Agosto</td>
<td>Septiembre</td>
<td>Octubre</td>
<td>Noviembre</td>
<td>Diciembre</td>
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
while ($datos = mysql_fetch_array($result10)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
while ($datos = mysql_fetch_array($result11)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
while ($datos = mysql_fetch_array($result12)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}
while ($datos = mysql_fetch_array($result13)){
	$htmlTable .= "<td>{$datos[0]}</td>";
}

$htmlTable .= '</table>';


$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_1.png', 10, 10, 194, 35);
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_2.png', 10, 46, 195, 5);
$pdf->SetFont('Arial','B',12);
$pdf->WriteHTML("<br><br><br><br><br><br><br><br><br>");
$pdf->WriteHTML("Seguimiento a los mantenimientos por meses registrados <br>");
$pdf->WriteHTML($htmlTable);
$pdf->Output();
?>

