<?php
    session_start();
    include "../../Modelo/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $bodega = $_SESSION['usuarios'] ['almacen'];
    $sql="SELECT
                registros.id_registro AS idRegistro,
                registros.cod_almacen AS almacen,
                registros.fecha AS fecha,
                registros.prefijo AS prefijo,
                registros.factura AS factura,
                registros.valor_factura AS valor,
                registros.cedula AS cedula,
                registros.nombre AS nombre,
                registros.direccion AS direccion,
                registros.telefono AS telefono,
                registros.zona AS zona,
                registros.fecha_despacho AS fechad,
                registros.canal AS canal,
                registros.estado AS estado
            FROM
                registros 
                WHERE estado = 'registrado'";
    $respuesta = mysqli_query($conexion, $sql);
    $lista = array();
    while($mostrar= mysqli_fetch_array($respuesta)){
        
        array_push($lista, $mostrar);
    }
    echo json_encode($lista); 
?>



    
