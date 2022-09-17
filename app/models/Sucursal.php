<?php
require_once ('Conexion.php');
require_once ('CRUD.php');

class Sucursal extends base{
    use crud;

    public $nombre_sede;
    public $direccion_sede;
    public $conexion;

    public function insertDatos($nombre_sede,$direccion_sede){

        $this->nombre_sede=$nombre_sede;
        $this->direccion_sede=$direccion_sede;
        $conexion=parent::conectar();
        try {
            
            $sql="INSERT INTO sucursal (nombre_sede, dirección_sede) VALUES(?,?)";
            $query=$conexion->prepare($sql);
            $datos=[$this->nombre_sede, $this->direccion_sede];
            $resultado= $query->execute($datos);
        

        } catch (PDOException $e) {
            //echo "Error :".$e->getMessage();
        }
        
    }

    public function viewDatos(){
        $conexion=parent::conectar();
       try {

        $sql= "SELECT * FROM sucursal";
        $query=$conexion->query($sql)->fetchALL(PDO::FETCH_OBJ);
        return $query;
       } catch (PDOException $e) {
        //throw $th;
       }

    }
}
