<?php

require_once '../models/Sucursal.php';

$sucursal= new Sucursal;
$nombreSede=$_POST['nombreSede'];
$direccionSede=$_POST['direccionSede'];

if($nombreSede === "" || $direccionSede ===""){
    header('Location:../../sucursal.php');

}else{
    $sucursal->insertDatos($nombreSede,$direccionSede);
    header('Location:../../sucursal.php?estado=ok');
}


