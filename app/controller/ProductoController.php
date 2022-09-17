<?php

require_once '../models/Producto.php';
$producto= new Producto;

if(isset($_POST['btnProducto'])){
    $codigo= $_POST['codigo'];
    $fecIngreso= $_POST['fecIngreso'];
    $nombre_producto= $_POST['nombre_producto'];
    $cantidad= $_POST['cantidad'];
    $proveedor= $_POST['proveedor'];
    $precioCosto= $_POST['precioCosto'];
    $precioVenta= $_POST['precioVenta'];
    $categoria= $_POST['categoria'];

    if(empty($codigo) || empty($nombre_producto) || empty($cantidad) || empty($precioCosto) || empty($precioVenta) || empty($cantidad)){
        header('Location:../../almacen.php');
    }else{
        $producto->insertDatos($codigo,$nombre_producto,$categoria,$cantidad,$precioCosto,$precioVenta,$proveedor,$fecIngreso);
       header('Location:../../almacen.php?producto=ok');
    }
    exit;
}