<?php

require_once '../models/Login.php';

session_start();

$usuario = $_POST['usuario'];
$contraseña= $_POST['contraseña'];

$nuevo = new Home;
$lista = $nuevo->ingreso($usuario,$contraseña);
if($lista>0){
    $_SESSION['rut']=$usuario;
    $_SESSION['cargo']=$rol;
    header('Location:../../PanelControl.php');
    
}else{
    header('Location:../../index.html');
}

