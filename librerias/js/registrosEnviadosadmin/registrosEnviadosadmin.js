$(document).ready(function(){
    $('#tablaEnviarRegistrosadminLoad').load("enviadosAdmin/tablaEnviarRegistrosadmin.php");
});

function reportepdf(){
    var desde = $('#desde').val();
    var hasta = $('#hasta').val();
    window.open('../Vista/enviadosAdmin/reportes.php?desde='+desde+'&hasta='+hasta);
}
