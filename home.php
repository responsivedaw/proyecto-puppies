<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME - PUPPIES S.L.</title>
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
            if (isset($_SESSION['id_usuario'])){
                ?>
                <div class="home-btns">
                    <div class="row">
                        <div class="col-md-2 col-md-offset-2 col-xs-3 col-xs-offset-2 home-btn">
                            <a href="./clientes.php"><img src="./images/clientes512.png" alt="clientes512.png" title="CLIENTES" /></a>
                            <h3>CLIENTES</h3>
                        </div>
                        <div class="col-md-2 col-md-offset-1 col-xs-3 col-xs-offset-2 home-btn">
                            <a href="./mascotas.php"><img src="./images/mascotas512.png" alt="mascotas512.png" title="MASCOTAS" /></a>
                            <h3>MASCOTAS</h3>
                        </div>
                        <div class="col-md-2 col-md-offset-1 col-xs-3 col-xs-offset-2 home-btn">
                            <a href="./almacen.php"><img src="./images/almacen512.png" alt="almacen512.png" title="ALMACÉN" /></a>
                            <h3>ALMACÉN</h3>
                        </div>
                        <div class="col-md-2 col-md-offset-2 col-xs-3 col-xs-offset-2 home-btn disabled">
                            <a href="./images/prototipos/facturacion.jpg" target="_blank"><img src="./images/facturacion512.png" alt="facturacion512.png" title="FACTURACIÓN" /></a>
                            <h3>FACTURACIÓN</h3>
                        </div>
                        <div class="col-md-2 col-md-offset-1 col-xs-3 col-xs-offset-2 home-btn">
                            <a href="./agenda.php"><img src="./images/agenda512.png" alt="agenda512.png" title="AGENDA" /></a>
                            <h3>AGENDA</h3>
                        </div>
                        <div class="col-md-2 col-md-offset-1 col-xs-3 col-xs-offset-2 home-btn">
                            <a href="./listados.php"><img src="./images/listados512.png" alt="listados512.png" title="LISTADOS" /></a>
                            <h3>LISTADOS</h3>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                include "./plantillas/clientes_error_sesion.php";
            }
            ?>
        </div>
    </div>
        
    <?php require_once "./plantillas/footer.php"; ?>
    
</body>
</html>