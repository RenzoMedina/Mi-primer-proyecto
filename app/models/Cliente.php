<?php

require_once ('Conexion.php');
require_once ('CRUD.php');

class Cliente extends base{
    use crud;

    public $conexion;

    public function insertDatos($rut,$nombre){
        $conexion=parent::conectar();
        try {
            $sql="INSERT INTO cliente (rut_cliente, nombre_cliente) VALUES(?,?)";
            $query=$conexion->prepare($sql);
            $datos=[$rut, $nombre];
            $resultado= $query->execute($datos);
        } catch (PDOException $e) {
            echo "Error :".$e->getMessage();
        }
    }

    public function validDatos($rut){
        $conexion=parent::conectar();
        try{
            $sql= "SELECT * FROM cliente WHERE rut_cliente ='$rut'";
            $query=$conexion->query($sql);
        }
        catch(PDOException $e){
            echo 'Error'.$e->getMessage();
        }
    }
}