<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listados</title>
    <!-- GENERICOS -->
    <link rel="stylesheet" type="text/css" href="./css/ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/jquery-ui.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
		
    <!-- PROPIOS -->
    <link rel="stylesheet" type="text/css" href="./css/estilos.css" />      
    <script type="text/javascript" src="./js/footer.js"></script>
	<script type="text/javascript" src="./js/listados.js"></script>
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
                    <img src="images/listados512.png" alt="listados" title="LISTADOS" width="120" height="120">
                    <h1 class="img-title">LISTADOS</h1>
                </div>
                <div class="col-md-10">
                    <?php
                    if (isset($_SESSION['id_usuario'])){
                        if (!$_POST){
                            ?>
					<div class="tabbable">
						<ul class="nav nav-tabs" id="myTab">
							<li><a href="#" id="anclaClientes">CLIENTES</a></li>
							<li><a href="#" id="anclaMascotas">MASCOTAS</a></li>
							<li><a href="#" id="anclaArticulos">ARTICULOS</a></li>
						</ul>
                        <div class="tab-content">
							<div class="listados-content"><?php
                                include "./plantillas/listados_form_cliente.php";
                                include "./plantillas/listados_form_mascota.php";
                                $proveedores=Proveedor::get_proveedores();
                                $categorias=Categoria::get_categorias();
                                include "./plantillas/listados_form_articulo.php";
                            ?></div>
                        </div>
                    </div><?php
                        } elseif (isset($_POST['buscar_clientes'])){
                            $resultados=Listado::clientes($_POST);
                            if (count($resultados)!=0){
                                include "./plantillas/listados_clientes_listado.php";
                            } else {
                                include "./plantillas/listados_error_busqueda.php";
                            }
                        } elseif (isset($_POST['buscar_mascotas'])){
                            $resultados=Listado::mascotas($_POST);
                            if (count($resultados)!=0){
                                include "./plantillas/listados_mascotas_listado.php";
                            } else {
                                include "./plantillas/listados_error_busqueda.php";
                            }
                        } elseif (isset($_POST['buscar_articulos'])){
                            $resultados=Listado::articulos($_POST);
                            if (count($resultados)!=0){
                                include "./plantillas/listados_articulos_listado.php";
                            } else {
                                include "./plantillas/listados_error_busqueda.php";
                            }
                        } 
                    } else {
                        include "./plantillas/error_sesion.php";
                    }
                ?>
                </div><!-- listados-content -->
            </div><!-- row -->
        </div><!-- container -->
        <div class="clearfix"></div>
    </div><!-- main-content -->
    <?php require_once "./plantillas/footer.php"; ?>
</body>
</html>