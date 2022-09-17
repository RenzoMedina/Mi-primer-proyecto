<?php 

require '../fpdf/fpdf.php';
require '../models/Proveedor.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Helvetica','I',14);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'TIENDAS CAMONES S.A',0,0,'C');
    // Salto de línea
    
    $this->Ln(20);
    $this->Cell(30);
    $this->Cell(30, 10,'Reportes - Proveedor',0,0,);
    $this->Ln(20);

    $this->Cell(20,8,"Id",1,0,'C',0);
    $this->Cell(35,8,"RUT",1,0,'C',0);
    $this->Cell(60,8,"Nombre",1,0,'C',0);
    $this->Cell(70,8,utf8_decode("Dirección"),1,0,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$proveedor= new Proveedor;
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('PRAIT','A4',0);
$pdf->SetFont('Times','I',12);
$prov=$proveedor->viewDatos();
foreach($prov as $items){
    $pdf->ln(8);
    $pdf->Cell(20,8,$items->id_proveedor,1,0,'C',0);
    $pdf->Cell(35,8,substr($items->rut_proveedor, 0,2).".".substr($items->rut_proveedor, 2, 3).".". substr($items->rut_proveedor, 4,3)."-".substr($items->rut_proveedor,-1),1,0,'C',0);
    $pdf->Cell(60,8,ucwords($items->nombre_proveedor),1,0,'C',0);
    $pdf->Cell(70,8,utf8_decode($items->direccion),1,0,'C',0);
}
$pdf->Output();