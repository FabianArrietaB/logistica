<?php

$datos = array(
    "almacen" => $_POST['almacen'],
    "nombre_conductor" => $_POST['nombre_conductor'],
    "apellido" => $_POST['apellido'],
    "cedula" => $_POST['cedula'],
    "celular" => $_POST['celular'],
    "rol" => $_POST['rol']
);

include "../../Modelo/conductores.php";
$Condutores = new Conductores();

echo $Condutores->agregarNuevoConductor($datos);