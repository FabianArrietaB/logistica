<?php include "header.php";
        if(isset($_SESSION['usuarios']) && 
        $_SESSION['usuarios']['rol']==1){
        
        ?>


<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Registro</h1>
        <p class="lead">
            <hr>
            <div id="tablaRegistrosadminLoad"></div>       
        </p>
        

        
        </div>  
    </div>
</div>

<?php
    include "footer.php";
?>

<script src="../librerias/js/registrosadmin/registrosadmin.js"></script>

<?php
}else{
header("location:../index.html");
}
?>