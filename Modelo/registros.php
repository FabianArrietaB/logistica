<?php
    include "Conexion.php";
    
    class Registros extends Conexion{
        public function agregarNuevoRegistro($datos){
            $conexion = Conexion::conectar();
            $idRegistro = self::agregarRegistro($datos);
            if($idRegistro > 0){
                $sql ="INSERT INTO auditoria(cod_almacen,
                                                prefijo,
                                                factura,
                                                estado,
                                                fecha_registro)
                        VALUES(?, ?, ?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param("sssss",  $datos['almacen'],
                                $datos['prefijo'],
                                $datos['factura'],
                                $datos['estado'],
                                $datos['fecha_registro']);
                $respuesta = $query->execute();
                return $respuesta;
            }else{
                return 0;
            }
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function consultarDocumentoExistente($prefijo,$factura){
            $conexion = Conexion::conectar();
                $sql ="SELECT  prefijo, factura, estado  FROM registros
                                WHERE
                                prefijo = '$prefijo' AND
                                factura = '$factura'";
                $respuesta = mysqli_query($conexion,$sql);
                $duplicado= mysqli_fetch_array($respuesta);
                //return $duplicado;
              return isset($duplicado['prefijo']);
        }
        
        public function agregarRegistro($datos){
            $conexion = Conexion::conectar();
            $sql =  $sql = "INSERT INTO registros (
                                                    tipo_documento,
                                                    nit_vendedor,
                                                    vendedor,
                                                    cod_almacen,
                                                    fecha,
                                                    prefijo,
                                                    factura,
                                                    valor_factura,
                                                    cedula,
                                                    nombre,
                                                    direccion,
                                                    telefono,
                                                    zona,
                                                    fecha_documento,
                                                    canal,
                                                    peso,
                                                    estado)
                            VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)";
            $query = $conexion->prepare($sql);  
            $query->bind_param("sssssssiississsis",$datos['tipo_documento'], 
                                                $datos['nit_vendedor'],
                                                $datos['vendedor'],  
                                                $datos['almacen'],
                                                $datos['fecha'],
                                                $datos['prefijo'],
                                                $datos['factura'],
                                                $datos['valor'],
                                                $datos['cedula'],
                                                $datos['nombre'],
                                                $datos['direccion'],
                                                $datos['telefono'],
                                                $datos['zona'],
                                                $datos['fecha_documento'],
                                                $datos['canal'],
                                                $datos['peso'],
                                                $datos['estado']);
            $respuesta = $query->execute();
            $idRegistro = mysqli_insert_id($conexion);
            $query->close();
            return $idRegistro;
        }
    
        /*aca comienza la consulta para cambiar el estado de registrado a programado */
        public function obtenerEstadoProgramado($idRegistro){
            $conexion = Conexion::conectar();
            $sql="SELECT
                        registros.id_registro AS idRegistro,
                        registros.prefijo AS prefijo,
                        registros.factura AS factura,
                        registros.estado AS estado
                    
                    FROM 
                    registros 
                    WHERE id_registro  = '$idRegistro'";
            $respuesta = mysqli_query($conexion,$sql);
            $registro = mysqli_fetch_array($respuesta);   
            
            $datos = array(
                'idRegistro' => $registro['idRegistro'],
                'prefijo' => $registro['prefijo'],
                'factura' => $registro['factura'],
                'estado'  =>  $registro['estado']

            );

            return $datos;
        }

        public function agregarNuevoEstado($datos){
            $conexion = Conexion::conectar();
            $exitoActualizar = self::actualizarRegistro($datos);

            if($exitoActualizar > 0){
                $sql="INSERT INTO auditoria (
                                            prefijo,
                                            factura,
                                            estado)
                        VALUES (?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('sss',$datos['prefijo'],
                                        $datos['factura'],
                                        $datos['estado']);
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            }else{
                return 0;
            }
        }

        public function actualizarRegistro($datos){
            $conexion = Conexion::conectar();
            $sql="UPDATE registros SET estado = ?
                    WHERE prefijo = ? AND
                            factura = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param('sss',$datos['estado'],
                                    $datos['prefijo'],
                                    $datos['factura']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        /*aca comienza la consulta para cambiar el estado de programado a enviado */
        public function obtenerEstadoEnviado($idRegistro){
            $conexion = Conexion::conectar();
            $sql="SELECT
                    registros.id_registro AS idRegistro,
                    registros.prefijo AS prefijo,
                    registros.factura AS factura,
                    registros.estado AS estado
                FROM
                    registros
                WHERE 
                    id_registro ='$idRegistro'";
            $respuesta = mysqli_query($conexion, $sql);
            $enviado = mysqli_fetch_array($respuesta);

            $datos = array(
                'idRegistro' => $enviado['idRegistro'],
                'prefijo' => $enviado['prefijo'],
                'factura' => $enviado['factura'],
                'estado'  =>  $enviado['estado']
            );
            return $datos;
        }
        public function agregarEstadoEnviado($datos){
            $conexion = Conexion::conectar();
            $exitoActualizarEnviado = self::actualizarRegistroEnviado($datos);
            if($exitoActualizarEnviado > 0){
                $sql="INSERT INTO auditoria (
                                            prefijo,
                                            factura,
                                            estado)
                        VALUES (?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('sss',$datos['prefijo'],
                                        $datos['factura'],
                                        $datos['estado']);
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            }else{
                return 0;
            }
        }

        public function actualizarRegistroEnviado($datos){
            $conexion = Conexion::conectar();
            $sql="UPDATE registros SET estado = ?,
                                        id_conductor = ?,
                                        id_ayudante = ?,
                                        id_zona = ?,
                                        id_carga = ?,
                                        fecha_despacho = ?
                    WHERE prefijo = ? AND
                            factura = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param('siiiisss',$datos['estado'],
                                        $datos['idConductor'],
                                        $datos['idAyudante'],
                                        $datos['idZona'],
                                        $datos['idCarga'],
                                        $datos['fechad'],
                                        $datos['prefijo'],
                                        $datos['factura']
                                        );
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        /*aca comienza la consulta para cambiar el estado de Enviado a confirmar */
        public function obtenerEstadoEntregado($idRegistro){
            $conexion = Conexion::conectar();
            $sql="SELECT
                    registros.id_registro AS idRegistro,
                    registros.prefijo AS prefijo,
                    registros.factura AS factura,
                    registros.estado AS estado
                FROM
                    registros
                WHERE 
                    id_registro ='$idRegistro'";
            $respuesta = mysqli_query($conexion, $sql);
            $confirmar = mysqli_fetch_array($respuesta);

            $datos = array(
                'idRegistro' => $confirmar['idRegistro'],
                'prefijo' => $confirmar['prefijo'],
                'factura' => $confirmar['factura'],
                'estado'  =>  $confirmar['estado']
            );
            return $datos;
        }

        public function agregarEstadoEntregado($datos){
            $conexion = Conexion::conectar();
            $exitoActualizarEntregado = self::actualizarRegistroEntregado($datos);
            if($exitoActualizarEntregado > 0){
                $sql="INSERT INTO auditoria (
                                            prefijo,
                                            factura,
                                            estado)
                        VALUES (?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('sss',$datos['prefijo'],
                                        $datos['factura'],
                                        $datos['estado']);
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            }else{
                return 0;
            }
        }
        

        public function actualizarRegistroEntregado($datos){
            $conexion = Conexion::conectar();
            $sql="UPDATE registros SET estado = ?,
                                        estado_entrega = ?,
                                        observacion = ?
                    WHERE prefijo = ? AND
                            factura = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssss',$datos['estado'],
                                        $datos['estado_entrega'],
                                        $datos['observacion'],
                                        $datos['prefijo'],
                                        $datos['factura']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function obtenerConfirmacionEntrega($idRegistro){
            $conexion = Conexion::conectar();
            $sql="SELECT
                    registros.id_registro AS idRegistro,
                    registros.prefijo AS prefijo,
                    registros.factura AS factura,
                    registros.estado_entrega AS estado_entrega,
                    registros.observacion AS observacion,
                    registros.estado AS estado
                FROM
                    registros
                WHERE 
                    id_registro ='$idRegistro'";
            $respuesta = mysqli_query($conexion, $sql);
            $confirmar = mysqli_fetch_array($respuesta);

            $datos = array(
                'idRegistro' => $confirmar['idRegistro'],
                'prefijo' => $confirmar['prefijo'],
                'factura' => $confirmar['factura'],
                'estado_entrega' => $confirmar['estado_entrega'],
                'observacion' => $confirmar['observacion'],
                'estado'  =>  $confirmar['estado']
            );
            return $datos;
        }

        public function confirmarEntrega($datos){
            $conexion = Conexion::conectar();
            $sql="UPDATE registros SET estado = ?,
                                        estado_entrega = ?,
                                        observacion = ?
                    WHERE prefijo = ? AND
                            factura = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssss',$datos['estado'],
                                        $datos['estado_entrega'],
                                        $datos['observacion'],
                                        $datos['prefijo'],
                                        $datos['factura']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;

        }

        /*consulta de documentos pendientes*/
        public function reenviarPendientes($idRegistro){
            $conexion = Conexion::conectar();
            $sql = "UPDATE registros SET estado_entrega = 'reprogramado'                    
                    WHERE id_registro = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i',$idRegistro);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function obtenerDatosRegistro($idRegistro){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                    registros.cod_almacen AS almacen,
                    registros.fecha AS fecha,
                    registros.prefijo AS prefijo,
                    registros.factura AS factura,
                    registros.valor_factura AS valor,
                    registros.cedula AS cedula,
                    registros.nombre AS nombre,
                    registros.direccion as direccion,
                    registros.telefono AS  telefono,
                    registros.zona AS zona,
                    registros.fecha_despacho AS fechad,
                    registros.canal AS canal
                    
                FROM 
                    registros
                WHERE registros.id_registro ='$idRegistro'";

            $respuesta = mysqli_query($conexion,$sql);
            $registro = mysqli_fetch_array($respuesta);

            $datos = array(
            'almacen' => $registro['almacen'],
            'fecha' =>  $registro['fecha'],
            'prefijo' =>$registro['prefijo'],
            'factura' => $registro['factura'],
            'valor' => $registro['valor'],
            'cedula' => $registro['cedula'],
            'nombre' => $registro['nombre'],
            'direccion' =>$registro['direccion'],
            'telefono' => $registro['telefono'],
            'zona' => $registro['zona'],
            'fechad' => $registro['fechad'],
            'canal' => $registro['canal'],
            'estado' => 'programado'
                            
        );
                return $datos;
        }
        public function reenviarDocumentos($idRegistro){
            $conexion = Conexion::conectar();
            $exitoActualizareenvio = self::reenviarPendientes($idRegistro);
            $datosRegistro = self::obtenerDatosRegistro($idRegistro);
            if($exitoActualizareenvio > 0){
                $sql="INSERT INTO registros (
                                            cod_almacen,
                                            fecha,
                                            prefijo,
                                            factura,
                                            valor_factura,
                                            cedula,
                                            nombre,
                                            direccion,
                                            telefono,
                                            zona,
                                            fecha_despacho,
                                            canal,
                                            estado)
                                            VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
                $query = $conexion->prepare($sql);
                $query->bind_param("ssssiississss", $datosRegistro['almacen'],
                                                    $datosRegistro['fecha'],
                                                    $datosRegistro['prefijo'],
                                                    $datosRegistro['factura'],
                                                    $datosRegistro['valor'],
                                                    $datosRegistro['cedula'],
                                                    $datosRegistro['nombre'],
                                                    $datosRegistro['direccion'],
                                                    $datosRegistro['telefono'],
                                                    $datosRegistro['zona'],
                                                    $datosRegistro['fechad'],
                                                    $datosRegistro['canal'],
                                                    $datosRegistro['estado']
                                                );
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            }else{
                return 0;
            }


        }

        public function datos_traslado($tipodocumento, $codalmacen, $prefijo, $factura){
            $con = new Conexion();
            if($tipodocumento === 'traslado'){
                $movimiento = '55';
            }else if($tipodocumento === 'sai'){
                $movimiento = '56';
            }
            $numero = '%' . $factura;
            $sql = $con->conectarMetroapp()->prepare("SELECT DISTINCT
                v.VEN_CEDULA cedula,
                mi.MOV_PREFIJ prefi,
                mi.MOV_NUMDOC documento,
                mi.MOV_CODOPE vendedor,
                mi.MOV_CEDULA nit,
                mid.MOV_FECHA  fecha,
                ROUND(SUM(mid.MOV_VALOR),0,2) valor_documento,
                a.ALM_NOMBRE  razon_social,
                a.ALM_DIRECC direccion
            FROM METROAPP.dbo.movimientos_inventario mi
            LEFT JOIN METROCERAMICA.dbo.MAEALM a ON a.ALM_CODIGO =  mi.MOV_BODEGA
            LEFT JOIN METROCERAMICA.dbo.MAEVEN v ON v.VEN_NOMBRE = mi.MOV_VENDED 
            LEFT JOIN METROAPP.dbo.movimientos_inventario_detalle mid ON mi.MOV_PREFIJ = mid.MOV_PREFIJ AND mi.MOV_NUMDOC = mid.MOV_NUMDOC
            WHERE mid.MOV_TIPMOV = ? AND mi.MOV_PREFIJ = ? AND mi.MOV_NUMDOC LIKE ? AND mi.MOV_BODEGA = ?
            GROUP BY v.VEN_CEDULA, mi.MOV_PREFIJ, mi.MOV_NUMDOC, mi.MOV_CODOPE, mi.MOV_CEDULA, mid.MOV_FECHA, a.ALM_NOMBRE, a.ALM_DIRECC, mi.MOV_TIPMOV");
            $sql->execute(array($movimiento, $prefijo, $numero, $codalmacen));
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }