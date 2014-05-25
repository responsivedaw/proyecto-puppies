<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN PHP</title>
	
    <!-- GENERICOS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery.form-validator.min.js"></script>
    <!-- PROPIOS -->
    <link rel="stylesheet" type="text/css" href="../css/estilos.css" />
	
	<style type="text/css">
		.form-login{
			background: #ffffff url('../images/pattern1.png');
			border-radius: 4px;
			box-shadow: 0px 0px 6px #262626;
		}
		.login-logo{
			text-align: center;
		}	
		.login-logo img{
			width: 225px;
			margin: 10px auto; 
		}
		.form-login form label{
			text-align: left;
		}
	</style>
</head>
<body class="bg-no-autenticado">
	<div class="main-content">
		<div class="container">
			<div class="row">
			<div class="form-login col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
				<div class="login-logo">
					<img src="../images/puppies_256x181.png" alt="puppies-logo-256" title="PUPPIES S.L." />
				</div>
				<form action="home.php" name="login" id="login" method="post">
					<div class="form-group">
						<label for="usuario">Email:</label>
						<input type="text" name="usuario" id="usuario" placeholder="Introduce un email" class="form-control" data-validation="email" data-validation-error-msg="Debes introducir un email correcto!!" />
					</div>
					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input type="password" name="password" id="password" placeholder="************" class="form-control" data-validation="length" data-validation-length="6-20" data-validation-help="Introduce una contraseña entre 6 y 20 caracteres." data-validation-error-msg="La contraseña no tiene la longitud correcta!!" />
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary center-block"><i class="fa fa-sign-in fa-lg"></i>&nbsp;&nbsp;ENTRAR</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$.each(['img/icon-fail.png', 'img/icon-ok.png'], function(i, imgSource) {
			$('<img />')
				.css({
					position : 'absolute',
					top: '-100px',
					left: '-100px'
				})
				.appendTo('body')
				.get(0).src = imgSource;
		});
		$(document).ready(function(){
			$.validate({
				form : '#login',
				scrollToTopOnError: true,
				validateOnBlur: true,
				errorMessagePosition: 'top'
			});
		});
	</script>
	
</body>
</html>