<form id="frmConfirmarEntrega"  method="post" onsubmit="return confirmarEntrega()">
  <div class="modal fade" id="modalConfirmarEntrega" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <div class="col-sm-3">
              <input type="text" id="idRegistro" name="idRegistro" hidden>
              <label for="prefijoupda">Prefijo</label>
              <input id="prefijoupda" name="prefijoupda" type="text" class="form-control" readonly>
            </div>
            <div class="col-sm-3">
              <label for="facturaupda">Factura</label>
              <input id="facturaupda" name="facturaupda" type="text" class="form-control" readonly>
            </div>
            <input id="estadoupda" name="estadoupda" type="text" class="form-control" value="entregado"  hidden>
            <div class="col-sm-6">
              <label >Estado de entrega</label>
              <select name="estado_entrega" id="estado_entrega" class="form-control">
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
          <textarea name="observacion" id="observacion" class="form-control" required></textarea>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" >Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>