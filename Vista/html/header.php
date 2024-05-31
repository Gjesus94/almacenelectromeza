<?php
require_once 'Configuracion/bd.php';
$pdopag = ConexionBD::conectar();
$pdopag->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

date_default_timezone_set('America/Bogota');
$fechasistema = date("Y-m-d");
$horasistema = date("H:i:s");
$url = "http://localhost/MoteleroSGM/";

$perfil = $perfilusuario->fetch(PDO::FETCH_ASSOC);
$titulopagina = "ELECTROMEZA";
$roles = $perfil["c_rol"];
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
        .navbar-toggler{
            background-color: white;
        }
        .navbar-toggler:hover{
            color: orange;
        }


        .nav-link{
            color: white;
        }

        .nav-item:hover{
            background-color: black;
            font-weight: bold;
        }
        a{
            color:black;
            text-decoration:none;
        }
        a:hover{
            color:black;
        }

        .titulo{
            background-color: orange;
            text-align: center;
            font-weight: bold;
        }
    </style>
    <body>

         <header>
            <img src="Vista/imagen/banner.png" alt="...">
        </header>

  