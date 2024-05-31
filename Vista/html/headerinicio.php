<?php
require_once 'Configuracion/bd.php';
$pdopag = ConexionBD::conectar();
$pdopag->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

date_default_timezone_set('America/Bogota');
$fechasistema = date("Y-m-d");
$horasistema = date("H:i:s");
$url = "http://localhost/tiendaventa/";
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Vista/bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script type="text/javascript" src="Vista/js/jquery-3.6.0.min.js"></script>
        <link rel="shortcut icon" href="Vista/imagen/icono.png">
        <script src="Vista/jquery/jquery-ui.js" type="text/javascript"></script>
        <link href="Vista/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css"/>       
        <link href="Vista/fontawesome/css/all.css" rel="stylesheet" />
        <script src="Vista/fontawesome/js/all.js" crossorigin="anonymous"></script>
        <link href="Vista/css/styles.css" rel="stylesheet" />
        <script src="Vista/js/sweetalert.min.js" type="text/javascript"></script>        
        <title>ELECTROMEZA</title>
    </head>
    <style>
     
        .nav-link{
            color: white;
        }

        .nav-item:hover{
            background-color: black;
            font-weight: bold;
            color: orange;
        }
        a{
            color:white;
            text-decoration:none;
        }
        a:hover{
            color:orange;
        }

       
        .titulo{
            background-color: orange;
            text-align: center;
            font-weight: bold;
        }
    </style>
    <body>

        <header>
            <img src="Vista/imagen/banner.png" height="20%" alt="...">

        </header>

        <nav class="navbar navbar-expand-lg bg-warning text-white">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?accion=index">Inicio</a>
                        </li> 

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?accion=somos">¿ Quiénes Somos ?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?accion=catalogo">Catalogo</a>
                        </li>  
                      

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registrar">Registrarse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <!--LOGIN-->
        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                        <h6 class="modal-title">INICIAR SESIÓN</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=login">
                            <div class="mb-3">
                                <label for="data" class="form-label">Identificación:</label>
                                <input type="number" class="form-control form-control-sm" id="c_identificacion" name="c_identificacion" placeholder="Ingrese información" required>
                            </div>

                            <div class="mb-3">
                                <label for="data" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control form-control-sm" id="c_contrasena" name="c_contrasena" placeholder="Ingrese información" required>
                            </div>
                            <div class="mb-3">
                                <label for="data" class="form-label">Tipo de Usuario:</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="c_rol" id="c_rol">
                                    <option value="2">Cliente</option>
                                    <option value="1">Administrador</option>
                                </select>
                            </div>


                            <center><button type="submit" class="btn btn-dark btn-sm">Acceder&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--REGISTRAR-->

        <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                        <h6 class="modal-title">REGISTRO DE USUARIO</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form ROLE="FORM" METHOD="POST" ACTION="index.php?accion=registrarme">
                            <div class="mb-3">
                                <label for="data" class="form-label">Identificación:</label>
                                <input type="number" class="form-control form-control-sm" id="c_identificacion" name="c_identificacion" placeholder="Ingrese información" required>
                            </div>
                            <div class="mb-3">
                                <label for="data" class="form-label">Nombres:</label>
                                <input type="text" class="form-control form-control-sm" id="c_nombres" name="c_nombres" placeholder="Ingrese información" required>
                            </div>
                             <div class="mb-3">
                                <label for="data" class="form-label">Apellidos::</label>
                                <input type="text" class="form-control form-control-sm" id="c_apellidos" name="c_apellidos" placeholder="Ingrese información" required>
                            </div>
                            <div class="mb-3">
                                <label for="data" class="form-label">Celular:</label>
                                <input type="number" class="form-control form-control-sm" id="c_celular" name="c_celular" placeholder="Ingrese información" required>
                            </div>

                            <div class="mb-3">
                                <label for="data" class="form-label">Email:</label>
                                <input type="email" class="form-control form-control-sm" id="c_correo" name="c_correo" placeholder="Ingrese información" required>
                            </div>

                            <div class="mb-3">
                                <label for="data" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control form-control-sm" id="c_contrasena" name="c_contrasena" placeholder="Ingrese información" required>
                                <input type="hidden" class="form-control form-control-sm" id="c_rol" name="c_rol" value="2">

                            </div>
                           
                            <center><button type="submit" class="btn btn-dark btn-sm">Registrarme&nbsp; &nbsp; <i class="fa-solid fa-floppy-disk"></i></button></center>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

