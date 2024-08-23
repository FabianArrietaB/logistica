<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../librerias/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../librerias/css/plantilla.css">
        <link rel="stylesheet" href="../librerias/datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../librerias/datatable/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../librerias/fontawesome/css/all.css">
        <link rel="stylesheet" href="../librerias/datatable/buttons.dataTables.min.css">
        <script
                src="https://code.jquery.com/jquery-3.6.1.js"
                integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
                crossorigin="anonymous">
        </script>
        <title>Grupo Metropolis</title>
        <link rel="icon"  href="../librerias/imagenes/icono.jpg">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
            <div class="container">
                <a class="navbar-brand" href="inicio.php">
                    <img src="../librerias/imagenes/zyro-image.png" width="70%"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="inicio.php">
                            <span class="fas fa-home"></span>    
                            Inicio</a>
                        </li>
                        <?php if($_SESSION['usuarios']['rol'] == 1) {?>
                            <li class="nav-item">
                                <a class="nav-link" href="registrosadmin.php">
                                <span  class="fas fa-clipboard"></span>
                                Registros</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="registrosprogramadosadmin.php">
                                <span  class="fas fa-clock"></span>
                                programados</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="registrosEnviadosadmin.php">
                                <span class="fas fa-truck"></span>    
                                Enviados</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="registrosEntregadosAdmin.php">
                                <span class="fas fa-truck-loading"></span>    
                                Entregados</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="conductores.php">
                                <span class="fas fa-people-arrows"></span>    
                                Conductores</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="informes.php">
                                <span class="fas fa-file-contract"></span>    
                                informes</a>
                            </li>                
                    
                        <?php } else if ($_SESSION['usuarios']['rol'] == 2) { ?>    
                        
                            <li class="nav-item active">
                                <a class="nav-link" href="registros.php">
                                <span class="fas fa-clipboard"></span>    
                                Registro</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="registrosprogramados.php">
                                <span  class="fas fa-clock"></span>    
                                programados</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="enviadosconsecutivo.php">
                                <span class="fas fa-dolly-flatbed"></span>    
                                Pre-envio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="registrosenviados.php">
                                <span class="fas fa-truck"></span>    
                                Enviados</a>
                            </li>

                            
                            <li class="nav-item">
                                <a class="nav-link" href="Pendientes.php">
                                <span class="fas fa-people-carry"></span>    
                                Pendientes</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="registrosentregados.php">
                                <span class="fas fa-truck-loading"></span>    
                                Entregados</a>
                            </li>                    
                        <?php } ?>    

                        <li class="nav-item dropdown">
                            <a style="color:#1958a3" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-user-tie"></span>
                                Usuario: <?php echo $_SESSION['usuarios'] ['nombre']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Controlador/usuarios/ingreso/salir.php">
                                <span class="fas fa-sign-out-alt"></span>    
                                Salir</a>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
        </nav>