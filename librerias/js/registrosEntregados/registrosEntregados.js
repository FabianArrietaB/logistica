$(document).ready(function(){
    $('#tablaEntregarRegistroLoad').load("entregados/tablaEntregarRegistro.php");
});

function obtenerConfirmacionEntrega(idRegistro){
    $.ajax({
        type:"POST",
        data:"idRegistro=" + idRegistro,
        url:"../Controlador/datosEntregados/obtenerConfirmacionEntrega.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#prefijoupda').val(respuesta['prefijo']);
            $('#facturaupda').val(respuesta['factura']);
            $('#estado_entrega').val(respuesta['estado_entrega']);
            $('#observacion').val(respuesta['observacion']);
        }

    });
    return false;
}

function confirmarEntrega(){
    $.ajax({
        type: "POST",
        data: $('#frmConfirmarEntrega').serialize(),
        url:"../Controlador/datosEntregados/confirmarEntrega.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta ==1){
                $('#tablaEntregarRegistroLoad').load("entregados/tablaEntregarRegistro.php");
                $('#modalConfirmarEntrega').modal('hide');
                Swal.fire(":D","Guardado con exito!","success");
            }else{
                Swal.fire(":(","Error al Guardar" + respuesta,"Error");
            }

        }
    });
    return false;
}