<?php 
require '../models/Producto.php';
header("Content-type: application/vnd.ms-excel; charset=iso-859-1");
header("Content-Disposition:attachment; filename=datosProductosCamones.xls");
?>
   <table border="1">
        <thead>
            <tr>
                <th>CODIGO</th>
                <th>NOMBRE</th>
                <th>CATEGORIA</th>
                <th>CANTIDAD</th>
                <th>PRECIO COSTO</th>
                <th>PRECIO VENTA</th>
                <th>PROVEEDOR</th>
                <th>FECHA INGRESO</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
                $producto = new Producto;
                $prod= $producto->viewDatos();
                foreach($prod as $items){
            ?>
            
            </tr>

                <td><?php echo $items->codigo_producto ?></td>
                <td><?php echo $items->nombre_producto ?></td>
                <td><?php echo $items->categoria ?></td>
                <td><?php echo $items->cantidad ?></td>
                <td><?php echo '$ '.substr($items->precio_costo,0,2)."." .substr($items->precio_costo,2) ?></td>
                <td><?php echo '$ '.substr($items->precio_venta,0,2)."." .substr($items->precio_venta,2) ?></td>
                <td><?php echo $items->proveedor_nombre ?></td>
                <td><?php echo $items->fecIngreso ?></td>
            </tr>

          <?php  }?>
        </tbody>
   </table>