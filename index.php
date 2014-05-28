<?php
	if ($_POST){
		require_once "./includes/database_functions.php";
		$autenticado=usuario_autenticado($_POST['usuario'],$_POST['pwd_usuario']);
		//var_dump($autenticado);
		if ($autenticado){
			session_start();
			$_SESSION['id_usuario']=$autenticado['id_usuario'];
			$_SESSION['nombre_usuario']=$autenticado['nombre_usuario'];
			$_SESSION['id_perfil']=$autenticado['id_perfil'];
			//var_dump($_SESSION);
			header("Location: ./home.php");
			// Hacemos la redireccion al principio porque no funciona bien en el hosting.
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN PHP</title>
    <!-- GENERICOS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/jquery.form-validator.min.js"></script>
    <!-- PROPIOS -->
    <link rel="stylesheet" type="text/css" href="./css/estilos.css" />
	<script type="text/javascript" src="./js/index.js"></script>
</head>
<body class="bg-no-autenticado">
	<div class="main-content">
		<div class="container">
			<div class="row">
			<div class="form-login col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
				<div class="login-logo">
					<img src="./images/puppies_256x181.png" alt="puppies-logo-256" title="PUPPIES S.L." />
				</div>
				
				<?php if (isset($autenticado) && !$autenticado): ?>
				<div class="form-error alert alert-danger">
					<p><strong>ERROR DE AUTENTICACIÓN !!</strong></p>
					<p>El usuario y/o la contraseña no son correctos.</p>
				</div>
				<?php endif; ?>				
				
				<form action="" name="login" id="login" role="form" method="post">
					<div class="form-group">
						<label for="usuario">Email:</label>
						<input type="email" name="usuario" id="usuario" placeholder="Introduce un email" class="form-control" data-validation="email" data-validation-error-msg="Debes introducir un email correcto!!" />
					</div>
					<div class="form-group">
						<label for="pwd_usuario">Contraseña:</label>
						<input type="password" name="pwd_usuario" id="pwd_usuario" placeholder="************" class="form-control" data-validation="length" data-validation-length="5-20" data-validation-help="Introduce una contraseña entre 5 y 20 caracteres." data-validation-error-msg="La contraseña no tiene la longitud correcta!!" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary center-block"><i class="fa fa-sign-in fa-lg"></i>&nbsp;&nbsp;ENTRAR</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>	
</body>
</html>