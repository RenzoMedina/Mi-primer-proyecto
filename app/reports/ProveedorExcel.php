<?php 
require '../models/Proveedor.php';
header("Content-type: application/vnd.ms-excel; charset=iso-859-1");
header("Content-Disposition:attachment; filename=datosProveedorCamones.xls");
?>
   <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>RUT</th>
                <th>NOMBRE</th>
                <th>DIRECCION</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
                $proveedor = new Proveedor;
                $suc= $proveedor->viewDatos();
                foreach($suc as $items){
            ?>
            
            </tr>

                <td><?php echo $items->id_proveedor ?></td>
                <td><?php echo $items->rut_proveedor ?></td>
                <td><?php echo $items->nombre_proveedor ?></td>
                <td><?php echo $items->direccion ?></td>
            </tr>

          <?php  }?>
        </tbody>
   </table>