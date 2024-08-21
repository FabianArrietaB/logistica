<?php include "header.php";
        if(isset($_SESSION['usuarios']) && 
        $_SESSION['usuarios']['rol']==1||
        $_SESSION['usuarios']['rol']==2){
            include "../Modelo/Conexion.php";   
            $con = new Conexion();
            $conexion = $con->conectar(); 
        
        ?>


<div class="container">
    <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
        <h1 class="fw-light">Registros programados</h1>
        <p class="lead">

         
        <hr>

            <div id="tablaProgramarRegistroLoad"></div>
    
        </p>
        </div>
    </div>
</div>

<?php
    include "programados/modalEnviarRegistro.php";
    include "footer.php";
?>    
<script src="../librerias/js/registrosProgramados/registrosProgramados.js"></script>
<?php
}else{
header("location:../index.html");
}
?>