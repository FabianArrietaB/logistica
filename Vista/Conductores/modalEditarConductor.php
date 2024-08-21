<form id="frmEditarConductor" method="POST" onsubmit="return editarConductor()">
<div class="modal fade" id="modalEditarConductor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar datos conductor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <input type="text" id="idConductor" name="idConductor" hidden>
        <div class="row">
            <div class="col-sm-4">
                <label for="nombre_conductoru">Nombre</label>
                <input type="text" class="form-control" id="nombre_conductoru" name="nombre_conductoru">
            </div>

            <div class="col-sm-4">
                <label for="apellidou">Apellido</label>
                <input type="text" class="form-control" id="apellidou" name="apellidou">
            </div>
            
            <div class="col-sm-4">
                <label for="cedulau">Cedula</label>
                <input type="text" class="form-control" id="cedulau" name="cedulau">
            </div>

            <div class="col-sm-4">
                <label for="celularu">Celular</label>
                <input type="text" class="form-control" id="celularu" name="celularu">
            </div>

        </div>


        <div class="row">

           
        </div> 
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>

        
        <div class="row">
            <div class="col-sm-12">
                <label for="id_rolu">Cargo</label>
                    <select name="id_rolu" id="id_rolu" class="form-control">
                        <option value="3">Conductor</option>
                        <option value="4">Ayudante</option>
                        <option value="5">Externo</option>
                    </select> 
            </div>

        </div>
        </div>
        <div class="modal-footer">
        <button class="btn btn-primary">Actualizar</button>
        </div>
    </div>
    </div>
</div>
</form>
