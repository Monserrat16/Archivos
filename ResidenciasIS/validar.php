<?php
session_start();
include './bdconfig.php';

$accion=$_POST['tipo'];

if($accion=="alumno"){

	$num_control = $_POST['num_control'];
	$email = $_POST['email'];

	if($num_control == null || $email == null)
	{
		echo 'Rellena los campos.';
	}else{
		$consulta = mysqli_query($conexion,"Select Nombre,apellidoPa FROM alumno where Matricula='$num_control' and Email='$email'");
		if(mysqli_num_rows($consulta)>0)
		{
			while($row = mysqli_fetch_assoc($consulta)) {
				$_SESSION['alumno']=$row["Nombre"];
				$_SESSION['alumno-apellido']=$row["apellidoPa"];
				$_SESSION['alumno-matricula']=$num_control;
			}
			echo 'Correcto';

		}else{
			echo "Usuario y/o contraseña incorrecto";
		}	
	}
}elseif($accion=="coordinador"){

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	if($user == null || $pass == null)
	{
		echo 'Rellena los campos.';
	}else{
		$consulta = mysqli_query($conexion,"Select usuario,contra FROM usuarios where usuario='$user' and contra='$pass'");
		if(mysqli_num_rows($consulta)>0)
		{
			$_SESSION['coordinador']=$user;
			echo 'Correcto';
		}else{
			echo "Usuario y/o contraseña incorrecto";
		}	
	}
}
elseif($accion=="asesor"){

	$id = $_POST['id'];
	$email = $_POST['email'];
	$tipo_asesor = $_POST['tipo_asesor'];

	if($id == null || $email == null ||  $tipo_asesor == null)
	{
		echo 'Rellena los campos.';
	}else{
		$consulta = mysqli_query($conexion,"Select * FROM asesorInterno where idAsesorInterno='$id' and email ='$email'");
		
		if(mysqli_num_rows($consulta)>0)
		{
			$_SESSION['asesor']=$id;
			echo 'Correcto';
		}else{
			echo 'Error';
		}	
	}
}
?>