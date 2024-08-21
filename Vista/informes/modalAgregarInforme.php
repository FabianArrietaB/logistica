<form id="frmAgregarInforme" method="post">
    
<!-- Modal -->
<div class="modal fade" id="modalAgregarInforme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <div class="col-sm-4">
                    <label for="gasto">Tipo de gasto</label>
                    <select name="gasto" id="gasto" class="custom-select" required >
                        <option value="servicioMtto">servicio Mtto</option>
                        <option value="comprasRpto">Compras Rpto</option>
                        <option value="combustible">Combustible/Lubricantes</option>
                        <option value="salaventas">Sala de ventas</option>
                        <option value="transporte">Transporte Externo</option>
                        <option value="comedor">Comedor</option>
                        <option value="peaje">Peaje</option>
                        <option value="impuesto">Impuestos</option>
                    </select>    
                </div>   
    
        
        <div class="col-sm-4">
                    <label for="placa">Placa</label>
                    <select name="placa" id="placa" class="custom-select" required>
                        <option value=" placas">placas</option>
                        <option value="vlh547">VLH 547</option>
                        <option value="rhb167">RHB 167</option>
                        <option value="qgq460">QGQ 460</option>
                        <option value="SJK995">SJK 995</option>
                        <option value="SJK799">SJK 799</option>
                        <option value="HER636">HER 636</option>
                        <option value="SSZ446">SSZ 446</option>
                        <option value="SJL129">SJL 129</option>
                        <option value="SQA874">SQA 874</option>
                        <option value="QHB884">QHB 844</option>
                        <option value="MONTACARGA JAC">MONTACARGA JAC</option>
                        <option value="MONTACARGA TOYOTA">MONTACARGA TOYOTA</option>
                        <option value="MONTACARGA MAYORISTA">MONTACARGA MAYORISTA</option>
                        <option value="MINICARGADOR">MINICARGADOR</option>
                        <option value="TRASPORTE EXTERNO">TRASNPORTE EXTERNO</option>
                    </select>    
                </div>   
        
                <div class="col-sm-4">
                    <label for="almacen">Bodega</label>
                    <select name="almacen" id="almacen" class="custom-select" required>
                        <option value="0001">001-METROPOLIS</option>
                        <option value="0016">0016-CERAMICASAS</option>
                        <option value="0018">0018-BODEGA MAYORISTA</option>
                        <option value="0019">0019-FERRECASAS</option>
                        <option value="0007">0007-EVENTOS ESPECIALES</option>
                        <option value="0008">0008-AUTOVENTA</option>
                    </select>    
                </div>   

        </div>


    
        <div class="row">
            <div class="col-sm-4">
                    <label for="fecha">Fecha</label>
                    <input id="fecha" name="fecha" type="date" class="form-control" value="<?php echo date('Y-m-d');?>">
            </div>

                <div class="form-group">
                        <label for="nit_proveedor">Provedoor</label>
                    <div class="input-group mb-3">
                            <input id="nit_proveedor" name="nit_proveedor" type="text" class="form-control" placeholder="Nit" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary btn-sm" type="button">
                                <i class="fas fa-search" aria-hidden="true" onclick="obtener_nit_proveedor()"></i> 
                            </button>

                            <button class="btn btn-sm btn-outline-primary" 
                                data-toggle="modal" data-target="#modalProveedores" onclick="obtenerProveedor()">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                        <input id="nombre_proveedor" name="nombre_proveedor" type="text" class="form-control" required>
                    </div>
                </div>
        </div>

        <div class="row">
                <div class="col-sm-4">
                    <label for="prefijo">Prefijo</label>
                    <input id="prefijo" name="prefijo" type="text" class="form-control" required>
                </div>
                
                <div class="col-sm-4">
                    <label for="num_documento">Documento</label>
                    <input id="num_documento" name="num_documento" type="text" class="form-control" required>
                </div>

                <div class="col-sm-4">
                    <label for="valor_factura">Valor factura</label>
                    <input id="valor_factura" name="valor_factura" type="text" class="form-control" required>
                </div>

                <div class="col-sm-4">
                    <label for="cantidad">Cantidad</label>
                    <input id="cantidad" name="cantidad" type="text" class="form-control">
                </div>
        </div>

     
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" 
                    onclick="Agregarinformes()">Registrar</button>
        </div>
        </div>
    </div>
    </div>
</form>