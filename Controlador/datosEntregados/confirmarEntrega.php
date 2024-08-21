<?php
$datos = array(
    'idRegistro' => $_POST['idRegistro'],
    'prefijo' => $_POST['prefijoupda'],
    'factura' => $_POST['facturaupda'],
    'estado' => $_POST['estadoupda'],
    'estado_entrega' => $_POST['estado_entrega'],
    'observacion' => $_POST['observacion']
);

include "../../Modelo/registros.php";
$Confirmar = new Registros();
echo $Confirmar->confirmarEntrega($datos);