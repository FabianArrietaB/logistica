<?php

include "../../Modelo/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$contador = 1;
$sql="SELECT
  tipo_documento,
  estado,
  COUNT(*) as registros
FROM registros
GROUP BY tipo_documento, estado;";
    $respuesta = mysqli_query($conexion, $sql);
?>


            <table class="table table-sm dt-responsive nowrap" id="tablatotalregistrosDatatable" style="width:100%">
                    <thead>
                        <th>#</th>
                        <th>TIPO DOCUMENTO</th>
                        <th>NUMERO REGISTROS</th>
                        <th>ESTADO</th>
                    </thead>
                <tbody>
                    <?php
                        while($mostrar = mysqli_fetch_array($respuesta)){
                    ?>
                        <tr>
                            <td><?php echo $contador++;?></td>
                            <td><?php echo $mostrar['tipo_documento'];?></td>
                            <td><?php echo $mostrar['registros'];?></td>
                            <?php if($mostrar['estado'] === 'programado') {?>
                                <td style="color: orange"><?php echo $mostrar['estado'];?></td>
                            <?php } else if($mostrar['estado'] === 'enviado'){ ?>
                                <td style="color: blue"><?php echo $mostrar['estado'];?></td>
                            <?php } else { ?>
                                <td style="color: green"><?php echo $mostrar['estado'];?></td>
                            <?php } ?>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
  

<script>
    $(document).ready(function(){
        $('#tablatotalregistrosDatatable').DataTable();
    });
</script>