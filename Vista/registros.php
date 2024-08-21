<?php include "header.php";
        if(isset($_SESSION['usuarios']) && 
        $_SESSION['usuarios']['rol'] == 1 ||
        $_SESSION['usuarios']['rol'] == 2){
        
        ?>


<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Registro</h1>
        <p class="lead">
            <button id="off"  class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRegistro">
                Agregar registro
            </button>
            <hr>
            <div id="tablaRegistroLoad"></div>
        </p>
        </div>
    </div>
</div>

<?php
    include "registro/modalProgramarRegistro.php";
    include "registro/modalRegistro.php";
    include "footer.php";
?>

<script src="../librerias/js/registros/registro.js"></script>

<?php
}else{
header("location:../index.html");
}
?>