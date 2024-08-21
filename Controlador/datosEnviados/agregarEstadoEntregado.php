<?php
$datos = array(
    'idRegistro' => $_POST['idRegistro'],
    'prefijo' => $_POST['prefijoupd'],
    'factura' => $_POST['facturaupd'],
    'estado' => $_POST['estadoupd'],
    'estado_entrega' => $_POST['estado_entrega'],
    'observacion' => $_POST['observacion']
);

include "../../Modelo/registros.php";
$Entregado = new Registros();
echo $Entregado->agregarEstadoEntregado($datos);
