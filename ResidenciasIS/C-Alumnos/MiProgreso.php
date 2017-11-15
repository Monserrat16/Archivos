
<?php 
session_start();

//se incluye la config dela base de datos
include'./../bdconfig.php';

if(isset($_POST['subirArchivo'])){
	$fileName = $_FILES['fileName']['name'];
	$noAvance = $_POST['noAvance'];
	$tempName = $_FILES['fileName']['tmp_name'];

	if(isset($fileName)){
		if(!empty($fileName)){
			$location = "Trabajos/". $_SESSION['alumno-matricula']."17/";
			
			if (!file_exists($location)) {
				mkdir($location, 0777, true);
			}

			if(move_uploaded_file($tempName, $location.$noAvance.$fileName)){

				$num ="";

				if($noAvance == "Avance 1 - "){
					$num = "1";
				}
				else if($noAvance == "Avance 2 - "){
					$num = "2";
				}
				else if($noAvance == "Avance 3 - "){
					$num = "3";
				}

				$sql="";

				if($_SESSION["tipo-residencia"] == "Interno"){
					$sql="UPDATE seguimiento_interno SET url_entrega_$num = '$location$noAvance$fileName',fecha_entrega_$num = '2017/11/14', edo_entrega_$num = 'Entregado' WHERE Matricula=".$_SESSION['alumno-matricula'];
					echo "<script>alert('Es interno');</script>";
				}else if($_SESSION["tipo-residencia"] == "Externo"){
					$sql="UPDATE seguimiento_externo SET url_entrega_$num = '$location$noAvance$fileName',fecha_entrega_$num = '2017/11/14', edo_entrega_$num = 'Entregado' WHERE Matricula=".$_SESSION['alumno-matricula'];
				}
				else{
					echo "<script>alert('No puedes realizar esta accion');</script>";
					return;
				}

				if($conexion->query($sql)===TRUE){
					echo "<script>alert('Se ha guardado el archivo'); location.href='MiProgreso.php'</script>";
				}else{
					echo"Error ";
				}
			}
			else{
				echo "<script>alert('No se guardo el archivo'); location.reload();</script>";
			}
		}
	}
}
?>

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
<body onload="cargar_mi_residencia()">
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
	<div class="container responsive" style="width: 100%; box-shadow: 0px 0px 4px black;">
		<div class="row" style="padding: 0px 40px;">
			<p id="mensaje" style="padding-top: 15px;">DATOS DEL PROYECTO</p>
			<div class="row">
				<div class="input-field col s2">
					<i class="material-icons prefix">vpn_key</i>
					<input id="IdProyecto" type="text" required disabled="true">
				</div>
				<div class="input-field col s4">
					<i class="material-icons prefix">info</i>
					<input id="NombreProyecto" type="text" class="validate" required disabled="true">
				</div>
				<div class="input-field col s3">
					<i class="material-icons prefix">person</i>
					<input id="IdAsesorInterno" type="text" class="validate" required disabled="true">
				</div>
				<div class="input-field col s3">
					<i class="material-icons prefix">person_outline</i>
					<input id="IdAsesorExterno" type="text" placeholder="No disponible" class="validate" required disabled="true">
				</div>
			</div>
			<p style="padding-top: 15px;">TAREAS DEL ALUMNO</p>
			<div class="row">
				<form action="MiProgreso.php" method="post" enctype="multipart/form-data">
					<input style="display: none;" type="text" name="noAvance" value="Avance 1 - ">
					<div class="file-field input-field col s7">
						<div class="btn teal darken-4">
							<span>Archivo</span>
							<input type="file" name="fileName" id="Avance 1">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" id="NombreEntrega1" type="text"  placeholder="Presiona aqui para cargar el archivo">
						</div>
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix">forum</i>
						<input id="Estado1" type="text" placeholder="Estado" class="validate" required disabled="true">
					</div>
					<div class="input-field col s2">
						<button class="btn waves-effect waves-light teal darken-4" type="submit" name="subirArchivo" id="btnEntrega1" value="Upload">Guardar
							<i class="material-icons right">save</i>
						</button>
					</div>
				</form>
				<form action="MiProgreso.php" method="post" enctype="multipart/form-data">
					<input style="display: none;" type="text" name="noAvance" value="Avance 2 - ">
					<div class="file-field input-field col s7">
						<div class="btn teal darken-4">
							<span>Archivo</span>
							<input type="file" name="fileName" id="Avance2">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" id="NombreEntrega2" type="text"  placeholder="Presiona aqui para cargar el archivo">
						</div>
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix">forum</i>
						<input id="Estado2" type="text" placeholder="Estado" class="validate" required disabled="true">
					</div>
					<div class="input-field col s2">
						<button class="btn waves-effect waves-light teal darken-4" type="submit" name="subirArchivo" id="btnEntrega2" value="Upload">Guardar
							<i class="material-icons right">save</i>
						</button>
					</div>
				</form>
				<form action="MiProgreso.php" method="post" enctype="multipart/form-data">
					<input style="display: none;" type="text" name="noAvance" value="Avance 3 - ">
					<div class="file-field input-field col s7">
						<div class="btn teal darken-4">
							<span>Archivo</span>
							<input type="file" name="fileName" id="Avance3">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" id="NombreEntrega3" type="text"  placeholder="Presiona aqui para cargar el archivo">
						</div>
					</div>
					<div class="input-field col s3">
						<i class="material-icons prefix">forum</i>
						<input id="Estado3" type="text" placeholder="Estado" class="validate" required disabled="true">
					</div>
					<div class="input-field col s2">
						<button class="btn waves-effect waves-light teal darken-4" type="submit" name="subirArchivo" id="btnEntrega3" value="Upload">Guardar
							<i class="material-icons right">save</i>
						</button>
					</div>
				</form>
			</div>
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