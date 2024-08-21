<?php
    $datos = array(
        'idRegistro' => $_POST['idRegistro'],
        'idConductor' => $_POST['idConductor'],
        'idAyudante' => $_POST['idAyudante'],
        'fechad' => $_POST['fechad'],
        'idZona' => $_POST['idZona'],
        'idCarga' => $_POST['idCarga'],
        'prefijo' => $_POST['prefijoup'],
        'factura' => $_POST['facturaup'],
        'estado'=> $_POST['estadoup']
        
    );

    include "../../Modelo/registros.php";
    $Enviado = new Registros();
    echo $Enviado->agregarEstadoEnviado($datos); 