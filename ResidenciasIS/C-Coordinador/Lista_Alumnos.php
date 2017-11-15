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
		<nav>
			<div class="nav-wrapper teal darken-4" style="border-radius: 4px;">
				<ul id="nav-mobile" class="centered ">
					<a class="flow-text center">Lista de alumnos</a>
				</ul>
			</div>
		</nav>
		<table id="tabla_alumnos" class="responsive-table">
			<thead>
				<tr>
					<th>Matricula</th>
					<th>Nombre</th>
					<th>A. Paterno</th>
					<th>A. Materno</th>
					<th>Email</th>
					<th>Semestre</th>
					<th>Usuario</th>
					<th>Fecha Alta</th>
					<th>Carrera</th>
					<th></th>
					<th></th>
				</tr>
			</thead>

			<tbody id="tbody">

				<?php 
				if ($conexion->connect_errno) {
					printf("Conexión fallida: %s
						", $conexion->connect_error);
					exit();
				}

				$sql = "select Matricula, Nombre, apellidoPa, apellidoMa, Email, Semestre, Usuario, fecha_alta, (select nombre from carrera where idcarrera = a.idcarrera) from alumno a where estado_residencia = 'True' order by fecha_alta DESC;";
				$resultado = mysqli_query($conexion,$sql);

				$i = 0 ;

				while ($row = mysqli_fetch_row($resultado)){
					echo "<form action='Post'>
					<tr>
					<td><input type='text' id='matricula[$i]' value='".$row[0]."' disabled/></td>
					<td><input type='text' id='nombre[$i]' minlength='2' maxlength='30' required='true' value='".$row[1]."'/></td>
					<td><input type='text' id='paterno[$i]' minlength='2' maxlength='30' required='true' value='".$row[2]."'/></td>
					<td><input type='text' id='materno[$i]' minlength='2' maxlength='30' required='true' value='".$row[3]."'/></td>
					<td><input type='text' id='email[$i]' minlength='12' maxlength='100' required='true' value='".$row[4]."'/></td> 
					<td><input type='number' min='10' max='13' id='semestre[$i]'minlength='2' maxlength='30' required='true' value='".$row[5]."'/></td>
					<td><input type='text' id='usuario[$i]' value='".$row[6]."' disabled/></td>
					<td><input type='text' id='fecha_alta[$i]' value='".$row[7]."' disabled/></td>
					<td><input type='text' id='fecha_alta[$i]' value='".$row[8]."' disabled/></td>

					<td>
					<button 
					class='btn waves-effect waves-light blue darken-1 right'
					type='submit'
					onclick='f_modificarAlumno($i); return false;'>
					<i class='material-icons'>update</i>
					</button></td>
					<td>
					<button 
					class='btn waves-effect waves-light red right'
					type='submit'
					onclick='f_eliminarAlumno($i); return false;'>
					<i class='material-icons'>delete</i>
					</button>
					</td>
					</tr>
					</form>
					";
					$i++;
				}
				?>
			</tbody>
		</table>
		<div class="footer-copyright center teal darken-4" style="padding:10px 0px; style="border-radius: 4px;">
			<div class="container" style ="width:100%; color: white;">
				© 2017 Instituto Tecnológico de Tijuana
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