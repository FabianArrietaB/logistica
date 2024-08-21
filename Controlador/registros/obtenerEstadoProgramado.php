<?php
    $idRegistro = $_POST['idRegistro'];
    include "../../Modelo/registros.php";
    $Registro = new Registros();
    echo json_encode($Registro->obtenerEstadoProgramado($idRegistro));