<?php 
require '../models/Sucursal.php';
header("Content-type: application/vnd.ms-excel; charset=iso-859-1");
header("Content-Disposition:attachment; filename=datosSucursalCamones.xls");
?>
   <table border="1">
        <thead>
            <tr>
                <th>CODIGO</th>
                <th>NOMBRE SEDE</th>
                <th>DIRECCION</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
                $sucursal = new Sucursal;
                $suc= $sucursal->viewDatos();
                foreach($suc as $items){
            ?>
            
            </tr>

                <td><?php echo $items->codigo ?></td>
                <td><?php echo $items->nombre_sede ?></td>
                <td><?php echo $items->dirección_sede ?></td>
            </tr>

          <?php  }?>
        </tbody>
   </table>