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
    <?php 


        $id = $_GET['id'];
        $persona= new Persona;
        $datos = $persona->showDatos($id);
        foreach($datos as $items){
    ?>



<div class="contaier-fluid p-4">
    <?php
            if(isset($_GET['updateDato'])=='error'){
                echo "<script> alertify.error('No se actualizaron los datos')</script>";
            }
    ?>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Actualizar Datos</h3>
        </div>
        <div class="card-body">
        <form action="./app/controller/PersonalController.php" id="formPersonal" method='POST'>
           <input type="text" name="id_personal" value="<?php echo $id ?>" hidden>
           <div class="row">
               <div class="col-md-6 ">
                   <input type="text" name="rut" value="<?php echo $items->rut ?>" placeholder="RUT sin puntos ni guion" class="form-control text-secondary " readonly>
               </div>
               <div class="col-md-6">
                   <input type="text" name="nombre" value="<?php echo $items->nombre ?>" placeholder="Nombre" class="form-control" autocomplete="off">
               </div>
           </div>
           <div class="row mt-3">
               <div class="col-md-6">
                   <input type="text" name="apellido" value="<?php echo $items->apellido ?>" placeholder="Apellido" class="form-control" autocomplete="off">
               </div>
               <div class="col-md-6">
                   <input type="text" name="correo" class="form-control" id="correo" placeholder="Correo" hidden>
                   <select name="cargo" id="cargo" class="form-select">
                    <option value="<?php echo $items->cargo ?>"><?php echo $items->cargo ?></option>
                    <option value="Vendedor">Vendedor</option>
                       <option value="Bodeguero">Bodeguero</option>
                       <option value="Digitador">Digitador</option>
                       <option value="Gerente">Gerente</option>
                       <option value="Asistente">Asistente</option>
                       <option value="Contabilidad">Contabilidad</option>
                       <option value="Operaciones">Operaciones</option>
                       <option value="Administrador">Administrador</option>
                   </select>
               </div>
           </div>
           <div class="row mt-3">
               <div class="col-md-6">
                   <input type="password" name="contraseña" id="contraseña" value="<?php echo $items->contraseña ?>" placeholder="Contraseña" class="form-control" autocomplete="off">
               </div>
               <div class="col-md-6">
               <input type="password" name="repetir_constraseña" value="<?php echo $items->repetir_contraseña ?>" id="repetir_contraseña" placeholder="Repettir contraseña" class="form-control" autocomplete="off">
               </div>
           </div>
           <div class="row mt-3">
               <div class="col-md-6">
                   <select name="sucursal" id="selectSucursal" class="form-select">
                   <option value="<?php echo $items->sucursal_sede ?>"><?php echo $items->sucursal_sede ?></option>
                   <?php 
                        $sucu= new Sucursal;
                        $lista= $sucu->viewDatos();
                        foreach($lista as $item){
                       ?>
                       <option value="<?php echo $item->nombre_sede ?>"><?php echo $item->nombre_sede ?></option>
                       <?php }?>
                   </select>
               </div>
               <div class="col-md-6">
                   <select name="estado" id="estado" class="form-select">
                   <option value="<?php echo $items->estado ?>"><?php echo $items->estado ?></option>
                       <option value="Vigente">Vigente</option>
                       <option value="No Vigente">No Vigente</option>
                   </select>
                        </div>
                        </div>

        <div class="row mt-3">
            <div class="col d-flex justify-content-end">
            <button type="submit" class="btn btn-warning btn-lg" name="actualizar">Actualizar</button>
            </div>
        </div>
       </form>
        </div>
    </div>
</div>

<?php
        }
    include_once('footer.php');
?>