<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AGENDA - PUPPIES S.L.</title>
    <!-- GENERICOS -->
    <link rel="stylesheet" type="text/css" href="./css/ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/lightbox.css" />
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/jquery-ui.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/lightbox.min.js"></script>
    <!-- PROPIOS -->
    <link rel="stylesheet" type="text/css" href="./css/estilos.css" />
    <script type="text/javascript" src="./js/jquery.form-validator.min.js"></script>
    <script type="text/javascript" src="./js/agenda.js"></script>    
    <!--PHP-->
    <?php require_once "./includes/functions.php"; ?>
    <?php require_once "./includes/database_functions.php"; ?>
    <?php session_start(); ?>
</head>
<body class="bg-autenticado">
    <?php require_once "./plantillas/header.php"; ?>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 img-form">
                    <!-- IMAGEN REPRESENTATIVA DEL SITIO EN EL QUE ESTAMOS -->
                    <img src="images/agenda512.png" alt="agenda" title="AGENDA" width="120" height="120">
                    <h1 class="img-title">AGENDA</h1>
                </div>
                <div class="col-md-10 agenda-content">
                    <?php
                    // Recuperamos citas del dia de hoy.
                    include "./plantillas/agenda_calendario.php";
                    if ($_POST){
                       
                    } else {
                        if (isset ($_GET['visualizar'])){
                            // Mostramos datos cita
                        } else {
                            // Mostramos formulario cita nueva.
                            include "./plantillas/agenda_formulario_cita.php";
                        }
                    }                   
                    ?>
                </div><!-- agenda-content -->
            </div><!-- row -->
        </div><!-- container -->
        <div class="clearfix"></div>
    </div><!-- main-content -->
    <?php require_once "./plantillas/footer.php"; ?>
</body>
</html>