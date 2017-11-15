<!-- <?php 
session_start();

if (isset($_SESSION['usuario']))
{
	echo '<script>location.href="bienvenido.php";</script>';
}
else if (isset($_SESSION['bloqueado']))
{
	echo '<script>location.href="bloqueado.php";</script>';
}
?> -->
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Iniciar sesión</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script type="text/javascript" src="js/Sesiones.js"></script>
</head>
<body>
	<nav>
		<div class="nav-wrapper teal darken-4 center">
			<a href="principal.php" class="flow-text">INSTITUTO TECNOLÓGICO DE TIJUANA</a>
		</div>
	</nav>
	<br>

	<div class="container" style="width: 50%; box-shadow: 0px 0px 4px black;">
		<nav>
			<div class="nav-wrapper teal darken-4" style="border-radius: 4px;">
				<ul id="nav-mobile" class="centered">
					<a class="flow-text center">Iniciar sesíon</a>
				</ul>
			</div>
		</nav>
		<center style="padding:50px 10px;">
			<img class="materialboxed" data-caption="Instituto tecnológico de tijuana" width="35%" src="images/Tec1.png">
			<br>
			<form method="POST" id="form-sesion">
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input id="num_control" type="number" min ="10000000" max="99999999" class="validate" required>
						<label for="num_control">Número de control</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">email</i>
						<input id="email" type="email" class="validate" minlength="12" required>
						<label for="email">Correo electrónico</label>
					</div>
				</div>
				<button class="btn waves-effect waves-light teal darken-4 right" type="submit" name="action" style="border-radius: 4px;" onclick="sesion_Alumno(); return false;">
					Iniciar ahora
					<i class="material-icons right">send</i>
				</button>
				<!-- <div class="valign-wrapper">
					<a href="recuperar_contra.php" onclick="f_recuperar();" style="color:#004d40;">Recuperar contraseña</a>
				</div> -->
			</form>
		</center>
		<div class="footer-copyright center teal darken-4" style="padding:10px 0px; style="border-radius: 4px;">
			<div class="container" style ="width:100%; color: white;">
				© 2017 Instituto Tecnológico de Tijuana
			</div>
		</div>	
	</div>
</body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>$(document).foundation();</script>
