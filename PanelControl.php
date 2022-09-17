<?php

session_start();

$nombre=$_SESSION['rut'];
if($nombre === null || $nombre === ""){
     header("Location:index.html");
     echo $nombre;
   die();
}
    include_once('cabecera.php');
    include_once('footer.php');
?>