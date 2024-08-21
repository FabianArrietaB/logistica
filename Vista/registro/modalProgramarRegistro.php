<form id="frmProgramarRegistro"  method="post" onsubmit="return agregarNuevoEstado()">

<div class="modal fade" id="modalAgregarNuevoEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar estado de registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="text" id="idRegistro" name="idRegistro" hidden>
            <div class="row">
                <div class="col-sm-6">
                    <label for="prefijou">Prefijo</label>
                    <input id="prefijou" name="prefijou" type="text" class="form-control" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="facturau">Factura</label>
                    <input id="facturau" name="facturau" type="text" class="form-control" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="estadou">Estado</label>
                    <input id="estadou" name="estadou" type="text" class="form-control" value="programado" readonly>
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