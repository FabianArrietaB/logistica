<?php include "header.php";
        if(isset($_SESSION['usuarios']) && 
        $_SESSION['usuarios']['rol']==1||
        $_SESSION['usuarios']['rol']==2){
        
        ?>


<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Registros enviados</h1>
        <p class="lead">
        <div class="row">
        <div class="col-sm-3">
                <label for="desde">desde</label>
                <input type="date" class="form-control"id="desde" value="<?php echo date('Y-m-d');?>">
            </div>
            
            <div class="col-sm-3">
                <label for="hasta">hasta</label>
                <input type="date" class="form-control" id="hasta" value="<?php echo date('Y-m-d');?>">
            </div>

            

            <div class="col-sm-3 py-4">
            
                <button onclick="reportepdf()" 
                    class="btn btn-danger btn-sm">Consultarpdf                    
                </button>
            </div>
            
        </div>
        
        <hr>

            <div id="tablaEnviarRegistroLoad"></div>
    
            </p>
        </div>
    </div>
</div>


<?php
    include "enviados/modalAgregarEstadoEntregado.php";
    include "footer.php";
?>    
<script src="../librerias/js/registrosEnviados/registrosEnviados.js"></script>
<?php
}else{
header("location:../index.html");
}
?>