

<form id="frmAgregarRegistro" method="post">
<!-- Modal -->
<div class="modal fade" id="modalAgregarRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Facturas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h4>Informacion del Documento</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">
                <label for="tipo_documento">Tipo_documento</label>
                <select name="tipo_documento" id="tipo_documento" class="custom-select" required>
                    <option value="">Seleccione una Opcion</option>
                    <option value="factura">FACTURA</option>
                    <option value="remision">REMISION</option>
                    <option value="traslado">TRASLADO</option>
                    <option value="sai">SALIDA</option>
                    <option value="ordenCompra">ORDEN COMPRA</option>
                </select>
            </div>

            <div class="col-sm-3">
                <label for="prefijo">Prefijo</label>
                <input id="prefijo" name="prefijo" type="text" class="form-control" required>
            </div>

            <div class="col-sm-3">
                <label for="factura">Factura</label>
                <input id="factura" name="factura" type="text" class="form-control" required>
            </div>

            <div class="col-sm-3">
                <label for="almacen">cod_almacen</label>
                <input id="almacen" name="almacen" type="text" class="form-control"  required>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-sm-3">
                <label for="fecha">Fecha</label>
                <input id="fecha" name="fecha" type="date" class="form-control" value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>"  required>
            </div>

            <div class="col-sm-3">
                <label for="nit">Nit_vendedor</label>
                <input id="nit_vendedor" name="nit_vendedor" type="text" class="form-control"  readonly required>
            </div>

            <div class="col-sm-3">
                <label for="vendedor">nombre_vendedor</label>
                <input id="vendedor" name="vendedor" type="text" class="form-control" readonly  required>
            </div>

            

            <div class="col-sm-3">
                <label for="valor">Valor_factura</label>
                <input id="valor" name="valor" type="text" class="form-control" required>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-sm-3">
                <label for="zona">Zona</label>
                <select name="zona" id="zona" class="custom-select" required>
                    <option value=""></option>
                    <option value="Zona 1">Zona1</option>
                    <option value="Zona 2">Zona2</option>
                    <option value="Zona 3">Zona3</option>
                    <option value="Zona 4">Zona4</option>
                    <option value="Zona 5">Zona5</option>
                    <option value="Zona 6">Zona6</option>
                    <option value="Zona 7">Zona7</option>
                    <option value="Zona 8">Zona8</option>
                    <option value="Zona 9">Zona9</option>
                    <option value="Zona 10">Zona10</option>
                    <option value="Zona 11">Zona11</option>
                    <option value="Zona 12">Zona12</option>
                    <option value="Zona 13">Zona13</option>
                    <option value="Zona 14">Zona14</option>
                    <option value="Zona 15">Zona15</option>
                    <option value="Zona 16">Zona16</option>
                    <option value="Zona 21">Zona21</option>
                    <option value="Zona 22">Zona22</option>
                    <option value="Zona 23">Zona23</option>
                    <option value="Zona 24">Zona24</option>
                    <option value="Zona 25">Zona25</option>
                    <option value="Zona 26">Zona26</option>
                </select>
            </div>

            <div class="col-sm-3">
                <label for="fecha_documento">Fecha_documento</label>
                <input id="fecha_documento" name="fecha_documento" type="date" class="form-control" required readonly>
            </div>

            <div class="col-sm-3">
                <label for="canal">Canal</label>
                <select name="canal" id="canal" class="custom-select" required>
                    <option value=""></option>
                    <option value="Obra">Obra</option>
                    <option value="Distribucion">Distrubucion</option>
                    <option value="Call center">Call center</option>
                    <option value="Mostrador">Mostrador</option>
                </select>    
            </div>

            <div class="col-sm-3">
                <label for="peso">Peso</label>
                <input id="peso" name="peso" type="text" class="form-control" required readonly>
            </div>

            <div class="col-sm-12">
                <label for="detalle">Observacion</label>
                <input id="detalle" name="detalle" type="text" class="form-control" required readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <h4>Informacion del Cliente</h4>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-sm-4">
                    <label for="cedula">Cedula</label>
                    <input id="cedula" name="cedula" type="text" class="form-control" required>
            </div>
            <div class="col-sm-8">
                <label for="nombre">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="form-control" required>
            </div>

            <div class="col-sm-4">
                <label for="telefono">Telefono</label>
                <input id="telefono" name="telefono" type="text" class="form-control" required>
            </div>

            <div class="col-sm-8">
                <label for="direccion">Direccion</label>
                <input id="direccion" name="direccion" type="text" class="form-control" required>
            </div>

        </div>

        
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-warning" onclick="datos_factura()">Consultar</button>
        <button type="button" class="btn btn-primary" onclick="agregarNuevoRegistro()">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>