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

$result=mysql_query("SELECT * FROM contratista ORDER BY Id_Contratista",$link);

$htmlTable='<table>
<tr>
<td>ID</td>
<td>Nombre Del Operario</td>
<td>Tipo Documento</td>
<td>Cédula</td>
<td>Celular</td>
<td>Correo</td>
<td>Nick / Usuario</td>
<td>Especialidad</td>
</tr>';

while ($datos = mysql_fetch_array($result)){
	$htmlTable .= "<tr>
				<td>{$datos[0]}</td>
				<td>{$datos[1]} {$datos[2]} {$datos[3]}</td>
				<td>{$datos[4]}</td>
				<td>{$datos[5]}</td>
				<td>{$datos[6]}</td>
				<td>{$datos[7]}</td>
				<td>{$datos[8]}</td>
				<td>{$datos[10]}</td>				
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
$pdf->WriteHTML("Operarios u Contratistas Registrados <br>");
$pdf->WriteHTML($htmlTable);
$pdf->Output();
?>