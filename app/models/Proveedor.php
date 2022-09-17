<?php
require_once ('CRUD.php');
require_once ('Conexion.php');
class Proveedor extends base{

    use crud;
    public function insertDatos($rut, $nombre,$direccion){
        $conexion=parent::conectar();
        try {
            $sql="INSERT INTO proveedor (rut_proveedor, nombre_proveedor, direccion) VALUES(?,?,?)";
            $query=$conexion->prepare($sql);
            $datos=[$rut, $nombre, $direccion];
            $resultado= $query->execute($datos);
           
        } catch (PDOException $e) {
            echo "Error :".$e->getMessage();
        }
    }

    public function viewDatos(){
        $conexion=parent::conectar();
       try {
        $sql= "SELECT * FROM proveedor";
        $query=$conexion->query($sql)->fetchALL(PDO::FETCH_OBJ);
        return $query;
       } catch (PDOException $e) {
        //throw $th;
       }

    }
    public function showDatos($id){
        $conexion=parent::conectar();
        try {
         $sql= "SELECT * FROM proveedor WHERE id_proveedor = '$id'";
         $query=$conexion->query($sql)->fetchALL(PDO::FETCH_OBJ);
         return $query;
        } catch (PDOException $e) {
         //throw $th;
        }
    }

    function updateDatos(){
        
        $conexion=parent::conectar();
        try {
            $sql= "UPDATE proveedor SET rut_proveedor = ?, nombre_proveedor = ?, direccion= ?,  WHERE id_proveedor = ? ";
            $query = $conexion->prepare($sql);
            $datos =[$nombre,$apellido,$contraseña,$repetirContraseña,$cargo,$sucursal,$estado,$id];
            $resultado= $query->execute($datos);

        } catch (PDOException $e) {
            echo "Error :".$e->getMessage();
        }
    }

    function deleteDatos($id){
        $conexion= parent::conectar();
        try{
            $sql ="DELETE FROM proveedor WHERE id_proveedor = ? ";
            $query =$conexion->prepare($sql);
            $dato = [$id];
            $resultado = $query->execute($dato);
        }
        catch(PDOException $e){
            echo "Error :".$e->getMessage();
        }
    }
}