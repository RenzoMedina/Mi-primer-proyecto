<?php
require_once '../models/Proveedor.php';
$proveedor = new Proveedor;

if(isset($_POST['btnProveedor'])){
    $rut=$_POST['rut'];
    $nombre_proveedor=$_POST['nombre_proveedor'];
    $direccion= $_POST['direccion'];

    if(empty($rut) || empty($nombre_proveedor) || empty($direccion)){
        header('Location:../../almacen.php');
    }else{
        $proveedor->insertDatos($rut,$nombre_proveedor,$direccion);
        header('Location:../../almacen.php?proveedor=ok');
    }
    exit;
}