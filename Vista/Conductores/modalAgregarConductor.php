<form id="frmAgregarConductor" method="POST" onsubmit="return agregarNuevoConductor()">
<div class="modal fade" id="modalAgregarConductor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo conductor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <div class="row">

        <div class="col-sm-4">
                <label for="almacen">Cod_almacen</label>
                <input type="text" class="form-control" id="almacen" name="almacen">
            </div>

            <div class="col-sm-4">
                <label for="nombre_conductor">Nombre</label>
                <input type="text" class="form-control" id="nombre_conductor" name="nombre_conductor">
            </div>

            <div class="col-sm-4">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
            </div>
            
            <div class="col-sm-4">
                <label for="cedula">Cedula</label>
                <input type="text" class="form-control" id="cedula" name="cedula">
            </div>

            <div class="col-sm-4">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular">
            </div>

        </div>


        <div class="row">

           
        </div> 
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>

        
        <div class="row">
            <div class="col-sm-12">
                <label for="rol">Cargo</label>
                    <select name="rol" id="rol" class="form-control">
                        <option value="3">Conductor</option>
                        <option value="4">Ayudante</option>
                        <option value="5">Externo</option>
                    </select> 
            </div>

        </div>
        </div>
        <div class="modal-footer">
        <span  class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <button class="btn btn-primary">Agregar</button>
        </div>
    </div>
    </div>
</div>
</form>
