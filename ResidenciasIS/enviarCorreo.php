<?php

require(‘class.phpmailer.php’);
require(‘class.smtp.php’);

session_start();
//se incluye la config de la base de datos
include './bdconfig.php';
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];


if($usuario == null || $correo == null)
{
	echo 'Rellena los campos.';
}else{
	$consulta = mysqli_query($conexion,"Select * from usuarios where usuario='$usuario' and correo='$correo'");
	if(mysqli_num_rows($consulta) > 0)
	{
		echo 'Correcto';
	}else{
		echo "Usuario y/o contraseña incorrecto";
	}	
}
?>