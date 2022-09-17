<?php

require_once ('Conexion.php');
class Home extends base{

    public $rut;
    public $contraseña;
    //public $conexion;
    
    public function ingreso($rut,$contraseña){

        $conexion=parent::conectar();
        $sql= $conexion->prepare("SELECT * FROM personal WHERE rut ='$rut' AND contraseña ='$contraseña'");
        $sql->execute();
        $fila= $sql->rowCount();
        return $fila;

    }
    public function datos(){
        $conexion=parent::conectar();
        $sql= $conexion->prepare("SELECT * FROM personal");
        $sql->execute();
        $resultado=$sql->fetc(PDO::FETCH_OBJ);
        return $resultado;
    }

}
