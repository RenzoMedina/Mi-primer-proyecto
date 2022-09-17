<?php
    
    include_once('cabecera.php');
    include_once('./app/models/Producto.php');
    include_once('./app/controller/PruebaController.php');

?>

<div class="contaier-fluid p-4">
<div class="d-flex justify-content-center">
    <div class="card w-75">
        <div class="card-header">
            <p class="h4 text-center">DETALLE</p>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Valor</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        session_start();
                        $total=0;
                        $venta= $_SESSION['venta'];
                        foreach($venta as $list){                  
                    ?>
                        <tr>
                            <td><?php echo $list->codigo ?></td>
                            <td><?php echo $list->nombre ?></td>
                            <td><?php echo $list->cantidad ?></td>
                            <td><?php echo "$. ".substr($list->valor,0,2).".".substr($list->valor,-3) ?></td>
                            <td><?php echo "$. ".substr($list->total,0,-3).".".substr($list->total,-3) ?></td>
                            <?php  $total +=$list->total; ?>
                        </tr>
                        
                    <?php }?>
                    
                </tbody>
                <tfoot>
                    <td colspan="4" class="text-end">Total a Pagar</td>
                    <td><?php echo "$. ".substr($total,0,-3).".". substr($total,-3)?></td>
                </tfoot>
            </table>
            <div class="d-flex justify-content-center">
                <div class="row gx-5">
                    <div class="col-md-6">
                    <button class="btn btn-primary btn-lg"><i class="bi bi-pass"><a href="./app/reports/VentaPdf.php" class="nav-link" target="_blank">Ticket</a></i></button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger btn-lg"><i class="bi bi-basket2"><a href="./app/controller/VentaExit.php" class="nav-link">Nueva</a></i></button>
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