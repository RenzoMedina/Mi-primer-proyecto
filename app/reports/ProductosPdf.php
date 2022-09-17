<?php 

require '../fpdf/fpdf.php';
require '../models/Producto.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Helvetica','I',13);
    // Movernos a la derecha
    $this->Cell(130);
    // Título
    $this->Cell(30,10,'TIENDAS CAMONES S.A',0,0,'C');
    // Salto de línea
    
    $this->Ln(20);
    $this->Cell(50);
    $this->Cell(30, 10,'Reportes - Productos',0,0,);
    $this->Ln(20);

    $this->Cell(28,8,"Codigo",1,0,'C',0);
    $this->Cell(53,8,"Nombre",1,0,'C',0);
    $this->Cell(30,8,"Categoria",1,0,'C',0);
    $this->Cell(20,8,"Cnt",1,0,'C',0);
    $this->Cell(32,8,"Precio Cos.",1,0,'C',0);
    $this->Cell(32,8,"Precio Ven.",1,0,'C',0);
    $this->Cell(46,8,"Proveedor",1,0,'C',0);
    $this->Cell(35,8,"Fecha Ing.",1,0,'C',0);
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
$producto= new Producto;
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('LANDCASPE','A4',0);
$pdf->SetFont('Times','I',12);

$prod = $producto->viewDatos();
foreach($prod as $items){

    $pdf->ln(8);
    $pdf->Cell(28,8,$items->codigo_producto,1,0,'C',0);
    $pdf->Cell(53,8,$items->nombre_producto,1,0,'C',0);
    $pdf->Cell(30,8,$items->categoria,1,0,'C',0);
    $pdf->Cell(20,8,$items->cantidad,1,0,'C',0);
    $pdf->Cell(32,8,'$ '.substr($items->precio_costo,0,2)."." .substr($items->precio_costo,2),1,0,'C',0);
    $pdf->Cell(32,8,'$ '.substr($items->precio_venta,0,2)."." .substr($items->precio_venta,2),1,0,'C',0);
    $pdf->Cell(46,8,$items->proveedor_nombre,1,0,'C',0);
    $pdf->Cell(35,8,$items->fecIngreso,1,0,'C',0);
}
$pdf->Output();