<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CONFIGURACION - PUPPIES S.L.</title>
    <!-- GENERICOS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <!-- PROPIOS -->
    <link rel="stylesheet" type="text/css" href="./css/estilos.css" />
    <!--PHP-->
    <?php session_start(); ?>
</head>
<body class="bg-autenticado">
    
    <?php require_once "./plantillas/header.php"; ?>
    
    <div class="main-content">
        <div class="container">
            <?php
            if (isset($_SESSION['id_usuario']) && $_SESSION['id_perfil']==1){
                ?>
                
                <div class="configuracion-btns">
                    <div class="row">
                        <div class="col-md-2 col-md-offset-3 col-xs-4 col-xs-offset-2 configuracion-btn disabled">
                            <a href=""><img src="./images/usuarios512.png" alt="usuarios512.png" title="USUARIOS" /></a>
                            <h3>GESTION USUARIOS</h3>
                        </div>
                        <div class="col-md-2 col-md-offset-2 col-xs-4 col-xs-offset-1 configuracion-btn disabled">
                            <a href=""><img src="./images/backup512.png" alt="backup512.png" title="COPIA DE SEGURIDAD" /></a>
                            <h3>COPIA DE SEGURIDAD</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-2 col-xs-4 col-xs-offset-2 configuracion-btn disabled">
                            <a href=""><img src="./images/recuperar512.png" alt="recuperar512.png" title="RECUPERAR CLIENTES" /></a>
                            <h3>REACTIVACION <img src="./images/clientes100.png" alt="clientes100.png" title="CLIENTES" /></h3> 
                        </div>
                        <div class="col-md-2 col-md-offset-1 col-xs-4 col-xs-offset-1 configuracion-btn disabled">
                            <a href=""><img src="./images/recuperar512.png" alt="recuperar512.png" title="RECUPERAR MASCOTAS" /></a>
                            <h3>REACTIVACION <img src="./images/mascotas100.png" alt="mascotas100.png" title="MASCOTAS" /></h3>
                        </div>
                        <div class="col-md-2 col-md-offset-1 col-xs-4 col-xs-offset-2 configuracion-btn disabled">
                            <a href=""><img src="./images/recuperar512.png" alt="recuperar512.png" title="RECUPERAR ALMACEN" /></a>
                            <h3>REACTIVACION <img src="./images/almacen100.png" alt="almacen100.png" title="ALMACEN" /></h3>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                include "./plantillas/configuracion_error_sesion.php";
            }
            ?>
        </div>
    </div>
        
    <?php require_once "./plantillas/footer.php"; ?>
    
</body>
</html>