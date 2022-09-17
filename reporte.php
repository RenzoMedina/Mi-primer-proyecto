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

<div class="container-fluid w-75 p-4">
    <p class="h2 mb-4">Reporte</p>
<div class="card">
    <div class="card-body">
    <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed h4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Personal
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="row g-3">
          <div class="col">
          <p class="text-secondary">Puede descargar los reportes en los siguientes formatos</p>
          <a href="./app/reports/PersonaExcel.php" class="btn btn-success btn-lg"><i class="bi bi-filetype-xls">&nbsp;Excel</i></a>
          <a href="./app/reports/PersonaPdf.php" target="_blank" class="btn btn-danger btn-lg mr-1"><i class="bi bi-file-pdf">&nbsp;Pdf</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed h4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Proveedor
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="row g-3">
          <div class="col">
          <p class="text-secondary">Puede descargar los reportes en los siguientes formatos</p>
          <a href="./app/reports/ProveedorExcel.php" class="btn btn-success btn-lg"><i class="bi bi-filetype-xls">&nbsp;Excel</i></a>
          <a href="./app/reports/ProveedorPdf.php" target="_blank" class="btn btn-danger btn-lg mr-1"><i class="bi bi-file-pdf">&nbsp;Pdf</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed h4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Productos
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"><div class="row g-3">
          <div class="col">
          <p class="text-secondary">Puede descargar los reportes en los siguientes formatos</p>
          <a href="./app/reports/ProductosExcel.php" class="btn btn-success btn-lg"><i class="bi bi-filetype-xls">&nbsp;Excel</i></a>
          <a href="./app/reports/ProductosPdf.php" target="_blank" class="btn btn-danger btn-lg mr-1"><i class="bi bi-file-pdf">&nbsp;Pdf</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
      <button class="accordion-button collapsed h4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
        Sucursal
      </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="row g-3">
          <div class="col">
          <p class="text-secondary">Puede descargar los reportes en los siguientes formatos</p>
          <a href="./app/reports/SucursalExcel.php" class="btn btn-success btn-lg"><i class="bi bi-filetype-xls">&nbsp;Excel</i></a>
          <a href="./app/reports/SucursalPdf.php" target="_blank" class="btn btn-danger btn-lg mr-1"><i class="bi bi-file-pdf">&nbsp;Pdf</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFive">
      <button class="accordion-button collapsed h4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
        Ventas
      </button>
    </h2>
    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <div class="row g-3">
          <div class="col">
          <p class="text-secondary">Descargar en el siguiente formato</p>
          <a href="./app/reports/VentaExcel.php" class="btn btn-success btn-lg"><i class="bi bi-filetype-xls">&nbsp;Excel</i></a>
          </div>
        </div>   
    </div>
    </div>
  </div>
</div>
    </div>
</div>

</div>

<script>
   
</script>

<?php
    include_once('footer.php');
?>