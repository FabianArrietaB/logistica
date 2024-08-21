<?php
    include "../../Modelo/registros.php";
    $Registro = new Registros();
    $tipodocumento = $_GET['tipodocumento'];
    $codalmacen    = $_GET['codalmacen'];
    $prefijo       = $_GET['prefijo'];
    $factura       = $_GET['factura'];
    echo json_encode($Registro->datos_traslado($tipodocumento, $codalmacen, $prefijo, $factura));
?>