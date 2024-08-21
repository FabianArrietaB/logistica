<?php
    $idRegistro = $_POST['idRegistro'];
    include "../../Modelo/registros.php";
    $Registro = new Registro();
    echo json_encode($Registro->obtenerDatosRegistro($idRegistro));