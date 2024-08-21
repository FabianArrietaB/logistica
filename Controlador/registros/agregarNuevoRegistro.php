<?php
    $datos = array(
        "tipo_documento" =>$_POST['tipo_documento'],
        "nit_vendedor" =>$_POST['nit_vendedor'],
        "vendedor" =>$_POST['vendedor'],
        "almacen" => $_POST['almacen'],
        "fecha" => $_POST['fecha'],
        "prefijo" => $_POST['prefijo'],
        "factura" => $_POST['factura'],
        "valor" => $_POST['valor'],
        "cedula" => $_POST['cedula'],
        "nombre" => $_POST['nombre'],
        "direccion" => $_POST['direccion'],
        "telefono" => $_POST['telefono'],
        "zona" => $_POST['zona'],
        "fecha_documento" => $_POST['fecha_documento'],
        "canal" => $_POST['canal'],
        "peso" => $_POST['peso'],
        "estado"=>"registrado"
    );
    include "../../Modelo/registros.php";
    $Registros = new Registros();

    //echo '111'.json_encode($Registros->consultarDocumentoExistente($_POST['prefijo'],$_POST['factura']));

     if($Registros->consultarDocumentoExistente($_POST['prefijo'],$_POST['factura'])){
        echo 2;
    }else{
       

                echo $Registros->agregarNuevoRegistro($datos); 
    }


   
    
