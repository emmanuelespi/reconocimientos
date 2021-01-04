<?php
require('../php/conectar.php');
require('fpdf/fpdf.php');
require('fpdi/fpdi.php');

$institucion= $_POST["institucion"];
$nombreTorneo=utf8_decode($_POST["nom_torneo"]);
$nombre = $_POST["nom_completo"];
/*
echo $nombreTorneo;
echo "<br>";
echo $institucion;
echo "<br>";
echo $nombre;
*/

$query= "select * from tbtorneos where nombre='$nombreTorneo';";

$res=mysqli_query($link,$query);
$row=mysqli_fetch_array($res);

$query2= "select * from tbequipo where vexid='$institucion'";
$resul2=mysqli_query($link, $query2);
$fila=mysqli_fetch_array($resul2);

$cadena = utf8_decode("Por haber participado con la institución: ").$fila['institucion'];
$cadena2 = "en el ". $row['nombre'];
$cadena3 = utf8_decode(" dicho evento que se llevó a cabo en la ciudad de ").$row['lugar'];
$cadena4 = "con fecha del ". $row['fecha'].".";





$pdf=new FPDI();
$pageCount= $pdf->setSourceFile("Diplomas.pdf");
$pagina= $pdf->importPage(1);

$specs = $pdf->getTemplateSize($pagina);

$pdf->addPage('L');
$pdf->useTemplate($pagina, 10, 0, 270);

$pdf->setFont("Arial", "B", 30);
$pdf->SetXY(140,75);
$pdf->Cell(5,20, utf8_decode($nombre), 0,0,'C');
$pdf->Ln(50);


$pdf->setFont("Arial", "", 17);
$pdf->SetXY(140,90);
$pdf->Cell(5,20, $cadena, 0,0,'C');
$pdf->Ln(50);

$pdf->setFont("Arial", "", 17);
$pdf->SetXY(145,100);
$pdf->Cell(5,20, $cadena2, 0,0,'C');
$pdf->Ln(50);


$pdf->setFont("Arial", "", 17);
$pdf->SetXY(140,110);
$pdf->Cell(5,20, $cadena3, 0,0,'C');
$pdf->Ln(50);

$pdf->setFont("Arial", "", 17);
$pdf->SetXY(140,120);
$pdf->Cell(5,20, $cadena4, 0,0,'C');


$pdf->Output();

/*$pdf->Cell(5,1, 'Hola '. $pdf->Cell(10, 20, $nombre. ' Final', 0,0, 'C'), 0,0, 'J');

$pdf->setFont("Arial", "B", 16);
$pdf->SetXY(150,113);
$pdf->Cell(5, 20, $cadena ." " . $institucion, 0,0, 'C');

$pdf->setFont("Arial", "B", 16);
$pdf->SetXY(265,80);
$pdf->Cell(5, 20, $nombreTorneo, 0,0, 'C');*/

?>