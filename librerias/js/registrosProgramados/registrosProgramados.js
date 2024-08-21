$(document).ready(function(){
    $('#tablaProgramarRegistroLoad').load("programados/tablaProgramarRegistro.php");
});

function obtenerEstadoEnviado(idRegistro){
    $.ajax({
        type:"POST",
        data:"idRegistro=" + idRegistro,
        url:"../Controlador/datosProgramados/obtenerEstadoEnviado.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#prefijoup').val(respuesta['prefijo']);
            $('#facturaup').val(respuesta['factura']);
        }

    });
    return false;
}

function agregarEstadoEnviado(){
    $.ajax({
        type:"POST",
        data:$('#frmEnviarRegistro').serialize(),
        url:"../Controlador/datosProgramados/agregarEstadoEnviado.php",
        success:function(respuesta){
            if(respuesta == 1){
                $('#tablaProgramarRegistroLoad').load("programados/tablaProgramarRegistro.php");
                $('#modalAgregarEstadoEnviado').modal('hide');
                Swal.fire(":D","Enviado  con exito!","success");
              
            }else{
                Swal.fire(":(","Error al registrar" + respuesta,"Error");
            }
        }
    });
    return false;
}