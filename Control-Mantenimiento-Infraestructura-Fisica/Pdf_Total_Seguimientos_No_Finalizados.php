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

//SHOW A DATABASE ON A PDF FILE
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('fpdf17/fpdf.php');

// se envia la consulta
$result1 = mysql_query ( "SELECT COUNT(*) FROM seguimiento WHERE Fecha_FinaL='0000/00/00'", $link );

//Se inicializa las columnas del archivo
$column_Total1 = "";

//Por cada respuesta, se agrega el campo que le corresponde a la columna
while($row = mysql_fetch_array($result1))
{
	$Total1 = $row[0];
	
	$column_Total1 = $column_Total1.$Total1."\n";
}

mysql_close();

// Crear nuevo archivo pdf
$pdf=new FPDF();

//--------------------------------------------- PRIMERA HOJA PDF ---------------------------------------------------------------------//
$pdf->AddPage();
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_1.png', 15, 25,190);
$pdf->Image('./Control_Mantenimiento_Infraestructura_files/Img/Banner_2.png', 15, 47,190);
$pdf->SetFont('Arial','B',16);
$pdf->SetX(110);
$pdf->Cell(10,6,'TOTAL DE MANTENIMIENTOS NO FINALIZADOS REGISTRADOS',0,0,'C',0);

//Posicion en Y
$Y_Fields_Name_position = 70;
//Posicion de la tabla
$Y_Table_Position = 76;

//Primero creamos cada titulo de la tabla
//Color
$pdf->SetFillColor(232,232,232);

//Fuente de ka letra
$pdf->SetFont('Arial','B',16);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(15);
$pdf->Cell(10,6,'N°',1,0,'C',1);
$pdf->SetX(25);
$pdf->Cell(100,6,'Total',1,0,'C',1);

//MOSTRAMOS LAS COLUMNAS
$pdf->SetFont('Arial','',14);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(10,6,'01',1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(25);
$pdf->MultiCell(100,6,$column_Total1,1);

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < 1)
{
	$pdf->SetX(15);
	$pdf->MultiCell(110,6,'',1);
	$i = $i +1;
}

$pdf->Output();
?>