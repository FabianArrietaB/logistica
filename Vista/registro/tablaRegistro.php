
<?php
    session_start();
    include "../../Modelo/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $bodega = $_SESSION['usuarios']['almacen']; 
    $contador = 1;
    $sql="SELECT
                registros.id_registro AS idRegistro,
                registros.tipo_documento AS tipo_documento,
                registros.nit_vendedor AS nit_vendedor,
                registros.vendedor AS vendedor,
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
                registros.fecha_documento AS fecha_documento,
                registros.canal AS canal,
                registros.estado AS estado
            FROM
                registros 
                WHERE estado = 'registrado' AND cod_almacen = '$bodega'";
    $respuesta = mysqli_query($conexion, $sql);
?>
<table class="table table-sm  dt-responsive nowrap" id="tablaRegistroDataTable" style="width:100%">
<thead>
    <th>#</th>
    <th>Tipo_documento</th>
    <th>Cod_almacen</th>
    <th>Fecha</th>
    <th>Prefijo</th>
    <th>Factura</th>
    <th>Valor_factura</th>
    <th>Cedula</th>
    <th>Nombre</th>
    <th>Direccion</th>
    <th>Telefono</th>
    <th>Zona</th>
    <th>Fecha_documento</th>
    <th>canal</th>
    <th>Estado</th>
</thead>
    <tbody>
      <?php
        while($mostrar= mysqli_fetch_array($respuesta)){
      ?>
    <tr>
        <td><?php echo $contador++;?></td>
        <td><?php echo $mostrar['tipo_documento'];?></td>
        <td><?php echo $mostrar['almacen'];?></td>
        <td><?php echo $mostrar['fecha'];?></td>
        <td><?php echo $mostrar['prefijo'];?></td>
        <td><?php echo $mostrar['factura'];?></td>
        <td><?php echo $mostrar['valor'];?></td>
        <td><?php echo $mostrar['cedula'];?></td>
        <td><?php echo $mostrar['nombre'];?></td>
        <td><?php echo $mostrar['direccion'];?></td>
        <td><?php echo $mostrar['telefono'];?></td>
        <td><?php echo $mostrar['zona'];?></td>
        <td><?php echo $mostrar['fecha_documento'];?></td>
        <td><?php echo $mostrar['canal'];?></td>
        <td><?php echo $mostrar['estado'];?>
            <input type="hidden" id="estado">
            <button class="btn btn-warning btn-sm"
                    data-toggle="modal" data-target="#modalAgregarNuevoEstado"
                    onclick="obtenerEstadoProgramado(<?php echo $mostrar['idRegistro']?>)">
                <i class="fas fa-history"></i> 
            </button>
      </td>
    </tr>
      <?php }?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaRegistroDataTable').DataTable(
            {
                "language": {
                    "sEmptyTable":    "Ningún dato disponible en esta tabla",
                    "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "oPaginate": {
                        "sFirst":   "|<",
                        "sLast":    ">|",
                        "sNext":    ">",
                        "sPrevious": "<"
                    },
                }
            }
        );

    });
</script>
