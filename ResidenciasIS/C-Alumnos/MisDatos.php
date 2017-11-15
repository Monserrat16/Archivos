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
<body onload="cargar_datos()">
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
	<div class="container " style="width: 100%; box-shadow: 0px 0px 10px black;">
		<br>
		<h4 class="center">MI INFORMACIÓN</h4>
		<div class="row" style="padding: 0px 40px;">
			<form action="accionesCoordinador.php" method="POST">
				<div class="row">
					<div class="input-field col s3">
						<i class="material-icons prefix">vpn_key</i>
						<input id="Matricula" type="number" class="validate" required disabled="true">
					</div>
					<div class="input-field col s9">
						<i class="material-icons prefix">account_circle</i>
						<input id="Nombre" type="text" class="validate" required disabled="true">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">short_text</i>
						<input id="ApellidoPa" type="text" class="validate" required disabled="true">
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">short_text</i>
						<input id="ApellidoMa" type="text" class="validate" required disabled="true">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">phone</i>
						<input id="Telefono" type="tel" class="validate" required disabled="true">
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">home</i>
						<input id="Direccion" type="text" class="validate" required disabled="true">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">date_range</i>
						<input id="Edad"  type="number"  min="20" max="21" class="validate" name="" required disabled="true">
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">accessibility</i>
						<input id="Sexo" type="text" class="validate" required disabled="true">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s4">
						<i class="material-icons prefix">school</i>
						<input id="Semestre" type="number"  min="10" max="13" class="validate" required disabled="true">
					</div>
					<div class="input-field col s4">
						<i class="material-icons prefix">school</i>
						<input id="Carrera" type="text" class="validate" required disabled="true">
					</div>
					<div class="input-field col s4">
						<i class="material-icons prefix">email</i>
						<input id="Email" type="email" class="validate" required disabled="true">
					</div>
				</div>
   <!--    <button id="btn_guardar" class="btn waves-effect waves-light teal darken-4 right" type="submit" name="action" style="border-radius: 4px;" onclick="f_agregarAlumno(); return false" disabled="true">
        Guardar alumno
        <i class="material-icons right">send</i>
    </button> -->
</form>
</div>
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
<script src="../js/ajaxAlumno.js"></script>
<script>$(document).foundation();</script>