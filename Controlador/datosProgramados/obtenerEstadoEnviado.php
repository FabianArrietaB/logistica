<?php
$idRegistro = $_POST['idRegistro'];

include "../../Modelo/registros.php";
$Enviado = new Registros();
echo json_encode($Enviado->obtenerEstadoEnviado($idRegistro));
