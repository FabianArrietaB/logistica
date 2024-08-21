$(document).ready(function(){
    $('#tablaConductorLoad').load("Conductores/tablaConductores.php");
});

function agregarNuevoConductor(){
    $.ajax({
        type:"POST",
        data: $('#frmAgregarConductor').serialize(),
        url: "../Controlador/conductores/agregarNuevoConductor.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablaConductorLoad').load("Conductores/tablaConductores.php");
                $('#frmAgregarConductor')[0].reset();
                Swal.fire(":D","Conductor creado con exito!","success");
            }else{
                Swal.fire(":(","Error al registrar Conductor" + respuesta, "error");
            }
        }
    });
    return false;
}

function obtenerDatosConductor(idConductor){
    $.ajax({
        type:"POST",
        data:"idConductor=" + idConductor,
        url: "../Controlador/conductores/obtenerDatosConductor.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idConductor').val(respuesta['idConductor']);
            $('#nombre_conductoru').val(respuesta['nombre_conductor']);
            $('#apellidou').val(respuesta['apellido']);
            $('#cedulau').val(respuesta['cedula']);
            $('#celularu').val(respuesta['celular']);
            $('#rolu').val(respuesta['rol']);
        }
    });

    return false;
}

function editarConductor(){
    $.ajax({
        type:"POST",
        data:$('#frmEditarConductor').serialize(),
        url:"../Controlador/conductores/editarConductor.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablaConductorLoad').load("Conductores/tablaConductores.php");
                $('#modalEditarConductor').modal('hide');
                Swal.fire(":D","Conductor actualizado con exito!","success");
            }else{
                Swal.fire(":(","Error al actualizar Conductor" + respuesta, "error");
            }
        }
    });
    return false;
}