<?php 
require '../models/Persona.php';
header("Content-type: application/vnd.ms-excel; charset=iso-859-1");
header("Content-Disposition:attachment; filename=datosPersonalCamones.xls");
?>
   <table border="1">
        <thead>
            <tr>
                <th>RUT</th>
                <th>NOMBRE</th>
                <th>AEPLLIDO</th>
                <th>CORREO</th>
                <th>SUCURSAL</th>
                <th>ESTADO</th>
                <th>CARGO</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
                $persona = new Persona;
                $pers= $persona->viewDatos();
                foreach($pers as $items){
            ?>
                <tr>
                <td><?php echo substr($items->rut, 0,2).".".substr($items->rut, 2, 3).".". substr($items->rut, 4,3)."-".substr($items->rut,-1)?></td>
                <td><?php echo ucwords($items->nombre) ?></td>
                <td><?php echo ucwords($items->apellido) ?></td>
                <td><?php echo $items->correo ?></td>
                <td><?php echo $items->sucursal_sede ?></td>
                <td><?php echo $items->estado ?></td>
                <td><?php echo $items->cargo ?></td>
            </tr>
          <?php  }?>
        </tbody>
   </table>

