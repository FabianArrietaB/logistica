<?php include "header.php";
        if(isset($_SESSION['usuarios']) && 
        $_SESSION['usuarios']['rol']==1){
?>

<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Informes</h1>
        <p class="lead">
            <div class="row">
            <div class="col-md-3">
                    <label for="bodega">tipo de bodega</label>
                    <select name="bodega" id="bodega" class="form-control">
                        <option value="0001">0001</option>
                        <option value="0018">0018</option>
                        <option value="0016">0016</option>
                        <option value="0019">0019</option>
                    </select> 
            </div>
            
                <div class="col-md-3">
                        <label for="desde">desde</label>
                        <input type="date" class="form-control"id="desde" value="<?php echo date('Y-m-d');?>">
                    </div>

                    <div class="col-md-3">
                        <label for="hasta">hasta</label>
                        <input type="date" class="form-control" id="hasta" value="<?php echo date('Y-m-d');?>">
                    </div>
            </div>

            <div class="row">
                    <div class="col-md-3 py-4">
                        <button onclick="datos_informe()" type="button" 
                            class="btn btn-danger btn-sm">Consultar                   
                        </button>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-3 py-4">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInforme">
                            agregar informe
                    </button>
                </div>
            </div>
            <hr>
            <div id="tablaInformesLoad"></div>       
        </p>
        

        
        </div>  
    </div>
</div>

<?php
    include "informes/modalAgregarInforme.php";
    include "informes/modalProveedores.php";
    include "footer.php";
?>

<script src="../librerias/js/informes/informes.js?v=<?=rand()?>"></script>

<?php
}else{
header("location:../index.html");
}
?>