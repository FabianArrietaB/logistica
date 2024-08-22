$(document).ready(function(){
    $('#tablaRegistroLoad').load("registro/tablaRegistro.php");
});

$('#almacen').keypress(function(e) {
    if(e.which == 13) {
        datos_factura();
    }
});

function agregarNuevoRegistro(){
    $.ajax({
        type: "POST",
        data: $('#frmAgregarRegistro').serialize(),
        url:"../Controlador/registros/agregarNuevoRegistro.php",
        beforeSend: function(){
               document.getElementById('off').disabled = true 
        },
        complete: function(){
            document.getElementById('off').disabled = false 
        },
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 2){
                Swal.fire("):","el documento ya a sido registrado intenta con otro!","warning");
            }
            else if(respuesta ==1){
                $('#tablaRegistroLoad').load("registro/tablaRegistro.php");
                $('#frmAgregarRegistro')[0].reset();
                Swal.fire(":D","Registrado con exito!","success");
            }else{
                Swal.fire(":(","Error al registrar" + respuesta,"Error");
            }

        }
    });
    return false;
}

function obtenerEstadoProgramado(idRegistro){
        $.ajax({
            type: "POST",
            data: "idRegistro=" + idRegistro,
            url: "../Controlador/registros/obtenerEstadoProgramado.php",
            success: function(respuesta){
                respuesta = jQuery.parseJSON(respuesta);
                $('#prefijou').val(respuesta['prefijo']);
                $('#facturau').val(respuesta['factura']);
            }
        });
}

function agregarNuevoEstado(){
    console.log($('#frmProgramarRegistro').serialize())
        $.ajax({
            type:"POST",
            data:$('#frmProgramarRegistro').serialize(),
            url:"../Controlador/registros/agregarNuevoEstado.php",
            success:function(respuesta){
                respuesta = respuesta.trim();
                 if(respuesta == 1){
                    $('#tablaRegistroLoad').load("registro/tablaRegistro.php");
                    $('#modalAgregarNuevoEstado').modal('hide');
                    Swal.fire(":D","Programado con exito!","success");
                  
                }else{
                    Swal.fire(":(","Error al registrar" + respuesta,"Error");
                }
            }
        });

        return false;
}

function datos_factura(){
    // tipo_doocumento ('remision', 'factura_electronica', 'factura_caja')
    const tipo_documento = $('#tipo_documento').val()
    const cod_almacen = $('#almacen').val();
    const prefijo = $('#prefijo').val();
    const factura = $('#factura').val();

    console.log(tipo_documento, cod_almacen, prefijo, factura)
    if (tipo_documento == '' || cod_almacen == '' || prefijo == '' || factura == '') {
        Swal.fire({title: "Debe digitar el tipo documento, bodega, prefijo y factura", icon : "error"})
        return;
    }

    if(tipo_documento === 'factura' || tipo_documento === 'remision'){
        $.ajax({
            type:"GET",
            data: {},
            url: `http://metrocosta.ddns.net:8080/metropolis/api/inventarios/logistica/consultar_datos_documento/${cod_almacen}/${tipo_documento}/${prefijo}/${factura}`,
            success:function(respuesta){
                console.log(respuesta);
                $('#valor').val(respuesta['valor_documento']);
                $('#nit_vendedor').val(respuesta['nit_vendedor']);
                $('#vendedor').val(respuesta['vendedor']);
                $('#cedula').val(respuesta['nit']);
                $('#nombre').val(respuesta['razon_social']);
                $('#direccion').val(respuesta['direccion']);
                $('#telefono').val(respuesta['telefono']);
                $('#zona').val(respuesta['zona']);
                $('#peso').val(Number(respuesta['peso']));
                $('#fecha_documento').val(respuesta['fecha'].substring(0,10));
                $('#fecha').val(respuesta['fecha'].substring(0,10));
            }
        });
    } else if (tipo_documento === 'traslado' || tipo_documento === 'sai') {
        $.ajax({
            type: "GET",
            data: {},
            url: `http://metrocosta.ddns.net:8080/metropolis/api/inventarios/logistica/consultar_datos_traslado/${cod_almacen}/${tipo_documento}/${prefijo}/${factura}`,
            success:function(respuesta){
                console.log(respuesta);
                $('#valor').val(respuesta['valor_documento']);
                $('#nit_vendedor').val(respuesta['nit_vendedor']);
                $('#vendedor').val(respuesta['vendedor']);
                $('#cedula').val(respuesta['nit']);
                $('#nombre').val(respuesta['razon_social']);
                $('#direccion').val(respuesta['direccion']);
                $('#telefono').val(respuesta['telefono']);
                $('#peso').val(Number(respuesta['peso']));
                $('#detalle').val(respuesta['detalle']);
                $('#fecha_documento').val(respuesta['fecha'].substring(0,10));
                $('#fecha').val(respuesta['fecha'].substring(0,10));
            }
        });
    }
}