<?php include "header.php";
        if(isset($_SESSION['usuarios']) && 
        $_SESSION['usuarios']['rol']==1||
        $_SESSION['usuarios']['rol']==2){
        
        ?>


<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Registros pendientes</h1>
        <p class="lead">
        <div class="row">
        
            

            
        </div>
        
        <hr>

            <div id="tablaEnviarPendientesLoad"></div>
    
            </p>
        </div>
    </div>
</div>


<?php
    include "pendientes/modalEnviarPendientes.php";
    include "footer.php";
?>    
<script src="../librerias/js/pendientes/pendientes.js"></script>
<?php
}else{
header("location:../index.html");
}
?>