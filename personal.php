<?php

session_start();

$nombre=$_SESSION['rut'];
if($nombre === null || $nombre === ""){
     header("Location:index.html");
     echo $nombre;
   die();
}
    include_once('cabecera.php');
    include_once('./app/models/Sucursal.php');
    include_once('./app/models/Persona.php');
?>

<div class="contaier-fluid p-4">
    <div class="d-flex justify-content-end pb-4">
        <button type="button" class="btn btn-primary btn-lg" ><a href="personalEdit.php" class="nav-link"><i class="bi bi-person-plus"> Nuevo</i></a></button>
    </div>

    <?php

    if(isset($_GET['estado'])== 'ok'){
        echo "<script> alertify.success('Se ha agregado un nuevo usuario')</script>";
    } 
    if(isset($_GET['updateDato'])=='ok'){
        echo "<script> alertify.success('Se Actualizaron los datos')</script>";
    }

    if(isset($_GET['deleteDato'])=='ok'){
        echo "<script> alertify.success('Se ha eliminado usuario')</script>";
    }

            ?>
   <table class="table">
        <thead>
            <tr>
                <th>RUT</th>
                <th>NOMBRE</th>
                <th>AEPLLIDO</th>
                <th>CORREO</th>
                <th>SUCURSAL</th>
                <th>ESTADO</th>
                <th>CARGO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody class="table-group-divider" id ="tbody" >
            <?php 
            
                $persona = new Persona;
                $pers= $persona->viewDatos();
                foreach($pers as $items){
            ?>
            
                <?php 
                    if($items->estado === "No Vigente"){
                
                ?>
                <tr class="bg-light">
                <td class="text-secondary text-decoration-line-through"><?php echo substr($items->rut, 0,2).".".substr($items->rut, 2, 3).".". substr($items->rut, 4,3)."-".substr($items->rut,-1)?></td>
                <td class="text-secondary text-decoration-line-through"><?php echo ucwords($items->nombre) ?></td>
                <td class="text-secondary text-decoration-line-through"><?php echo ucwords($items->apellido) ?></td>
                <td class="text-secondary text-decoration-line-through"><?php echo $items->correo ?></td>
                <td class="text-secondary text-decoration-line-through"><?php echo $items->sucursal_sede ?></td>
                <td class="text-secondary text-decoration-line-through"><?php echo $items->estado ?></td>
                <td class="text-secondary text-decoration-line-through"><?php echo $items->cargo ?></td>
                <td>
                    <a href="personaUpdate.php?id=<?php echo $items->id_personal?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <a href="./app/controller/PersonalController.php?id_eliminar=<?php echo $items->id_personal?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php }else{ ?>

                <td><?php echo substr($items->rut, 0,2).".".substr($items->rut, 2, 3).".". substr($items->rut, 4,3)."-".substr($items->rut,-1)?></td>
                <td><?php echo ucwords($items->nombre) ?></td>
                <td><?php echo ucwords($items->apellido) ?></td>
                <td><?php echo $items->correo ?></td>
                <td><?php echo $items->sucursal_sede ?></td>
                <td><?php echo $items->estado ?></td>
                <td><?php echo $items->cargo ?></td>
                <td>
                    <a href="personaUpdate.php?id=<?php echo $items->id_personal?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <a href="./app/controller/PersonalController.php?id_eliminar=<?php echo $items->id_personal?>" onclick="return eliminacion()" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                </td>
            </tr>

             <?php }?>

          <?php  }?>
        </tbody>
   </table>
</div>

</div>

<script>

function eliminacion(){
    
    let respuesta = confirm("Estas seguro de eliminar");
    return respuesta
}

</script>

<?php
    include_once('footer.php');
?>