<form id="frmAgregarRelacion" method="post"  onsubmit="return agregarRelacion()">
    
<!-- Modal -->
<div class="modal fade" id="modalRelacionDocumento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
             
              <select name="idConductor" id="idConductor" class="form-control" required>
                <option value="">Asignar conductor</option>
               
                  <option value="">
                  </option>
            
              </select>
          </div>

          <div class="col-sm-6">
              <label >Ayudante</label>
             
              <select name="idAyudante" id="idAyudande" class="form-control" required>
                <option value="">Asignar ayudante</option>
                
                  <option value="">
                </option>
                
              </select>
          </div>

          <div class="col-sm-6">
              <label >Zona</label>
              
                 
              <select name="idZona" id="idZona" class="form-control" required>
                <option value="">Asignar zona</option>
                
                  <option value=""></option>
                
              </select>
          </div>

          <div class="col-sm-6">
              <label >Clasificacion</label>
              
              <select name="idCarga" id="idCarga" class="form-control" required>
                <option value="">Asignar clasificacion</option>
            
                  <option value=""></option>
                
              </select>
          </div>
      </div>

      <div class="row">
                <input type="text" id="idRegistro" name="idRegistro" hidden>
                <div class="col-sm-6">
                    <label for="prefijoup">Prefijo</label>
                    <input id="prefijoup" name="prefijoup" type="text" class="form-control" readonly>
                </div>
            </div>

            

            <div class="row">
                <div class="col-sm-6">
                    <label for="facturaup">Factura</label>
                    <input id="facturaup" name="facturaup" type="text" class="form-control" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="estadoup">Estado</label>
                    <input id="estadoup" name="estadoup" type="text" class="form-control" value="enviado" readonly>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" >Enviar</button>
      </div>
    </div>
  </div>
</div>
</form>