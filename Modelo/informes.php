<?php
    include "Conexion.php";

    class informes extends Conexion{
        public function  Agregarinformes($datos){
            $conexion = Conexion::conectar();
            $sql ="INSERT INTO gastos(tipo_gasto,
                                        placa,
                                        cod_almacen,
                                        fecha,
                                        nit,
                                        nombre_proveedor,
                                        prefijo,
                                        documento,
                                        valor_factura,
                                        cantidad)
                    VALUES(?,?,?,?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("ssssssssis",$datos['gasto'],
                                        $datos['placa'],
                                        $datos['almacen'],
                                        $datos['fecha'],
                                        $datos['nit_proveedor'],
                                        $datos['nombre_proveedor'],
                                        $datos['prefijo'],
                                        $datos['num_documento'],
                                        $datos['valor_factura'],
                                        $datos['cantidad']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }