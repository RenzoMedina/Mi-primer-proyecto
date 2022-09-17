<?php

require_once '../models/Producto.php';
$producto= new Producto;
$pro = $producto->viewDatos();
echo json_encode($pro);
