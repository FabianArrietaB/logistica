<?php
$idConductor = $_POST['idConductor'];

include "../../Modelo/conductores.php";
$Conductor = new Conductores();

echo json_encode($Conductor->obtenerDatosConductor($idConductor));