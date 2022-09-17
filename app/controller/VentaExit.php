<?php 

session_start();
unset($_SESSION['venta']);
header('Location:../../ventas.php');
