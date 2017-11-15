<?php 
session_start();
if (isset($_SESSION['usuario']))
{
	echo '<script>location.href="bienvenido.php";</script>';
}
?>
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
			<a href="login.php" class="flow-text">INSTITUTO TECNOLÓGICO DE TIJUANA</a>
		</div>
	</nav>
	<br>

	<div class="container" style="width: 50%; box-shadow: 0px 0px 4px black;">
		<nav>
			<div class="nav-wrapper teal darken-4" style="border-radius: 4px;">
				<ul id="nav-mobile" class="centered">
					<a class="flow-text center">Recuperar contraseña</a>
				</ul>
			</div>
		</nav>
		<center style="padding:50px 10px;">
			<img class="materialboxed" data-caption="Instituto tecnológico de tijuana" width="35%" src="images/Tec1.png">
			<br>
			<form>
				<div class="row">
					<div class="input-field col s6">
						<i class="material-icons prefix">account_circle</i>
						<input id="usuario" type="text" class="validate" required>
						<label for="usuario">Usuario</label>
					</div>
					<div class="input-field col s6">
						<i class="material-icons prefix">email</i>
						<input id="correo" type="email" class="validate" required>
						<label for="correo">Correo Electronico</label>
					</div>
				</div>
				<button class="btn waves-effect waves-light teal darken-4 right" type="submit" name="action" style="border-radius: 4px;" onclick="f_Recuperar(); return false;">
					Recuperar
					<i class="material-icons right">send</i>
				</button>
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

<script>
	function f_Recuperar(){
		var usuario = document.getElementById("usuario").value;
		var correo= document.getElementById("correo").value;

		var params = {usuario:usuario, correo:correo};
		
		$.ajax({
			url:'enviarCorreo.php',
			type: 'POST',
			data: params,
			success: function(resp){
				if(resp == "Correcto"){
					alert(resp);
				}else
				{
					alert(resp);
				}
			}
		});
	}
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>$(document).foundation();</script>
