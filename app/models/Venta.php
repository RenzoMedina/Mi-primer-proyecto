<?php

require_once ('Conexion.php');
require_once ('CRUD.php');

class Venta extends base{
    use crud;

    public $conexion;

    public function insertDatos($listaProductos){
        $conexion=parent::conectar();
        try {
            foreach($listaProductos as $lista){
            $sql="INSERT INTO ventas (codigo,descripcion,valor_venta,cantidad,total) VALUES(?,?,?,?,?)";
            $query=$conexion->prepare($sql);
            $datos=[$lista->codigo, $lista->nombre, $lista->valor,$lista->cantidad, $lista->total];
            $resultado= $query->execute($datos);

        }
        } catch (PDOException $e) {
            echo "Error :".$e->getMessage();
        }
        
    }

    public function viewDatos(){
        $conexion=parent::conectar();
       try {
        $sql= "SELECT * FROM ventas";
        $query=$conexion->query($sql)->fetchALL(PDO::FETCH_OBJ);
        return $query;
       } catch (PDOException $e) {
        //throw $th;
       }

    }

    public function reporteDatos(){
        $conexion=parent::conectar();
        try {
         $sql= "SELECT * FROM ventas INNER JOIN productos WHERE ventas.codigo= productos.codigo_producto;
         SELECT * FROM productos INNER JOIN proveedor  WHERE productos.proveedor_nombre = proveedor.nombre_proveedor; ";
         $query=$conexion->query($sql)->fetchALL(PDO::FETCH_OBJ);
         return $query;
        } catch (PDOException $e) {
         //throw $th;
        }
    }
}