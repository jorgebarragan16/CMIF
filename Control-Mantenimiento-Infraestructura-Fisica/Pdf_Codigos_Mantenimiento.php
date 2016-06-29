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

$htmlTable='<table>
<tr>
<td>N°</td>
<td>Codigo</td>
<td>Nombre del mantenimiento</td>
</tr>

<tr>
<td>1</td>
<td>01</td>
<td>Electricidad</td>
</tr>

<tr>
<td>2</td>
<td>02</td>
<td>Jardinería</td>
</tr>

<tr>
<td>3</td>
<td>03</td>
<td>Piscína</td>
</tr>

<tr>
<td>4</td>
<td>04</td>
<td>Granja</td>
</tr>
		
<tr>
<td>5</td>
<td>05</td>		
<td>Zonas verdes</td>
</tr>
		
<tr>
<td>6</td>
<td>06</td>		
<td>Aseos generales</td>
</tr>
		
<tr>
<td>7</td>
<td>07</td>		
<td>Reparaciones generales</td>
</tr>
					
<tr>
<td>8</td>
<td>08</td>		
<td>Otro</td>
</tr>
</table>';

$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_1.png', 10, 10, 194, 35);
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_2.png', 10, 46, 195, 5);
$pdf->SetFont('Arial','B',12);
$pdf->WriteHTML("<br><br><br><br><br><br><br><br><br>");
$pdf->WriteHTML("Códigos de los mantenimientos<br>");
$pdf->WriteHTML($htmlTable);
$pdf->Output();
?>