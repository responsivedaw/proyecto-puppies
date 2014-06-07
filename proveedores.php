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
	<script type="text/javascript" src="./js/proveedores.js"></script> 
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
						<img src="images/proveedores512.png" alt="proveedores" title="proveedores" width="120" height="120">
						<h1 class="img-title">PROVEEDORES</h1>
					</div>
					<div class="col-md-10 proveedores-content">
					<?php
						if (isset($_SESSION['id_usuario'])){
							if (!$_POST){
								if(isset($_GET['visualizar'])){
									$resultados=Proveedor::buscar_proveedor($_GET['id_proveedor']);
									$datos=$resultados[0]; //Array
									include "./plantillas/proveedores_form_proveedor.php";
								}elseif (isset($_GET['borrar'])){
									$resultados=Proveedor::buscar_proveedor($_GET['id_proveedor']);
									$insertado=$_GET['id_proveedor'];
									$datos=$resultados[0];
									Proveedor::borrar_proveedor($_GET['id_proveedor']);
									require "./plantillas/proveedores_vista_proveedor.php";
								}else{
									//FALTA ATRIBUTO LOCALIDADES???
									require "./plantillas/proveedores_form_proveedor.php";
								}
							} elseif (isset($_POST['alta'])){
								$proveedor=new Proveedor($_POST);
								if ($proveedor->validar_proveedor()){
									$insertado=$proveedor->insertar_proveedor();
									$datos=$proveedor->to_array();
									require "./plantillas/proveedores_vista_proveedor.php";
								} else {
									require "./plantillas/proveedores_error_validacion.php";
								}
							} elseif (isset($_POST['buscar'])){
								$resultados=Proveedor::buscar_proveedor($_POST);
								if (count($resultados)!=0){
									include "./plantillas/proveedores_lista_proveedores.php";
								} else {
									include "./plantillas/proveedores_error_busqueda.php";
								}
							} elseif (isset($_POST['modificar'])){
								$proveedor=new Proveedor($_POST);
								if ($proveedor->validar_proveedor()){
									$proveedor->modificar_proveedor();
									$datos=$proveedor->to_array();
									//FALTA ATRIBUTO LOCALIDADES???			
									require "./plantillas/proveedores_vista_proveedor.php";
								} else {
									require "./plantillas/proveedores_error_validacion.php";
								}
							}
						}else {
							require "./plantillas/error_sesion.php";
						}
					?>
					</div> <!-- proveedores-content -->
				</div><!-- row -->
			</div><!-- container -->
			<div class="clearfix"></div>
		</div><!-- main-content -->
	<?php require_once "./plantillas/footer.php"; ?>
</body>
</html>