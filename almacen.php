<?php

session_start();
$nombre=$_SESSION['rut'];
if($nombre === null || $nombre === ""){
     header("Location:index.html");
     echo $nombre;
   die();
}
    include_once('cabecera.php');
    include_once('./app/models/Proveedor.php');
    
?>

<div class="contaier-fluid p-4">
    <div class="d-flex justify-content-around">
        <button id="producto" class="btn btn-primary btn-lg">Productos</button>
        <button id="proveedor" class="btn btn-success btn-lg">Proveedor</button>
    </div>
    <div class="container-fluid mt-3">
       <div class="row g-5">
       <div class="w-50" id="producto-div">
       <form action="./app/controller/ProductoController.php" method="post" class="form-producto">
            <div class="border-top">
                <div class="card-body">
                    <p class="text-center h3">Registro de Productos</p>
                    <?php 
                    if(isset($_GET['producto'])=='ok'){
                        echo "<script> alertify.success('Se agregado el nuevo producto')</script>";
                    }
                ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Código</label>
                                    <input type="text" class="form-control" name="codigo">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Fecha de Ingreso</label>
                                    <input type="text" class="form-control text-secondary" name="fecIngreso" id="fecIngreso" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Descripción</label>
                                    <input type="text" class="form-control" name="nombre_producto">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Cantidad</label>
                                    <input type="text" class="form-control" name="cantidad">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Proveedor</label>
                                    <select name="proveedor" id="" class="form-select">
                                        <option selected>--Proveedor--</option>
                                     <?php
                                        $proveedor= new Proveedor;
                                        $proveedorList= $proveedor->viewDatos();
                                        foreach($proveedorList as $item){
                                     ?>
                                    <option value="<?php echo $item->nombre_proveedor ?>"><?php echo $item->nombre_proveedor ?></option>
                                     
                                     <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Precio Costo</label>
                                    <input type="text" class="form-control" name="precioCosto">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Precio Venta</label>
                                    <input type="text" class="form-control" name="precioVenta">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Categoria</label>
                                    <select name="categoria" id="" class="form-select">
                                        <option selected >---Seleccione---</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                        <option value="Infantil">Infantil</option>
                                        <option value="Deportes">Deportes</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="btnProducto" class="btn btn-warning btn-lg"><i class="bi bi-box">&nbsp;Agregar</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
       </div>
        <div class="w-50 " id="proveedor-div">
        <form action="./app/controller/ProveedorController.php" method="post" class="form-proveedor">
            <div class="border-top">
                <div class="card-body">
                <p class="text-center h3">Registro de Proveedor</p>
                <?php 
                    if(isset($_GET['proveedor'])=='ok'){
                        echo "<script> alertify.success('Se agregaron el nuevo prooveedor')</script>";
                    }
                ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">RUT</label>
                                <input type="text" class="form-control" name="rut" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="nombre_proveedor" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Dirección</label>
                                <input type="text" class="form-control" name="direccion">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="btnProveedor" class="btn btn-warning btn-lg"><i class="bi bi-shop-window">&nbsp;Agregar</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
        </div>
       </div>
    </div>
</div>
<script>
    const fecIngreso = document.getElementById('fecIngreso')
    
    var fecha = new Date()
    var dia=fecha.getDate()
    var mes=fecha.getMonth()+1
    var año=fecha.getFullYear()
    fecIngreso.value=dia+"-"+mes+"-"+año

    const producto = document.getElementById('producto')
    const productoDiv = document.getElementById('producto-div')
    producto.addEventListener('click', ()=>{
        productoDiv.classList.toggle('producto-active')
    }) 

    const proveedor = document.getElementById('proveedor')
    const proveedorDiv = document.getElementById('proveedor-div')
    proveedor.addEventListener('click', ()=>{
        proveedorDiv.classList.toggle('proveedor-active')
    }) 

</script>

<?php
    include_once('footer.php');
?>