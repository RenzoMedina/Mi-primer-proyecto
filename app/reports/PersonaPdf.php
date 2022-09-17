<?php 

require '../fpdf/fpdf.php';
require '../models/Persona.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Helvetica','I',16);
    // Movernos a la derecha
    $this->Cell(130);
    // Título
    $this->Cell(30,10,'TIENDAS CAMONES S.A',0,0,'C');
    // Salto de línea
    
    $this->Ln(20);
    $this->Cell(50);
    $this->Cell(30, 10,'Reportes - Personal',0,0,);
    $this->Ln(20);

    $this->Cell(30,8,"Rut",1,0,'C',0);
    $this->Cell(48,8,"Nombre",1,0,'C',0);
    $this->Cell(50,8,"Apellido",1,0,'C',0);
    $this->Cell(60,8,"Correo",1,0,'C',0);
    $this->Cell(30,8,"Sucursal",1,0,'C',0);
    $this->Cell(30,8,"Cargo",1,0,'C',0);
    $this->Cell(30,8,"Estado",1,0,'C',0);
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
$persona= new Persona;
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('LANDCASPE','A4',0);
$pdf->SetFont('Times','I',12);
$pers=$persona->viewDatos();
foreach($pers as $items){
    $pdf->ln(8);
    $pdf->Cell(30,8,substr($items->rut, 0,2).".".substr($items->rut, 2, 3).".". substr($items->rut, 4,3)."-".substr($items->rut,-1),1,0,'C',0);
    $pdf->Cell(48,8,ucwords($items->nombre),1,0,'C',0);
    $pdf->Cell(50,8,ucwords($items->apellido),1,0,'C',0);
    $pdf->Cell(60,8,$items->correo,1,0,'C',0);
    $pdf->Cell(30,8,$items->sucursal_sede,1,0,'C',0);
    $pdf->Cell(30,8,$items->cargo,1,0,'C',0);
    $pdf->Cell(30,8,$items->estado,1,0,'C',0);
}
$pdf->Output();