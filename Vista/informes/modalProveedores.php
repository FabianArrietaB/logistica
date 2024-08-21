<div class="modal fade" id="modalProveedores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proveedores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
                  <input id="filtro" type="text" name="filtro" class="form-control" placeholder="buscar nit o nombre">
            </div>

            <div class="col-md-12">
                  <table class="table table-striped table-sm">
                      <thead class="table-dark">
                          <th>#</th>
                          <th>Nit</th>
                          <th>Proveedor</th>
                      </thead>
                      <tbody id="TablaModalProveedores"></tbody>
                  </table>
            </div>

          </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
</form>
