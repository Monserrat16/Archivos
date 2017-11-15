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
</head>
<body>
	<nav>
		<div class="nav-wrapper teal darken-4 center">
			<a href="" class="flow-text center">INSTITUTO TECNOLÓGICO DE TIJUANA</a>
		</div>
	</nav>
	<br>

	<div class="container" style="width: 50%; box-shadow: 0px 0px 4px black;">
		<div class="footer-copyright center teal darken-4" style="padding:10px 0px; style="border-radius: 4px;">
			<div class="container" style ="width:100%; color: white;">
				INICIAR SESIÓN COMO
			</div>
		</div>	
		<center style="padding-bottom: 30px; padding-top: 30px;">
			<a href="iniciar-alumno.php" class="waves-effect btn-large teal-text text-darken-4 N/A transparent z-depth-3"><i class="material-icons right">person_pin_circle</i>Alumno</a>
			<br><br>
			<a href="iniciar-asesor.php" class="waves-effect btn-large teal-text text-darken-4 N/A transparent z-depth-3"><i class="material-icons right">school</i>Asesores</a>
			<br><br>
			<a href="iniciar-coordinador.php" class="waves-effect btn-large teal-text text-darken-4 N/A transparent z-depth-3"><i class="material-icons right">school</i>Coordinador</a>
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
