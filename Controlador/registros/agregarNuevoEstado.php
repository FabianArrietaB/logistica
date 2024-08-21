<?php
    $datos = array(
        'idRegistro' =>$_POST['idRegistro'],
        'prefijo' => $_POST['prefijou'],
        'factura' => $_POST['facturau'],
        'estado'=>$_POST['estadou']
        
    );

    include "../../Modelo/registros.php";
    $Programado = new Registros();
    echo $Programado->agregarNuevoEstado($datos); 