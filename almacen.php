<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ALMACÉN - PUPPIES S.L.</title>
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
            <div class="row">
                <div class="col-md-2 img-form">
                    <!-- IMAGEN REPRESENTATIVA DEL SITIO EN EL QUE ESTAMOS -->
                    <img src="images/almacen512.png" alt="almacen512.png" title="ALMACÉN" width="120" height="120">
                    <h1 class="img-title">ALMACÉN</h1>
                </div>
                <div class="col-md-10 almacen-content">
                    <?php
                    if (isset($_SESSION['id_usuario'])){
                        ?>
                        <div class="home-btns">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2 col-xs-3 col-xs-offset-2 home-btn">
                                    <a href="./articulos.php"><img src="./images/articulos512.png" alt="articulos512.png" title="ARTÍCULOS" /></a>
                                    <h3>ARTÍCULOS</h3>
                                </div>
                                <div class="col-md-3 col-md-offset-2 col-xs-3 col-xs-offset-2 home-btn">
                                    <a href="./categorias.php"><img src="./images/categorias512.png" alt="categorias512.png" title="CATEGORÍAS" /></a>
                                    <h3>CATEGORÍAS</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row col-md-6 col-md-offset-3">
                                    <div class="col-md-6 col-md-offset-3 col-xs-3 col-xs-offset-2 home-btn">
                                        <a href="./proveedores.php"><img src="./images/proveedores512.png" alt="proveedores512.png" title="PROVEEDORES" /></a>
                                        <h3>PROVEEDORES</h3>
                                    </div>
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
        </div>
    </div>
        
    <?php require_once "./plantillas/footer.php"; ?>
    
</body>
</html>