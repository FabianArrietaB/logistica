<form id="frmEnviarRegistro"  method="post" onsubmit="return agregarEstadoEnviado()">
<div class="modal fade" id="modalAgregarEstadoEnviado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar estado de registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <div class="row">
          <div class="col-sm-6">
              <label >Conductor</label>
              <?php
                  $bodega_almacen = $_SESSION['usuarios']['almacen'];
                  $sql="SELECT
                          conductores.id_conductor,
                          conductores.nombre_conductor AS nombre_conductor,
                          conductores.cod_almacen AS almacen
                          
                        FROM 
                          conductores
                              INNER JOIN
                          roles AS roles ON conductores.id_rol = roles.id_rol
                                WHERE nombre_rol  IN ('conductor','externo') AND cod_almacen = '$bodega_almacen'";
                  $respuesta = mysqli_query($conexion, $sql);
              ?>
              <select name="idConductor" id="idConductor" class="form-control" required>
                <option value="">Asignar conductor</option>
                <?php while($mostrar = mysqli_fetch_array($respuesta)){ ?>
                  <option value="<?php echo $mostrar['id_conductor'];?>"><?php echo $mostrar['nombre_conductor'];?></option>
                <?php } ?>
              </select>
          </div>

          <div class="col-sm-6">
              <label >Ayudante</label>
              <?php
                    $bodega_almacen = $_SESSION['usuarios']['almacen'];
                  $sql="SELECT
                          conductores.id_conductor,
                          conductores.nombre_conductor AS nombre_conductor,
                          conductores.cod_almacen AS almacen
                  
                        FROM 
                          conductores
                              INNER JOIN
                          roles AS roles ON conductores.id_rol = roles.id_rol
                                WHERE nombre_rol = 'ayudante' AND cod_almacen = '$bodega_almacen'";
                  $respuesta = mysqli_query($conexion, $sql);
              ?>
              <select name="idAyudante" id="idAyudande" class="form-control">
                <option value="">Asignar ayudante</option>
                <?php while($mostrar = mysqli_fetch_array($respuesta)){ ?>
                  <option value="<?php echo $mostrar['id_conductor'];?>"><?php echo $mostrar['nombre_conductor'];?></option>
                <?php } ?>
              </select>
          </div>

          <div class="col-sm-6">
              <label >Zona</label>
              <?php
                  $sql="SELECT
                            zona2.id_zona,
                            zona2.nombre_zona AS nombre_zona,
                            zona2.cod_almacen AS almacen
                        FROM 
                          zona2 ";
                  if ($bodega_almacen == '0001') { 
                    $sql .= "WHERE cod_almacen = '$bodega_almacen'";
                  } else { 
                    $sql .= "WHERE cod_almacen != '0001'";
                  }
                  $respuesta = mysqli_query($conexion, $sql);
              ?>
              <select name="idZona" id="idZona" class="form-control" required>
                <option value="">Asignar zona</option>
                <?php while($mostrar = mysqli_fetch_array($respuesta)){ ?>
                  <option value="<?php echo $mostrar['id_zona'];?>"><?php echo $mostrar['nombre_zona'];?></option>
                <?php } ?>
              </select>
          </div>

          <div class="col-sm-6">
              <label >Clasificacion</label>
              <?php
                  $sql="SELECT  
                          carga.id_carga,
                          carga.clasificacion AS clasificacion,
                          carga.cod_almacen AS almacen
                        FROM
                          carga ";

                  if ($bodega_almacen == '0001') { 
                    $sql .= "WHERE cod_almacen = '$bodega_almacen'";
                  } else { 
                    $sql .= "WHERE cod_almacen != '0001'";
                  }
                  $respuesta = mysqli_query($conexion, $sql);
              ?>
              <select name="idCarga" id="idCarga" class="form-control" required>
                <option value="">Asignar clasificacion</option>
                <?php while($mostrar = mysqli_fetch_array($respuesta)){ ?>
                  <option value="<?php echo $mostrar['id_carga'];?>"><?php echo $mostrar['clasificacion'];?></option>
                <?php } ?>
              </select>
          </div>

          <div class="col-sm-6">
              <label for="fechad">Fecha_despacho</label>
              <input id="fechad" name="fechad" type="date" class="form-control" required>
          </div>
      </div>

      <div class="row">
        <input type="text" id="idRegistro" name="idRegistro" hidden>
          <div class="col-sm-4">
              <label for="prefijoup">Prefijo</label>
              <input id="prefijoup" name="prefijoup" type="text" class="form-control" readonly>
          </div>
          <div class="col-sm-4">
              <label for="facturaup">Factura</label>
              <input id="facturaup" name="facturaup" type="text" class="form-control" readonly>
          </div>

          <div class="col-sm-4">
              <label for="estadoup">Estado</label>
              <input id="estadoup" name="estadoup" type="text" class="form-control" value="enviado" readonly>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" >Enviar</button>
      </div>
    </div>
  </div>
</div>

</form>