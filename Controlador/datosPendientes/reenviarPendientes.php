<?php
$idRegistro = $_POST['idRegistro'];

include "../../Modelo/registros.php";
$Registro = new Registros();
echo $Registro->reenviarDocumentos($idRegistro);