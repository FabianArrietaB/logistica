$(document).ready(function(){
    $('#tablaEnviarPendientesLoad').load("pendientes/tablaPendientes.php");
});

function reenviarDocumentos(idRegistro){
    Swal.fire({
        title: 'Estas seguro de reenviar este Documento?',
        text: "una vez Enviado no podra ser restaurado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, estoy seguro!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data:"idRegistro=" + idRegistro,
                url:"../Controlador/datosPendientes/reenviarPendientes.php",
                success:function(respuesta){
                    if(respuesta == 1){
                        $('#tablaEnviarPendientesLoad').load('pendientes/tablaPendientes.php');
                            swal.fire(":D","Guardado con Exito!","success");
                       }else{
                            swal.fire(":(","Fallo al Guardar!" + respuesta,"error");
                   }
                }
            });
          
          
        }
      })
      return false;
}