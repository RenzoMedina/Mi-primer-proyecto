<?php
    session_start();

    $nombre=$_SESSION['rut'];
    if($nombre === null || $nombre === ""){
         header("Location:index.html");
         echo $nombre;
       die();
    }
    include_once('cabecera.php');
?>
<?php
    if(isset($_GET['estado'])=='ok'){
?>
 <script>
    alertify.success('Los datos han sido guardados');
 </script>     
<?php }?>
<div class="contaier-fluid p-4">
    <div class="d-flex justify-content-end pb-4">
        <button type="button" data-bs-toggle="modal" data-bs-target="#nuevaSucursal" class="btn btn-info btn-lg" ><i class="bi bi-journal-plus"> Nueva</i></button>
    </div>
   <table class="table table-striped table-sm " id="tableSucursal">
        <thead class="text-center">
            <tr>
                <th>CODIGO</th>
                <th>SEDE</th>
                <th>DIRECCIÓN</th>
            </tr>
        </thead>
        <tbody class="table-group-divider text-center" id ="tbody" >
            <?php 
                include_once('./app/models/Sucursal.php');
                $lista = new Sucursal;
                $list = $lista->viewDatos();
                foreach($list as $item){
            
            ?>
                <tr>
                    <td><?php echo $item->codigo ?></td>
                    <td><?php echo $item->nombre_sede ?></td>
                    <td><?php echo $item->dirección_sede ?></td>
                </tr>
            <?php }?>
        </tbody>
   </table>
</div>

<!-------Modal del formulario---------->
<div class="modal fade " id="nuevaSucursal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="nuevaSucursallLabel" aria-hidden ="true">
    <div class="modal-dialog w-100">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registro de Sucursal</h5>
            </div>
            <form action="./app/controller/SucursalController.php" id="formSucursal" method="POST">
            <div class="modal-body">
                <div class="row pb-2">
                    <div class="col-md ">
                        <input type="text" name="nombreSede" id="" placeholder="Ejm: Sede Nombre" class="form-control"  autocomplete="off">
                    </div>
                   
                </div>
                <div class="row pb-2">
                <div class="col-md">
                        <input type="text" name="direccionSede" id="nombre" placeholder="Dirección" class="form-control" autocomplete="off">
                    </div>
                </div>
            <div class="modal-footer">
                <button id="btnSucursal" type="submit" class="btn btn-success"><i class="bi bi-plus-lg">Agregar</i></button>
                <button class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x">Cancelar</i></button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php
    include_once('footer.php');
?>