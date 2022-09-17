<?php

abstract class base {

    public static $local="localhost";
    public static $usuario="root";
    public static $pass="";
    public static $base="camones";

    public function conectar(){
        $dns = "mysql:host=".self::$local.";dbname=".self::$base;
        try {
            $pdo = new PDO($dns, self::$usuario, self::$pass);
            return $pdo;
        } catch (PDOException $e) {
             echo "Error: ".$e->getMessage();
        }
    }
}
