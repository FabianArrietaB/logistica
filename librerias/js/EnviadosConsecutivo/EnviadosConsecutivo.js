$(document).ready(function(){
    $('#tablaEnviarConsecutivoLoad').load("consecutivo/tablaEnviadoConsecutivo.php");
});
function reportepdf(){
    var desde = $('#desde').val();
    var hasta = $('#hasta').val();
    window.open('../Vista/consecutivo/reportesConsecutivo.php?orden=generar&desde='+desde+'&hasta='+hasta);
}