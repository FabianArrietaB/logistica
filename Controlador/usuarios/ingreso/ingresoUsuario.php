<?php
    session_start();
    $usuario = $_POST['login'];
    $password = sha1($_POST['password']);

    include "../../../Modelo/Usuarios.php";
    $Usuarios = new Usuarios();

    echo $Usuarios->IngresoUsuario($usuario, $password);
    ?>