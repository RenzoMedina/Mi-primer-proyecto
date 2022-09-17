<?php
require_once ('Conexion.php');
require_once ('CRUD.php');

class Persona extends base{
    use crud;

    public $rut;
    public $nombre;
    public $apellido;
    public $correo;
    public $contraseña;
    public $repetirContraseña;
    public $cargo;
    public $sucursal;
    public $estado;
    public $conexion;

    public function insertDatos($rut,$nombre,$apellido,$correo,$contraseña,$repetirContraseña,$cargo,$sucursal,$estado){
            
        $this->rut=$rut;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->correo=$correo;
        $this->contraseña=$contraseña;
        $this->repetirContraseña=$repetirContraseña;
        $this->cargo=$cargo;
        $this->sucursal=$sucursal;
        $this->estado=$estado;

        $conexion=parent::conectar();
        try {
            $sql="INSERT INTO personal (rut, nombre, apellido, correo, contraseña, repetir_contraseña,cargo,sucursal_sede,estado) VALUES(?,?,?,?,?,?,?,?,?)";
            $query=$conexion->prepare($sql);
            $datos=[$this->rut, $this->nombre,$this->apellido,$this->correo, $this->contraseña, $this->repetirContraseña, $this->cargo,$this->sucursal, $this->estado];
            $resultado= $query->execute($datos);
           
        } catch (PDOException $e) {
            echo "Error :".$e->getMessage();
        }
    }

    public function viewDatos(){
        $conexion=parent::conectar();
       try {
        $sql= "SELECT * FROM personal";
        $query=$conexion->query($sql)->fetchALL(PDO::FETCH_OBJ);
        return $query;
       } catch (PDOException $e) {
        //throw $th;
       }

    }
    public function showDatos($id){
        $conexion=parent::conectar();
        try {
         $sql= "SELECT * FROM personal WHERE id_personal = '$id'";
         $query=$conexion->query($sql)->fetchALL(PDO::FETCH_OBJ);
         return $query;
        } catch (PDOException $e) {
         //throw $th;
        }
    }

    function updateDatos($nombre, $apellido,$contraseña,$repetirContraseña,$cargo,$sucursal,$estado,$id){
        
        $conexion=parent::conectar();
        try {
            $sql= "UPDATE personal SET nombre = ?, apellido = ?, contraseña= ?, repetir_contraseña=?, cargo =?, sucursal_sede =?, estado =?  WHERE id_personal = ? ";
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
            $sql ="DELETE FROM personal WHERE id_personal = ? ";
            $query =$conexion->prepare($sql);
            $dato = [$id];
            $resultado = $query->execute($dato);
        }
        catch(PDOException $e){
            echo "Error :".$e->getMessage();
        }
    }
}


