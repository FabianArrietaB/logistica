<?php include "header.php";
        if(isset($_SESSION['usuarios']) && 
        $_SESSION['usuarios']['rol']==1){
        
        ?>


<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Registros Entregados</h1>
        <p class="lead">

        <h4>consultar Bonificaciones</h4>
        <div class="row">

            <div class="col-sm-2">
                    <label for="bodega">tipo de bodega</label>
                    <select name="bodega" id="bodega" class="form-control">
                        <option value="0001">0001</option>
                        <option value="0018">0018</option>
                        <option value="0016">0016</option>
                        <option value="0019">0019</option>
                    </select> 
            </div>

            <div class="col-sm-2">
                    <label for="tipo_conductor">tipo de conductor</label>
                    <select name="tipo_conductor" id="tipo_conductor" class="form-control">
                        <option value="conductor">conductor</option>
                        <option value="ayudante">ayudante</option>
                        <option value="externo">externo</option>
                    </select> 
            </div>
            
            <div class="col-sm-2">
                <label for="desde">desde</label>
                <input type="date" class="form-control"id="desde" value="<?php echo date('Y-m-d');?>">
            </div>
            
            <div class="col-sm-2">
                <label for="hasta">hasta</label>
                <input type="date" class="form-control" id="hasta" value="<?php echo date('Y-m-d');?>">
            </div>

            
        </div>

        <div class="row">
            <div class="col-sm-4">
                <button onclick="bonificacionpdf()" 
                    class="btn btn-danger btn-sm mt-3">Consultarpdf                    
                </button>

                <button onclick="detallado()" 
                    class="btn btn-danger btn-sm mt-3">detallado                    
                </button>
            </div>
        </div>


         
        <hr>

            <div id="tablaEntregarRegistrosadminLoad"></div>
    
        </p>
        </div>
    </div>
</div>

<?php
    include "footer.php";
?>    
<script src="../librerias/js/registrosEntregadosadmin/registrosEntregadosadmin.js"></script>
<?php
}else{
header("location:../index.html");
}
?>