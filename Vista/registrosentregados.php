<?php include "header.php";
        if(isset($_SESSION['usuarios']) && 
        $_SESSION['usuarios']['rol']==1||
        $_SESSION['usuarios']['rol']==2){
        
        ?>


<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Entregados</h1>
        <p class="lead">

         
        <hr>

            <div id="tablaEntregarRegistroLoad"></div>
    
        </p>
        </div>
    </div>
</div>

<?php
    include "entregados/modalConfirmarEntrega.php";
    include "footer.php";
?>    
<script src="../librerias/js/registrosEntregados/registrosEntregados.js"></script>
<?php
}else{
header("location:../index.html");
}
?>