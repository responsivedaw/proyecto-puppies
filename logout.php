<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGOUT - PUPPIES S.L.</title>
    <!-- GENERICOS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css" />
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <!-- PROPIOS -->
    <link rel="stylesheet" type="text/css" href="./css/estilos.css" />
	<?php session_start(); session_destroy(); ?>
</head>
<body class="bg-autenticado">
    
 	<div class="main-content">
		<div class="container">
            <?php if (isset($_SESSION['id_usuario'])){ ?>
            <div class="row">
			<div class="session-logout col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
				<div class="login-logo">
					<img src="./images/puppies_256x181.png" alt="puppies-logo-256" title="PUPPIES S.L." />
				</div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-info-circle fa-lg"></i> HA SALIDO CORRECTAMENTE DE LA APLICACIÓN <i class="fa fa-info-circle fa-lg"></i></div>
                    <div class="panel-body">
                        <p>Para volver a entrar en la aplicación pulsando en el enlace.</p>
                        <p><a href="index.php" title="Ir a INICIO" class="btn btn-primary">INICIO</a></p>
                    </div>
                </div>
			</div>
			</div>
            <?php } else {
                include "./plantillas/clientes_error_sesion.php";
            } ?>
		</div>
	</div>
    
</body>
</html>