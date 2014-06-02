<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MASCOTAS - PUPPIES S.L.</title>
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
    <script type="text/javascript" src="./js/mascotas.js"></script>    
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
                    <img src="images/mascotas512.png" alt="mascotas" title="MASCOTAS" width="120" height="120">
                    <h1 class="img-title">MASCOTAS</h1>
                </div>
                <div class="col-md-10 clientes-content">
                    <?php
                    if (isset($_SESSION['id_usuario'])){
                        if (!$_POST){
                            if (isset($_GET['visualizar'])){
                                // Despues de mostrar los resultados, llegamos con el id seleccionado.
                                $mascotas=Mascota::buscar($_GET['id_mascota']);
                                $mascota=$mascotas[0];
                                include "./plantillas/mascotas_form_mascota.php";
                            } elseif (isset($_GET['borrar'])){
                                // Recuperamos datos antes de eliminarlo para visualizarlo.
                                $mascotas=Mascota::buscar($_GET['id_mascota']);
                                //$ult_mascota=$_GET['id_mascota'];
                                $datos=$mascotas[0];
                                //Borramos cliente
                                Mascota::borrar($_GET['id_mascota']);
                                include "./plantillas/mascotas_ficha_mascota.php";
                            } else {
                                include "./plantillas/mascotas_form_mascota.php";
                            }                    
                        } elseif (isset($_POST['alta'])){
                            //var_dump($_POST);
                            //var_dump($_FILES);
                            // Instanciamos cliente con los datos recibidos del POST
                            $mascota=new Mascota($_POST);
                            //var_dump($mascota);
                            if ($mascota->validar()){
                                $ult_mascota=$mascota->insertar();
                                // Recibimos las propiedades del objeto en una array asociativo pq los atributos con privados.
                                $datos=$mascota->to_array();
                                include "./plantillas/mascotas_ficha_mascota.php";
                            } else {
                                include "./plantillas/mascotas_error_validacion.php";
                            }
                        } elseif (isset($_POST['buscar'])){
                            //var_dump($_POST);
                            $mascotas=Mascota::buscar($_POST);
                            if (sizeof($mascotas)==0){
                                include "./plantillas/mascotas_error_busqueda.php";
                            } else {
                                include "./plantillas/mascotas_listado_mascotas.php";
                            }
                        } elseif (isset($_POST['modificar'])){
                            $mascota=new Mascota($_POST);
                            if ($mascota->validar()){
                                $ult_mascota=$mascota->modificar();
                                $datos=$mascota->to_array();
                                include "./plantillas/mascotas_ficha_mascota.php";
                            } else {
                                include "./plantillas/mascotas_error_validacion.php";
                            }                    
                        }
                    } else {
                        include "./plantillas/error_sesion.php";
                    }
                ?>
                </div><!-- clientes-content -->
            </div><!-- row -->
        </div><!-- container -->
        <div class="clearfix"></div>
    </div><!-- main-content -->
    <?php require_once "./plantillas/footer.php"; ?>
</body>
</html>