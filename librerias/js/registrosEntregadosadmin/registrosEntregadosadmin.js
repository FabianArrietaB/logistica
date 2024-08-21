$(document).ready(function(){
    $('#tablaEntregarRegistrosadminLoad').load("entregadosAdmin/tablaEntregarRegistrosadmin.php");
});

function bonificacionpdf(){
    var desde = $('#desde').val();
    var hasta = $('#hasta').val();
    var cod_bodega = $('#bodega').val();
    var conductor_rol = $('#tipo_conductor').val();
    window.open('../Vista/entregadosAdmin/bonificaciones.php?desde='+desde+'&hasta='+hasta+'&bodega='+cod_bodega+'&tipo_conductor='+conductor_rol);
}

document.getElementById('bodega').addEventListener('change', (evt) => {
    console.log('cambio el '+ document.getElementById('bodega').value)
})

document.getElementById('tipo_conductor').addEventListener('change', (evt) => {
    console.log('cambio el '+ document.getElementById('tipo_conductor').value)
})

function detallado(){
    var desde = $('#desde').val();
    var hasta = $('#hasta').val();
    var cod_bodega = $('#bodega').val();
    var conductor_rol = $('#tipo_conductor').val();
    window.open('../Vista/entregadosAdmin/detallado.php?desde='+desde+'&hasta='+hasta+'&bodega='+cod_bodega+'&tipo_conductor='+conductor_rol);   
}