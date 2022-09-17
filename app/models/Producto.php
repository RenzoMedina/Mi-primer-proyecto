<?php
require_once ('CRUD.php');
require_once ('Conexion.php');
//include_once '../controller/PruebaController.php';

class Producto extends base{
    use crud;
    public function insertDatos($codigo, $nombre, $categoria, $cantidad, $precioCosto, $precioVenta,$proveedor,$fecIngreso){
        $conexion=parent::conectar();
        try {
            $sql="INSERT INTO productos (codigo_producto, nombre_producto, categoria, cantidad, precio_costo,precio_venta,proveedor_nombre,fecIngreso) VALUES(?,?,?,?,?,?,?,?)";
            $query=$conexion->prepare($sql);
            $datos=[$codigo, $nombre, $categoria, $cantidad, $precioCosto, $precioVenta,$proveedor,$fecIngreso];
            $resultado= $query->execute($datos);
        } catch (PDOException $e) {
            echo "Error :".$e->getMessage();
        }
    }

    public function getProductos(){
        $conexion=parent::conectar();
        $listProductos=[];
        $sql= "SELECT * FROM productos";
        $query=$conexion->query($sql)->fetchALL(PDO::FETCH_OBJ);
        foreach ($query as $item){
            $pro = new Producto;
            $pro->codigo= $item->codigo_producto;
            $pro->nombre= $item->nombre_producto;
            $pro->stock= $item->cantidad;
            $pro->valor=$item->precio_venta;

            array_push($listProductos,$pro);
        }


        return $listProductos;

    }
    public function viewDatos(){
        $conexion=parent::conectar();
       try {
        $sql= "SELECT * FROM productos";
        $query=$conexion->query($sql)->fetchALL(PDO::FETCH_OBJ);
        return $query;
       } catch (PDOException $e) {
        //throw $th;
       }

    }
    public function showDatos($id){
        $conexion=parent::conectar();
        try {
         $sql= "SELECT * FROM productos WHERE id_personalcodigo_producto = '$id'";
         $query=$conexion->query($sql)->fetchALL(PDO::FETCH_OBJ);
         return $query;
        } catch (PDOException $e) {
         //throw $th;
        }
    }

    function updateDatos($codigo, $nombre, $categoria, $cantidad, $precioCosto, $precioVenta,$proveedor){
        
        $conexion=parent::conectar();
        try {
            $sql= "UPDATE productos SET codigo_producto = ?, nombre_producto = ?, categoria= ?, cantidad=?, precio_costo =?, precio_venta =?, proveedor_nombre =?  WHERE codigo_producto = ? ";
            $query = $conexion->prepare($sql);
            $datos =[$codigo, $nombre, $categoria, $cantidad, $precioCosto, $precioVenta,$proveedor];
            $resultado= $query->execute($datos);

        } catch (PDOException $e) {
            echo "Error :".$e->getMessage();
        }
    }

    function deleteDatos($id){
        $conexion= parent::conectar();
        try{
            $sql ="DELETE FROM productos WHERE codigo_producto = ? ";
            $query =$conexion->prepare($sql);
            $dato = [$id];
            $resultado = $query->execute($dato);
        }
        catch(PDOException $e){
            echo "Error :".$e->getMessage();
        }
    }
}

