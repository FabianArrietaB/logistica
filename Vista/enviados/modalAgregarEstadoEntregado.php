<form id="frmEntregarRegistro"  method="post" onsubmit="return agregarEstadoEntregado()">
<div class="modal fade" id="modalAgregarEstadoEntregado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle de entrega</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
              <div class="row">
              <div class="col-sm-6">
                    <input type="text" id="idRegistro" name="idRegistro" hidden>
                    <label for="prefijoupd">Prefijo</label>
                    <input id="prefijoupd" name="prefijoupd" type="text" class="form-control" readonly>
              </div>

              <div class="col-sm-6">
                    <label for="facturaupd">Factura</label>
                    <input id="facturaupd" name="facturaupd" type="text" class="form-control" readonly>
              </div>

              <input id="estadoupd" name="estadoupd" type="text" class="form-control" value="entregado"  hidden>
              </div>  
        
     
     
        <div class="row">
          <div class="col-sm-8">
              <label >Estado de entrega</label>
              <select name="estado_entrega" id="estado_entrega" class="form-control" required>
                <option value="" required></option>
                  <option value="Entregado total">Entregado total</option>
                  <option value="Entregado con pendiente">Entregado con pendiente</option>
                    <option value="Entregado con devolucion">Entregado con devolucion</option>
                    <option value="Factura anulada">Factura anulada</option>
              </select>
          </div>

    </div>

    
    <input type="text" id="idRegistro" name="idRegistro" hidden>
            <label for="observacion">Observacion</label>
            <textarea name="observacion" id="observacion" class="form-control"></textarea>

            
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" >Enviar</button>
      </div>
    </div>
  </div>
</div>

</form>