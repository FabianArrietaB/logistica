<?php

include "../../Modelo/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$contador = 1;
$sql="SELECT
    tipo_documento,
        COUNT(*) as registros,
        CASE WHEN tipo_documento = 'factura' THEN 'FACTURA' ELSE 0 END facturas,
        (select count(*) from registros re where estado = 'enviado' and r.tipo_documento = re.tipo_documento) as enviados,
        (select count(*) from registros rp where estado = 'programado' and r.tipo_documento = rp.tipo_documento) as programados,
        (select count(*) from registros ren where estado = 'entregado' and r.tipo_documento = ren.tipo_documento) as entregados,
        (select count(*) from registros rer where estado = 'registrado' and r.tipo_documento = rer.tipo_documento) as registrados
    FROM registros r
    group by tipo_documento";
$respuesta = mysqli_query($conexion, $sql);
?>
<div class="card border-primary">
            <div class="card-header text-center">
                <div class="title">
                    <h2>INFORMACION POR SEDE</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row student text-center">
                    <?php
                        while($mostrar= mysqli_fetch_array($respuesta)){
                    ?>
                    <div class="col-3">
                        <div class="list-group">
                            <li class="list-group-item list-group-item-action active"><?= $mostrar['tipo_documento'] . ' - ' . $mostrar['registros'] ?></li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">REGISTRADOS</div>
                                </div>
                                <h5><span class="badge bg-info rounded-pill">
                                    <?php echo $mostrar['registrados']; ?>
                                </span></h5>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">PROGRAMADOS</div>
                                </div>
                                <h5><span class="badge bg-warning rounded-pill">
                                    <?php echo $mostrar['programados']; ?>
                                </span></h5>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">ENVIADOS</div>
                                </div>
                                <h5><span class="badge bg-danger rounded-pill">
                                    <?php echo $mostrar['enviados']; ?>
                                </span></h5>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">ENTREGADOS</div>
                                </div>
                                <h5><span class="badge bg-success rounded-pill">
                                    <?php echo $mostrar['entregados']; ?>
                                </span></h5>
                            </li>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
<script>
    $(document).ready(function(){
        $('#tablatotalregistrosDatatable').DataTable();
    });
</script>