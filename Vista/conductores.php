<?php include "header.php";
        if(isset($_SESSION['usuarios']) && 
        $_SESSION['usuarios']['rol']==1){
        
        ?>


<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Conductores</h1>
        <p class="lead">
            <button  class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarConductor">
               Agregar conductor 
            </button>
            <hr>
            <div id="tablaConductorLoad"></div>       
        </p>
        
        </div>  
    </div>
</div>

<?php
    include "Conductores/modalEditarConductor.php";
    include "Conductores/modalAgregarConductor.php";
    include "footer.php";
?>

<script src="../librerias/js/conductores/conductores.js"></script>

<?php
}else{
header("location:../index.html");
}
?>