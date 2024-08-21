<?php
    include "Conexion.php";
    
    class Conductores extends Conexion{
       public function agregarNuevoConductor($datos){
            $conexion = Conexion::conectar();

            $sql = "INSERT INTO conductores(cod_almacen,
                                        nombre_conductor,
                                        apellido,
                                        cedula,
                                        celular,
                                        id_rol)
                    VALUES(?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("sssisi", $datos['almacen'],
                                        $datos['nombre_conductor'],
                                        $datos['apellido'],
                                        $datos['cedula'],
                                        $datos['celular'],
                                        $datos['rol']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function obtenerDatosConductor($idConductor){
            $conexion = Conexion::conectar();

            $sql = "SELECT  
                        conductores.id_conductor AS idConductor,
                        conductores.nombre_conductor AS nombre_conductor,
                        conductores.apellido AS apellido,
                        conductores.cedula AS cedula,
                        conductores.celular AS celular,
                        conductores.id_rol AS rol_conductor,
                        roles.nombre_rol AS rol
                    FROM
                        conductores AS conductores
                            INNER JOIN
                        roles AS roles ON conductores.id_rol = roles.id_rol
                            AND conductores.id_conductor ='$idConductor'";
            $respuesta = mysqli_query($conexion, $sql);
            $conductor = mysqli_fetch_array($respuesta);

            $datos = array(
                'idConductor' => $conductor['idConductor'],
                'nombre_conductor' => $conductor['nombre_conductor'],
                'apellido' => $conductor['apellido'],
                'cedula' => $conductor['cedula'],
                'celular' => $conductor['celular'],
                'rol_conductor' => $conductor['rol_conductor'],
                'rol' => $conductor['rol']
            );
            return $datos;
    }

    public function editarConductor($datos){
        $conexion = Conexion::conectar();
        $sql="UPDATE conductores SET nombre_conductor = ?,
                        apellido = ?, 
                        cedula = ?,
                        celular = ?, 
                        id_rol= ?
            WHERE  id_conductor = ?";

        $query = $conexion->prepare($sql);
        $query->bind_param('ssisii',$datos['nombre_conductor'],
                                    $datos['apellido'],
                                    $datos['cedula'],
                                    $datos['celular'],
                                    $datos['rol'],
                                    $datos['idConductor']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
      }  
    }