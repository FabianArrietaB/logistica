<?php
    class Conexion{
            public function conectar(){
                $servidor = "localhost";
                $usuario = "root";
                $password = "";
                $db = "despacho_logistica";
                $conexion = mysqli_connect($servidor, $usuario, $password, $db);
                return $conexion;
            }

            public function conectarMetroapp(){
                $servidor = "SERVIDOR";
                $usuario  = "consulta";
                $password = "Sistema2024";
                $db       = "METROAPP";
                try {
                   $conexion = new PDO("sqlsrv:server=$servidor;database=$db", $usuario, $password);
                   $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (Exception $e) {
                   echo "Ocurrió un error con la base de datos: " . $e->getMessage();
                }
                return  $conexion;
             }
    }