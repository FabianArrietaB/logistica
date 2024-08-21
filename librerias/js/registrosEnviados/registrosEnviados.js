$(document).ready(function(){
    $('#tablaEnviarRegistroLoad').load("enviados/tablaEnviarRegistro.php");
});

function obtenerEstadoEntregado(idRegistro){
    $.ajax({
        type:"POST",
        data:"idRegistro=" + idRegistro,
        url:"../Controlador/datosEnviados/obtenerEstadoEntregado.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#prefijoupd').val(respuesta['prefijo']);
            $('#facturaupd').val(respuesta['factura']);
        }

    });
    return false;
}

function agregarEstadoEntregado(){
    $.ajax({
        type:"POST",
        data:$('#frmEntregarRegistro').serialize(),
        url:"../Controlador/datosEnviados/agregarEstadoEntregado.php",
        success:function(respuesta){
            if(respuesta == 1){
                $('#tablaEnviarRegistroLoad').load("enviados/tablaEnviarRegistro.php");
                $('#modalAgregarEstadoEntregado').modal('hide');
                Swal.fire(":D","Enviado  con exito!","success");
            
            }else{
                Swal.fire(":(","Error al registrar" + respuesta,"Error");
            }
        }
    });
    return false;
}

function reportepdf(){
    var desde = $('#desde').val();
    var hasta = $('#hasta').val();
    window.open('../Vista/enviados/reportesEnviados.php?orden=generar&desde='+desde+'&hasta='+hasta);
}
