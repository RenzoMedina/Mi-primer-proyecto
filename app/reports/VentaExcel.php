<?php 
require '../models/Venta.php';
header("Content-type: application/vnd.ms-excel; charset=iso-859-1");
header("Content-Disposition:attachment; filename=datosVentasCamones.xls");
?>
   <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>CODIGO</th>
                <th>DESCRIPCION</th>
                <th>VALOR</th>
                <th>CANTIDAD</th>
                <th>TOTAL</th>
                <th>CATEGORIA</th>
                <th>STOCK</th>
                <th>PRECIO COSTO</th>
                <th>PROVEEDOR</th>
                <th>FECHA DE INGRESO</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
                $venta = new Venta;
                $vent= $venta->reporteDatos();
                foreach($vent as $items){
            ?>
            
            </tr>

                <td><?php echo $items->id_ventas ?></td>
                <td><?php echo $items->codigo?></td>
                <td><?php echo $items->descripcion ?></td>
                <td><?php echo $items->valor_venta ?></td>
                <td><?php echo $items->cantidad ?></td>
                <td><?php echo $items->total ?></td>
                <td><?php echo $items->categoria ?></td>
                <td><?php echo $items->cantidad ?></td>
                <td><?php echo $items->precio_costo ?></td>
                <td><?php echo $items->proveedor_nombre ?></td>
                <td><?php echo $items->fecIngreso ?></td>
            </tr>

          <?php  }?>
        </tbody>
   </table>