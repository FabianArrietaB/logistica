<?php

    $datos = array(
        'idConductor' => $_POST['idConductor'],
        'nombre_conductor' => $_POST['nombre_conductoru'],
        'apellido' => $_POST['apellidou'],
        'cedula' => $_POST['cedulau'],
        'celular' => $_POST['celularu'],
        'rol' => $_POST['id_rolu']
    );

    include "../../Modelo/conductores.php";
    $Conductores = new Conductores();
    echo $Conductores->editarConductor($datos);