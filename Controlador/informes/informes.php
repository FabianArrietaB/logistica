<?php

    $datos= array(
        'gasto' => $_POST['gasto'],
        'placa' => $_POST['placa'],
        'almacen' => $_POST['almacen'],
        'fecha' => $_POST['fecha'],
        'nit_proveedor' => $_POST['nit_proveedor'],
        'nombre_proveedor' => $_POST['nombre_proveedor'],
        'prefijo' => $_POST['prefijo'],
        'num_documento' => $_POST['num_documento'],
        'valor_factura' => $_POST['valor_factura'],
        'cantidad' => $_POST['cantidad']);

    include "../../Modelo/informes.php";
    $informes = new informes();

    echo $informes->Agregarinformes($datos);