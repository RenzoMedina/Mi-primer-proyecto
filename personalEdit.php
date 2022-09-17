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

?>

<div class="contaier-fluid p-4">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Registro de Personal</h3>

            <?php
                    if(isset($_GET['datos'])== 'error'){
                    
                    echo "<script> alertify.error('No dejar campos vacios')</script>";
                    } 
            ?>
        </div>
        <div class="card-body">
        <form action="./app/controller/PersonalController.php" id="formPersonal" method='POST'>
           
           <div class="row">
               <div class="col-md-6 ">
                   <input type="text" name="rut" id="" placeholder="RUT sin puntos ni guion" class="form-control"  autocomplete="off">
               </div>
               <div class="col-md-6">
                   <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" autocomplete="off">
               </div>
           </div>
           <div class="row mt-3">
               <div class="col-md-6">
                   <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control" autocomplete="off">
               </div>
               <div class="col-md-6">
                   <input type="text" name="correo" class="form-control" id="correo" placeholder="Correo" hidden>
                   <select name="cargo" id="cargo" class="form-select">
                       <option selected>--Cargo--</option>
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
                   <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" class="form-control" autocomplete="off">
               </div>
               <div class="col-md-6">
               <input type="password" name="repetir_constraseña" id="contraseña" placeholder="Repettir contraseña" class="form-control" autocomplete="off">
               </div>
           </div>
           <div class="row mt-3">
               <div class="col-md-6">
                   <select name="sucursal" id="selectSucursal" class="form-select">
                       <option selected>---Sucursal---</option>
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
                       <option selected>--Estado--</option>
                       <option value="Vigente">Vigente</option>
                       <option value="No Vigente">No Vigente</option>
                   </select>
                        </div>
                        </div>

        <div class="row mt-3">
            <div class="col d-flex justify-content-end">
            <button type="submit" class="btn btn-success btn-lg" name="agregar">Agregar</button>
            </div>
        </div>
       </form>
        </div>
    </div>
</div>

<?php
    include_once('footer.php');
?>