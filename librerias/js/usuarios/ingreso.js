function IngresoUsuario(){
  $.ajax({
    type:"POST",
    data:$('#frmIngreso').serialize(),
    url:"Controlador/usuarios/ingreso/ingresoUsuario.php",
    success:function(respuesta){
            respuesta = respuesta.trim(); 
            if(respuesta == 1){
                window.location.href = "Vista/inicio.php";
            }else{

                swal.fire(":(","Error al entrar!" + respuesta, "error");

            }     

    }
});
return false;

}