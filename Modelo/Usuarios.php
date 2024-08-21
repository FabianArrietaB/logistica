<?php
     include "Conexion.php";

    class Usuarios extends Conexion{
        public function IngresoUsuario($usuario, $password){
            $conexion = Conexion::conectar();
             $sql =  "SELECT * FROM usuarios
                        WHERE usuarios = '$usuario' AND password = '$password'";
            $respuesta = mysqli_query($conexion, $sql);
            
            if(mysqli_num_rows($respuesta) > 0){
                $datosUsuario = mysqli_fetch_array($respuesta);
                $_SESSION['usuarios'] ['nombre'] = $datosUsuario['usuarios'];
                $_SESSION['usuarios'] ['id'] = $datosUsuario['id_usuario'];
                $_SESSION['usuarios'] ['rol'] = $datosUsuario['id_rol'];
                $_SESSION['usuarios'] ['almacen'] = $datosUsuario['bodega'];
                return 1;
            }else{
                return 0;
            }
        }
    }       