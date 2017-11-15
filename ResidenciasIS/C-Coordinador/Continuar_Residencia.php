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
		<div class="row" style="padding: 10px 40px;"> 
			<form method ="POST">
				<div class="row">
					<br>
					<P>Datos del alumno</P>
					<div class="input-field col s3">
						<i class="material-icons prefix">vpn_key</i>
						<input id="Matricula" type="number" onchange="f_alumnoValido()" class="validate" min="10000000" max="99999999" required>
						<label for="Matricula">Matricula del alumno</label>
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix">account_circle</i>
						<input id="Nombre" type="text" class="validate" required disabled="true">
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix">school</i>
						<input id="Carrera" type="text" class="validate" required disabled="true">
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix">date_range</i>
						<input id="Semestre" type="text" class="validate" required disabled="true">
					</div>
				</div>
				<div class="row" id="proyecto" style="visibility: hidden;">
					<P>Datos del proyecto</P>
					<div class="input-field col s3">
						<i class="material-icons prefix">vpn_key</i>
						<input id="Id_Proyecto" type="tel" class="validate" required disabled="true">
						<label id="lblTexto" for="Id_Proyecto">Id de residencia</label>
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix">home</i>
						<input id="NombreProyecto" type="text" class="validate" onchange="generar_id_residencia()" required>
						<label for="NombreProyecto">Nombre del proyecto</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">accessibility</i>
						<input id="TipoProyecto" type="text" class="validate" onchange="tipo_proyecto()" list= "lista_tipo" required>
						<label for="TipoProyecto">Tipo de proyecto (Interno|Externo)</label>
						<datalist id="lista_tipo">
							<option value="Interno"></option>
							<option value="Externo"></option>
						</datalist>
					</div>
				</div>
				<div class="row" id="asesores" style="visibility: hidden;">
					<P>Datos del asesor</P>
					<div class="input-field col s6" id="asesor_interno">
						<i class="material-icons prefix">person</i>
						<input id="AsesorInterno" type="text" class="validate" list= "lista_asesor_interno" required>
						<label for="AsesorInterno">Asesor interno</label>

						<datalist id="lista_asesor_interno">
							<option value="Maria Concepcion"></option>
							<option value="Alain"></option>
							<option value="Luz"></option>
							<option value="Liz"></option>
						</datalist>
					</div>
					<div class="input-field col s6" id="asesor_externo" style="visibility: hidden;">
						<i class="material-icons prefix">person</i>
						<input id="AsesorExterno" type="text" class="validate" list= "lista_asesor_externo" required>
						<label for="AsesorExterno">Asesor Externo</label>

						<datalist id="lista_asesor_externo">
							<option value="Cristian"></option>
							<option value="Maria"></option>
						</datalist>
					</div>
				</div>
				<div class="row" id="fechas" style="visibility: hidden;">
					<P>Fecha Inicio | Fecha Limite</P>
					<div class="input-field col s6" id="asesor_interno">
						<i class="material-icons prefix">date_range</i>
						<input id="FechaInicio" type="date" class="validate" min="2017-11-00" placeholder="Fecha inicio"  max="2017-12-31" required>
					</div>
					<div class="input-field col s6" id="asesor_externo">
						<i class="material-icons prefix">date_range</i>
						<input id="FechaFinal" type="date" class="validate" placeholder="Fecha Limite"  min="2017-11-00" max="2019-12-31" required>
					</div>
				</div>
				<button id="btn_guardar_residencia" class="btn waves-effect waves-light teal darken-4 right" type="submit" name="action" style="border-radius: 4px; visibility: hidden;" onclick="f_guardar_residencia(); return false">
					Guardar cambios
					<i class="material-icons right">send</i>
				</button>
			</div>
		</form>
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