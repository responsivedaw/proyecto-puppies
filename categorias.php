<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorias</title>
    <!-- GENERICOS -->
    <link rel="stylesheet" type="text/css" href="./css/ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/jquery-ui.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <!-- PROPIOS -->
    <link rel="stylesheet" type="text/css" href="./css/estilos.css" />
    <script type="text/javascript" src="./js/jquery.form-validator.min.js"></script>    
    <script type="text/javascript" src="./js/categorias.js"></script>    
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
						<img src="images/categorias512.png" alt="caegorias" title="categorias" width="120" height="120">
						<h1 class="img-title">CATEGORIAS</h1>
					</div>
					<div class="col-md-10 categorias-content">
					<?php
						if (isset($_SESSION['id_usuario'])){
							if (!$_POST){
								if(isset($_GET['visualizar'])){
									$resultados=Categoria::buscar_categoria($_GET['id_categoria']);
									$datos=$resultados[0]; //Array
									include "./plantillas/categorias_form_categoria.php";					
								}elseif (isset($_GET['borrar'])){
									$resultados=Categoria::borrar_categoria($_GET['id_categoria']);
									$insertado=$_GET['id_categoria'];
									$datos=$resultados[0];
									//Borramos categoria
									Categoria::borrar_categoria($_GET['id_categoria']);
									require "./plantillas/categorias_vista_categoria.php";
								}else{
									require "./plantillas/categorias_form_categoria.php";
								}
							} elseif (isset($_POST['alta'])){
								$categoria=new Categoria($_POST);
								if ($categoria->validar_categoria()){
									$insertado=$categoria->insertar_categoria();
									$datos=$categoria->to_array();
									require "./plantillas/categorias_vista_categoria.php";
								} else {
									require "./plantillas/categorias_error_validacion.php";
								}
							} elseif (isset($_POST['buscar'])){
								$resultados=Categoria::buscar_categoria($_POST);
								if (count($resultados)!=0){
									include "./plantillas/categorias_lista_categorias.php";
								} else {
									include "./plantillas/categorias_error_busqueda.php";
								}
							} elseif (isset($_POST['modificar'])){
								$categoria=new Categoria($_POST);
								if ($categoria->validar_categoria()){
									$categoria->modificar_categoria();
									$datos=$categoria->to_array();				
									require "./plantillas/categorias_vista_categoria.php";
								} else {
									require "./plantillas/categorias_error_validacion.php";
								}
							}
						}else {
							require "./plantillas/error_sesion.php";
						}
					?>
					</div> <!-- articulos-content -->
				</div><!-- row -->
			</div><!-- container -->
			<div class="clearfix"></div>
		</div><!-- main-content -->
	<?php require_once "./plantillas/footer.php"; ?>
</body>
</html>