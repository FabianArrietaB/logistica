<?php
include "../../Modelo/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql="SELECT  
	conductores.id_conductor AS idConductor,
    conductores.cod_almacen AS almacen,
	conductores.nombre_conductor AS nombre_conductor,
	conductores.apellido AS apellido,
	conductores.cedula AS cedula,
	conductores.celular AS celular,
	conductores.id_rol AS rol_conductor,
	roles.nombre_rol AS rol
	
FROM
	conductores AS conductores
		INNER JOIN
	roles AS roles ON conductores.id_rol = roles.id_rol
        ORDER BY conductores.id_conductor DESC";
    $respuesta = mysqli_query($conexion, $sql);
?>
<table class="table table-sm" id="tablaConductoresDataTable">
    <thead>
        <th>Cod_almacen</th>
        <th>nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Celular</th>
        <th>Cargo</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php
            while($mostrar = mysqli_fetch_array($respuesta)){  
        ?>
        <tr>
            <td><?php echo $mostrar['almacen'];?></td>
            <td><?php echo $mostrar['nombre_conductor'];?></td>
            <td><?php echo $mostrar['apellido'];?></td>
            <td><?php echo $mostrar['cedula'];?></td>
            <td><?php echo $mostrar['celular'];?></td>
            <td><?php echo $mostrar['rol'];?></td>
            <td>
                <button class="btn btn-warning btn-sm" 
                data-toggle="modal" data-target="#modalEditarConductor"
                onclick="obtenerDatosConductor(<?php echo $mostrar['idConductor']?>)">
                <i class="fas fa-edit"></i>
                </button>
            </td>
            <td>
            <button class="btn btn-danger btn-sm">
        <i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
       $('#tablaConductoresDataTable').DataTable(); 
    });
</script>