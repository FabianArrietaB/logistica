<?php

include "../../Modelo/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$contador = 1;
$sql="SELECT 
        gastos.id_gasto AS idGasto,
        gastos.tipo_gasto AS TipoGasto,
        gastos.placa AS placa,
        gastos.cod_almacen AS almacen,
        gastos.fecha AS fecha,
        gastos.nit AS Nit,
        gastos.nombre_proveedor AS proveedor,
        gastos.prefijo AS prefijo,
        gastos.documento AS documento,
        gastos.valor_factura AS factura,
        gastos.cantidad AS cantidad
    FROM
        gastos
    ORDER BY 
        gastos.fecha DESC";
    $respuesta = mysqli_query($conexion, $sql);
?>


            <table class="table table-sm dt-responsive nowrap" id="tablaInformesDatatable" style="width:100%">
                    <thead>
                        <th>#</th>
                        <th>Tipo gasto</th>
                        <th>Placa</th>
                        <th>Almacen</th>
                        <th>Fecha</th>
                        <th>Nit</th>
                        <th>Proveedor</th>
                        <th>Prefijo</th>
                        <th>Documento</th>
                        <th>Valor factura</th>
                        <th>Cantidad</th>
                    </thead>
                <tbody>
                    <?php
                        while($mostrar = mysqli_fetch_array($respuesta)){
                    ?>
                        <tr>
                            <td><?php echo $contador++;?></td>
                            <td><?php echo $mostrar['TipoGasto'];?></td>
                            <td><?php echo $mostrar['placa'];?></td>
                            <td><?php echo $mostrar['almacen'];?></td>
                            <td><?php echo $mostrar['fecha'];?></td>
                            <td><?php echo $mostrar['Nit'];?></td>
                            <td><?php echo $mostrar['proveedor'];?></td>
                            <td><?php echo $mostrar['prefijo'];?></td>
                            <td><?php echo $mostrar['documento'];?></td>
                            <td><?php echo $mostrar['factura'];?></td>
                            <td><?php echo $mostrar['cantidad'];?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
  

<script>
    $(document).ready(function(){
        $('#tablaInformesDatatable').DataTable();
    });
</script>