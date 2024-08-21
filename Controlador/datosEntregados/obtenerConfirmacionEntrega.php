<?php
$idRegistro = $_POST['idRegistro'];

include "../../Modelo/registros.php";
$Confirmar = new Registros();
echo json_encode($Confirmar->obtenerConfirmacionEntrega($idRegistro));