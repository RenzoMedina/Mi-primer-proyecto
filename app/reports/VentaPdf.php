<?php 

require '../fpdf/fpdf.php';
require '../models/Proveedor.php';
include_once('../models/Producto.php');
include_once('../controller/PruebaController.php');

session_start();


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Helvetica','I',12);
    // Movernos a la derecha
    $this->Cell(15);
    // Título
    $this->Cell(30,10,'TIENDAS CAMONES S.A',0,0,'C');
    
    $this->Ln(5);
    $this->Cell(8);
    $this->SetFont('Helvetica','I',10);
    $this->Cell(30, 10,utf8_decode('Av. Dirección S/N - Lampa'),0,0,);
    // Salto de línea
    $this->Ln(5);
    $this->Cell(15);
    $this->SetFont('Helvetica','I',8);
    $this->Cell(30, 10,utf8_decode('R.U.T 11.111.111-1'),0,0,);
    $this->Ln(10);
    // Salto de línea
    $this->Ln(-1);
    $this->Cell(20);
    $this->SetFont('Helvetica','I',10);
    $this->Cell(30, 10,utf8_decode('BOLETA'),0,0,);
    // Salto de línea
    $this->Ln(10);
    $this->Cell(32);
    $this->SetFont('Helvetica','BI',9);
    $this->Cell(30, 10,utf8_decode('Fecha: '.date('d / M / Y')),0,0,);
    // Salto de línea
    $this->Ln(1);
    $this->Cell(-7);
    $this->SetFont('Helvetica','BI',9);
    $this->Cell(74, 10,'','B',0,);
    // Salto de línea
    $this->Ln(8);
    $this->Cell(-7);
    $this->SetFont('Arial','B',8);
    $this->Cell(8, 10,'Can .',0,0,'C');
    $this->Cell(35, 10,'Desc.',0,0,'C');
    $this->Cell(15, 10,'Valor',0,0,'C');
    $this->Cell(17, 10,'Sub. Total',0,0,'C');
    $this->Ln(10);


}

// Pie de página
function Footer()
{   
    
    $this->Ln(1);
    $this->Cell(-7);
    $this->SetFont('Helvetica','BI',9);
    $this->Cell(74, 10,'','B',0,);
    

    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    
    $this->SetFont('Helvetica','BI',9);
    $this->Cell(13);
    $this->Cell(30, 10,utf8_decode('Gracias por su compra'),0,0,);
    $this->ln(4);
    $this->Cell(15);
    $this->SetFont('Helvetica','I',8.5);
    $this->Cell(30, 10,utf8_decode('wwww.camones.cl'),0,0,);
    // Número de página
    //$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$proveedor= new Proveedor;
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P',array(150,80),0);
$pdf->SetFont('Arial','',8.5);
$venta= $_SESSION['venta'];
$total=0;
foreach($venta as $items){
    $pdf->ln(-4);
    $pdf->Cell(-4);
    $pdf->Cell(5,8,$items->cantidad,0,0);
    $pdf->Cell(35,8,$items->nombre,0,0,'C');
    $pdf->Cell(15,8,"$.".substr($items->valor,0,2).".".substr($items->valor,2),0,0,'C');
    $pdf->Cell(17,8,"$.".substr($items->total,0,2).".".substr($items->total,2),0,0,'C');
    $pdf->ln(8);
    $total+=$items->total;


}

    $pdf->SetFont('Helvetica','BI',9);
    $pdf->Cell(-7);
    $pdf->Cell(74, 10,'','B',0,);
    $pdf->ln(13);
    $pdf->Cell(30);
    $pdf->Cell(21,8,'TOTAL :', 0,0);
    $pdf->Cell(15,8,"$.".substr($total,0,-3).".".substr($total,-3), 0,0,"C");



$pdf->Output();