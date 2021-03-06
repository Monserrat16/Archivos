<!-- <?php 
include './../bdconfig.php';

session_start();
if (!isset($_SESSION['alumno']))
{
	echo '<script>location.href="../principal.php";</script>';
}
?> -->

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Principal</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<ul id="dropdown1" class="dropdown-content">
		<li><a href="MiProgreso.php">Mi progreso</a></li>
		<li><a href="MisDatos.php">Mi información</a></li>
		<li><a href="../logout.php">Salir de la cuenta</a></li>
	</ul>
	<nav>
		<div class="nav-wrapper teal darken-4">
			<a href="index.php" class="flow-text">INSTITUTO TECNOLÓGICO DE TIJUANA</a>
			<ul class="right ">
				<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Menú de opciones<i class="material-icons right">
				arrow_drop_down</i></a></li>
			</ul>
		</div>
	</nav>
	<br>
	<div class="container" style="width: 100%; box-shadow: 0px 0px 4px black;">
		<nav>
			<div class="nav-wrapper teal darken-4" style="border-radius: 4px;">
				<ul id="nav-mobile" class="centered ">
					<a class="flow-text center">Punto digital</a>
				</ul>
			</div>
		</nav>
		<center style="padding:10px 0px;">
			<img class="materialboxed" data-caption="Instituto tecnológico de tijuana" width="30%" src="../images/Tec1.png">
			<?php 
				echo "<h4>Hola " . $_SESSION["alumno"]. " ". $_SESSION["alumno-apellido"]. " " . $_SESSION["alumno-matricula"]. "</h4>";
			 ?>
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
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="../js/vendor/jquery.js"></script>
<script src="../js/foundation.min.js"></script>
<script>$(document).foundation();</script>