<?php

require_once '../models/Persona.php';
$persona= new Persona;


//insert datos
if(isset($_POST['agregar'])){
    $rut = intval( $_POST['rut']);
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contraseña = $_POST['contraseña'];
    $repetir_constraseña = $_POST['repetir_constraseña'];
    $sucursal = $_POST['sucursal'];
    $estado = $_POST['estado'];
    $cargo = $_POST['cargo'];
    $correo =$_POST['correo'];
    $correoCorp= strtolower(substr($nombre,0,1)) . strtolower(stristr($apellido," ", true)). "@camones.cl";
    $correo =$correoCorp;

    if($rut === "" || $nombre ==="" || $apellido === "" || $contraseña === "" || $repetir_constraseña === ""){
        header('Location:../../personalEdit.php?datos=error');

    }else{
        $persona->insertDatos($rut,$nombre,$apellido,$correo, $contraseña, $repetir_constraseña,$cargo,$sucursal,$estado );
        header('Location:../../personal.php?estado=ok');
    }
    exit;
}

//update datos

if(isset($_POST['actualizar'])){
    $id=$_POST['id_personal'];
    $rut = intval( $_POST['rut']);
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contraseña = $_POST['contraseña'];
    $repetir_constraseña = $_POST['repetir_constraseña'];
    $sucursal = $_POST['sucursal'];
    $estado = $_POST['estado'];
    $cargo = $_POST['cargo'];

    if($nombre === "" || $id === ""){
        header('Location:../../personal.php?udpateDato=error');
    }else{
        $persona->updateDatos($nombre,$apellido,$contraseña,$repetir_constraseña,$cargo,$sucursal,$estado,$id);
        header('Location:../../personal.php?updateDato=ok');
    }
    exit;

}

if(isset($_GET['id_eliminar'])){
    $id_eliminar =$_GET['id_eliminar'];
    if($persona->deleteDatos($id_eliminar)) {  
        header('Location:../../personal.php?deleteDato=ok'); 
    }else{header('Location:../../personal.php?deleteDato=error');
    }
    
    exit;
}

