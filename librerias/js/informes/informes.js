$(document).ready(function(){
    $('#tablaInformesLoad').load('informes/tablaInformes.php');
    $('#filtro').keyup(function() {obtenerProveedor()})

    document.getElementById('gasto').addEventListener('change', function(evt) {
        const gasto = document.getElementById('gasto').value;
        
        if(gasto === 'combustible'){
            document.getElementById('cantidad').readOnly = false;
        } else {
            document.getElementById('cantidad').readOnly = true;

        }
    })
});

/* function s() {}
() => { } */


function Agregarinformes(){
$.ajax({
    type:'POST',
    data:$('#frmAgregarInforme').serialize(),
    url: "../Controlador/informes/informes.php",
    success:function(respuesta){
        respuesta = respuesta.trim();
        if(respuesta == 1){
            $('#frmAgregarInforme')[0].reset();
            swal.fire({title : "Factura enviada", icon: "success",
            toast:true,
            position: 'top',
            showConfirmButton: false,
            timer:2000,
            timerProgressBar: true
            });  
            
            $('#tablaInformesLoad').load('informes/tablaInformes.php');
        }else{
            Swal.fire(":(","Error al enviar" + respuesta,"Error");
        }
    }
});
    return false;
}

function obtenerProveedor(){
    const filtro = $('#filtro').val(); 
    $.ajax({
        type:"POST",
        data:{ filtro, tipo : 'html'},
        url: `http://metrocosta.ddns.net:8080/metropolis/api/inventarios/proveedor/list`,
        success:function(respuesta){
            document.getElementById('TablaModalProveedores').innerHTML=respuesta;
        }
    });
}

function datos_informe(){
    var desde = $('#desde').val();
    var hasta = $('#hasta').val();
    var cod_bodega = $('#bodega').val();
    window.open('../Vista/informes/consultaInformes.php?desde='+desde+'&hasta='+hasta+'&bodega='+cod_bodega);   
}

function datosproveedores(Nit,NombreProveedor){
    $('#nit_proveedor').val(Nit);
    $('#nombre_proveedor').val(NombreProveedor);
}