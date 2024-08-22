<?php 
    include "header.php";
    if(isset($_SESSION['usuarios']) &&
    $_SESSION['usuarios']['rol']==1||
    $_SESSION['usuarios']['rol']==2){
?>
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5 text-center">
                <h1 class="fw-light">ESTADISTICAS</h1>
                <div id="tablaRegistros"></div>

            </div>
        </div>
    </div>

<?php
    include "footer.php";
?>

<script src="../librerias/js/inicio.js"></script>


<?php
}else{
header("location:../index.html");
}
?>