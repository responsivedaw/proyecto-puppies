<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
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
    <script type="text/javascript" src="./js/articulos.js"></script>    
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
						<img src="images/articulos512.png" alt="articulos" title="articulos" width="120" height="120">
						<h1 class="img-title">ARTICULOS</h1>
					</div>
					<div class="col-md-10 clientes-content">
					<?php
						if (isset($_SESSION['id_usuario'])){
							if (!$_POST){
								if(isset($_GET['visualizar'])){
									$resultados=Articulo::buscar_articulo($_GET['id_articulo']);
									$datos=$resultados[0]; //Array
									$proveedores=Proveedor::get_proveedores();
									$categorias=Categoria::get_categorias();
									include "./plantillas/articulos_form_articulo.php";					
								}elseif (isset($_GET['borrar'])){
									$resultados=Articulo::borrar_articulo($_GET['id_articulo']);
									$insertado=$_GET['id_articulo'];
									$id_categoria=$_GET['id_categoria'];
									$categoria=Categoria::get_categoria($id_categoria);
									$id_proveedor=$_GET['id_proveedor'];
									$proveedor=Proveedor::get_proveedor($id_proveedor);
									$datos=$resultados[0];
									//Borramos articulo
									Articulo::borrar_articulo($_GET['id_articulo']);
									require "./plantillas/articulos_vista_articulo.php";
								}else{
									$proveedores=Proveedor::get_proveedores();
									$categorias=Categoria::get_categorias();
									require "./plantillas/articulos_form_articulo.php";
								}
							} elseif (isset($_POST['alta'])){
								$articulo=new Articulo($_POST);
								if ($articulo->validar_articulo()){
									$insertado=$articulo->insertar_articulo();
									$datos=$articulo->to_array();
									$id_categoria=$_POST['id_categoria'];
									$categoria=Categoria::get_categoria($id_categoria);
									$id_proveedor=$_POST['id_proveedor'];
									$proveedor=Proveedor::get_proveedor($id_proveedor);
									require "./plantillas/articulos_vista_articulo.php";
								} else {
									require "./plantillas/articulos_error_validacion.php";
								}
							} elseif (isset($_POST['buscar'])){
								$resultados=Articulo::buscar_articulo($_POST);
								if (count($resultados)!=0){
									include "./plantillas/articulos_lista_articulos.php";
								} else {
									include "./plantillas/articulos_error_busqueda.php";
								}
							} elseif (isset($_POST['modificar'])){
								$articulo=new Articulo($_POST);
								if ($articulo->validar_articulo()){
									$articulo->modificar_articulo();
									$datos=$articulo->to_array();
									$id_categoria=$_POST['id_categoria'];
									$categoria=Categoria::get_categoria($id_categoria);
									$id_proveedor=$_POST['id_proveedor'];
									$proveedor=Proveedor::get_proveedor($id_proveedor);					
									require "./plantillas/articulos_vista_articulo.php";
								} else {
									require "./plantillas/articulos_error_validacion.php";
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