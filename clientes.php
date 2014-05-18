<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- GENERICOS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <!-- PROPIOS -->
    <link rel="stylesheet" type="text/css" href="./css/estilos.css" />
    <script type="text/javascript" src="./js/footer.js"></script>
    <!--PHP-->
    <?php require_once "./includes/functions.php"; ?>
    <?php require_once "./includes/database_functions.php"; ?>
    <?php ?>
    <?php session_start(); ?>
    <?php $_SESSION['id_usuario']=2; ?>
</head>
<body>
    <?php require_once "./plantillas/header.php"; ?>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 img-form">
                    <!-- IMAGEN REPRESENTATIVA DEL SITIO EN EL QUE ESTAMOS -->
                    <img src="images/clientes512.png" alt="clientes" title="CLIENTES" width="120" height="120">
                    <h1 class="img-title">CLIENTES</h1>
                </div>
                <div class="col-md-10 clientes-content">
                    <?php
                    if (isset($_SESSION['id_usuario'])){
                        if (!$_POST){
                            if (isset($_GET['visualizar'])){
                                // Despues de mostrar los resultados, llegamos con el id seleccionado.
                                $resultados=Cliente::buscar($_GET['id_cliente']);
                                $cliente=$resultados[0];
                                include "./plantillas/clientes_form_cliente.php";
                            } elseif (isset($_GET['borrar'])){
                                //var_dump($_GET);
                                // Recuperamos datos antes de eliminarlo para visualizarlo.
                                $resultados=Cliente::buscar($_GET['id_cliente']);
                                //var_dump($resultados);
                                $ult_cliente=$_GET['id_cliente'];
                                $datos=$resultados[0];
                                //Borramos cliente
                                Cliente::borrar($_GET['id_cliente']);
                                include "./plantillas/clientes_ficha_cliente.php";
                            } else {
                                include "./plantillas/clientes_form_cliente.php";
                            }                    
                        } elseif (isset($_POST['alta'])){
                            // Instanciamos cliente con los datos recibidos del POST
                            $cliente=new Cliente($_POST);
                            //var_dump($cliente);
                            if ($cliente->validar()){
                                $ult_cliente=$cliente->insertar();
                                // Recibimos las propiedades del objeto en una array asociativo.
                                $datos=$cliente->to_array();
                                //var_dump($datos);
                                include "./plantillas/clientes_ficha_cliente.php";
                            } else {
                                include "./plantillas/clientes_error_validacion.php";
                            }
                        } elseif (isset($_POST['buscar'])){
                            $resultados=Cliente::buscar($_POST);
                            if (sizeof($resultados)==0){
                                ?>
                                <div class="jumbotron">
                                    <div class="container">
                                        <h2>RESULTADOS:</h2>
                                        <p>Su búsqueda no devuelve resultados.</p>
                                        <p><a class="btn btn-primary btn-lg" href="./clientes.php" role="button">VOLVER</a></p>
                                    </div>
                                </div>
                                <?php
                            } else {
                                include "./plantillas/clientes_listado_clientes.php";
                            }
                        } elseif (isset($_POST['modificar'])){
                            //var_dump($_POST);
                            $cliente=new Cliente($_POST);
                            echo "<hr/>";
                            //var_dump($cliente);
                            if ($cliente->validar()){
                                //echo 'validado';
                                $ult_cliente=$cliente->modificar();
                                $datos=$cliente->to_array();
                                include "./plantillas/clientes_ficha_cliente.php";
                            } else {
                                //echo 'no validado';
                                include "./plantillas/clientes_error_validacion.php";
                            }                    
                        }
                    } else {
                        ?>
                        <div class="mensaje-error">
                            <p>DEBE INICIAR SESIÓN PARA ACCEDER A LA APLICACIÓN.</p>
                            <a href="index.php" title="Ir a INICIO" class="btn btn-info">INICIAR<br/>SESIÓN</a>
                        </div>
                        <?php
                    }
                ?>
                </div><!-- clientes-content -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- main-content -->
    <?php require_once "./plantillas/footer.php"; ?>
</body>
</html>