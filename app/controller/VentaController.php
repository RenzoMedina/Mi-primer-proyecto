<?php
include_once('../models/Producto.php');
include_once('PruebaController.php');
require_once '../models/Cliente.php';
require_once '../models/Venta.php';

session_start();

$venta= $_SESSION['venta'];
$total= $_SESSION['total'];

$rut =$_POST['rut'];
$nombre_cliente=$_POST['nombre_cliente'];

$cliente= new Cliente;

if(!empty($rut) || !empty($nombre_cliente)){
    $cliente->insertDatos($rut,$nombre_cliente);
    echo "Se insertaron los datos";
}else{
   echo "<script>alert('Error')</script>";
}
$ventaNueva = new Venta;
$ventaNueva->insertDatos($venta);

header('Location:../../ventaDetalle.php');



