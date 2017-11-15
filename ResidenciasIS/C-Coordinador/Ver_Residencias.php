<?php 
include './../bdconfig.php';

session_start();
if (!isset($_SESSION['coordinador']))
{
	echo '<script>location.href="../principal.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de alumnos</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<ul id="dropdown2" class="dropdown-content">
		<li><a href="lista_alumnos.php">Alumnos</a></li>
	</ul>
	<ul id="dropdown3" class="dropdown-content">
		<li><a href="Iniciar_Residencia.php">Iniciar residencia</a></li>
		<li><a href="Continuar_Residencia.php">Continuar residencia</a></li>
		<li><a href="Ver_Residencias.php">Ver residencia</a></li>
	</ul>
	<ul id="dropdown4" class="dropdown-content">
		<li><a href="">Configuración de la cuenta</a></li>
		<li><a href="../logout.php">Salir</a></li>
	</ul>
	<nav>
		<div class="nav-wrapper teal darken-4">
			<a href="index.php" class="flow-text">INSTITUTO TECNOLÓGICO DE TIJUANA</a>
			<ul class="right ">
				<li><a href="index.php">Inicio</a></li>
				<!-- Dropdown Trigger -->
				<li><a class="dropdown-button" href="#!" data-activates="dropdown2">Mostrar<i class="material-icons right">
				arrow_drop_down</i></a></li>
				<li><a class="dropdown-button" href="#!" data-activates="dropdown3">Residencias<i class="material-icons right">
				arrow_drop_down</i></a></li>
				<li><a class="dropdown-button" href="#!" data-activates="dropdown4">Mi Cuenta<i class="material-icons right">
				arrow_drop_down</i></a></li>
			</ul>
		</div>
	</nav>
	<br>
	<div class="container " style="width: 110%; box-shadow: 0px 0px 4px black">
		<div class="row" style="padding: 15px 40px;"> 
			<div class="row">
				<?php 
				if ($conexion->connect_errno) {
					printf("Conexión fallida: %s
						", $conexion->connect_error);
					exit();
				}

				$sql = "select idProyecto, nombre, matricula, tipo, usuario from proyectos;";
				$resultado = mysqli_query($conexion,$sql);

				$i = 0 ;

				while ($row = mysqli_fetch_row($resultado)){
					echo "
					<div class='col s4'>
					<div class='card horizontal' style='border-radius: 5px; box-shadow: 0px 0px 10px #004d40;'>
					<div class='card-image'>
					<img src='../images/Tec2.png'>
					</div>
					<div class='card-stacke'>
					<div class='card-content'>
					<p>Id: ".$row[0]."</p>
					<p>Nombre: ".$row[1]."</p>
					<p>Matricula: ".$row[2]."</p>
					<p>Tipo: ".$row[3]."</p>
					<p>Dio alta: ".$row[4]."</p>
					</div>
					</div>
					</div>
					</div>";
					$i++;
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>
<script src="../js/ajaxCoordinador.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="../js/vendor/jquery.js"></script>
<script src="../js/foundation.min.js"></script>
<script>$(document).foundation();</script>