<?php
$idRegistro = $_POST['idRegistro'];

include "../../Modelo/registros.php";
$Entregado = new Registros();
echo json_encode($Entregado->obtenerEstadoEntregado($idRegistro));