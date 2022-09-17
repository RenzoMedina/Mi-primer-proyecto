<?php
    include_once('cabecera.php');
    include_once('./app/models/Producto.php');
    include_once('./app/controller/PruebaController.php');

?>

<div class="contaier-fluid p-4">
<div class="row gx-2">
    <div class="col-md-6">
    <div class="card ">
    <div class="card-header">
        <p class="h4 text-center">Productos</p>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Valor</th>
                    <th>Cantidad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                session_start();
                    $producto = new Producto;
                    $lista = $producto->getProductos();

                    foreach($lista as $list){

                ?>
                  <tr>
                    <td><?php echo $list->codigo ?></td>
                    <td><?php echo $list->nombre ?></td>
                    <td>$. <?php echo $list->valor ?></td>
                    <form action="./app/controller/CarroController.php" method='POST'>
                        <input type="text" hidden name="id_prod" value ="<?php echo $list->codigo?>">
                        <input type="text" hidden name="name_prod" value ="<?php echo  $list->nombre?>">
                        <input type="text" hidden name="stock_prod" value ="<?php echo $list->cantidad?>">
                        <input type="text" hidden name="valor_prod" value ="<?php echo $list->valor?>"> 
                    <td><input type="text" name="cantidad" class="form-control form-control-sm"></td>
                    <td><button type="submit" class="btn btn-primary btn-md"><i class="bi bi-cart-plus"></i></button></td>
                    </form>
                  </tr>      
                <?php }?>
            </tbody>
        </table>

    </div>
</div>

<!------>

    </div>
    <div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Valor</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            
                if(isset($_SESSION["venta"])){
            $venta =$_SESSION["venta"];
            $total=0;
            foreach($venta as $item){ ?>
                <tr>
                    <td><?php echo $item->codigo ?></td>
                    <td><?php echo $item->nombre?></td>
                    <td><?php echo "$ ".$item->valor ?></td>
                    <td><?php echo $item->cantidad ?></td>
                    <td><?php echo "$ ". $item->total ?></td>
                    
                </tr>
                <?php  $total +=$item->total; }?>
       
                </tbody>
                <tfoot>
                    <td colspan="4">Total a Pagar</td>
                    <td><?php echo "$ ". $total?></td>
                </tfoot>
                
                <?php $_SESSION['total']= 'total'; }?>
                
            </table>
            <form action="./app/controller/VentaController.php" method="post">
                <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="col-md">
                            <input type="text" name="rut" id="" class="form-control">
                        </div>
                        <div class="col-md">
                            <input type="text" name="nombre_cliente" id="" class="form-control">
                        </div>
                    </div>
                </div>
            <div class="d-flex justify-content-end mt-2">
                <button class="btn btn-success  btn-md" type="submit"><i class="bi bi-cash-coin">&nbsp;Pagar</i></button>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

</div>


<?php
    include_once('footer.php');
?>