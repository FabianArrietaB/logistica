<?php
session_start();
    include "../../Modelo/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $bodega = $_SESSION['usuarios']['almacen'];
    $contador = 1;
    $sql="SELECT
            
                registros.id_registro AS idRegistro,
                registros.cod_almacen AS almacen,
                conductores.nombre_conductor AS nombre_conductor,
                registros.id_ayudante AS id_ayudante,
                ayudantes.nombre_conductor AS nombre_ayudante,
                zona2.nombre_zona AS nombre_zona,
                carga.clasificacion AS clasificacion,
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
                registros AS registros
                    INNER JOIN
                conductores AS conductores ON registros.id_conductor = conductores.id_conductor
                    LEFT JOIN
                conductores AS ayudantes ON registros.id_ayudante = ayudantes.id_conductor
                    INNER JOIN
                zona2 AS zona2 ON registros.id_zona = zona2.id_zona
                    INNER JOIN
                carga AS carga ON registros.id_carga = carga.id_carga
                    WHERE estado ='enviado' AND consecutivo > 0 AND  registros.cod_almacen ='$bodega'";
    $respuesta = mysqli_query($conexion, $sql);
?>
<table class="table table-sm  dt-responsive nowrap" id="tablaEnviarRegistroDataTable" style="width:100%">
<thead>
    <th>#</th>
    <th>cod_almacen</th>
    <th>Fecha</th>
    <th>Conductor</th>
    <th>Ayudante</th>
    <th>Zona_D</th>
    <th>clasificacion</th>
    <th>Prefijo</th>
    <th>Factura</th>
    <th>Valor_factura</th>
    <th>Cedula</th>
    <th>Nombre</th>
    <th>Direccion</th>
    <th>Telefono</th>
    <th>Zona</th>
    <th>Fecha_despacho</th>
    <th>canal</th>
    <th>Estado</th>
</thead>
    <tbody>
        <?php
        while($mostrar= mysqli_fetch_array($respuesta)){
        ?>
    <tr>
        <td><?php echo $contador++;?></td>
        <td><?php echo $mostrar['almacen'];?></td>
        <td><?php echo $mostrar['fecha'];?></td>
        <td><?php echo $mostrar['nombre_conductor'];?></td>
        <td><?php echo $mostrar['nombre_ayudante'];?></td>
        <td><?php echo $mostrar['nombre_zona'];?></td>
        <td><?php echo $mostrar['clasificacion'];?></td>
        <td><?php echo $mostrar['prefijo'];?></td>
        <td><?php echo $mostrar['factura'];?></td>
        <td><?php echo $mostrar['valor'];?></td>
        <td><?php echo $mostrar['cedula'];?></td>
        <td><?php echo $mostrar['nombre'];?></td>
        <td><?php echo $mostrar['direccion'];?></td>
        <td><?php echo $mostrar['telefono'];?></td>
        <td><?php echo $mostrar['zona'];?></td>
        <td><?php echo $mostrar['fechad'];?></td>
        <td><?php echo $mostrar['canal'];?></td>
        <td><?php echo $mostrar['estado'];?>
            <button class="btn btn-warning btn-sm"
                    data-toggle="modal" data-target="#modalAgregarEstadoEntregado"
                    onclick="obtenerEstadoEntregado(<?php echo $mostrar['idRegistro']?>)">
                <i class="fas fa-history"></i> 
            </button>
        </td>
    </tr>
        <?php }?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaEnviarRegistroDataTable').DataTable();
    });
</script>