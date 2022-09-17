<?php

require_once 'PruebaController.php';

$producto= new Productos;

$producto->codigo=$_POST['id_prod'];
$producto->nombre=$_POST['name_prod'];
$producto->stock=$_POST['stock_prod'];
$producto->cantidad=$_POST['cantidad'];
$producto->valor=$_POST['valor_prod'];
$producto->total=$producto->valor * $producto->cantidad;

session_start();

if(isset($_SESSION["venta"])){
    $venta = $_SESSION["venta"];
}else{
    $venta =[];
}
array_push($venta,$producto);
$_SESSION['venta']= $venta;
header('Location:../../ventas.php');
