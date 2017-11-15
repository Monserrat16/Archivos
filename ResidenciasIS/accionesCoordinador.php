<?php
session_start();

//se incluye la config dela base de datos
include'./bdconfig.php';

$accion=$_POST['accion'];

if($accion=="Eliminar"){
	$Matricula=utf8_decode($_POST['matricula']);
	
	if($conexion->connect_error){
		die("Fallo la conexion:".$conexion->connect_error);
	}

	// $sql="DELETE FROM Alumno WHERE Matricula=".$_POST['matricula'];

	// if($conexion->query($sql)===TRUE){
	// 	echo"Correcto";
	// }else{
	// 	echo"Error al eliminar:".$conexion->error;
	// }

	$sql="UPDATE Alumno SET estado_residencia = 'False' WHERE Matricula= $Matricula";

	if($conexion->query($sql)===TRUE){
		echo"Correcto";
	}else{
		echo"Error al guardar alumno:".$conexion->error;
	}
}

elseif($accion=="Modificar")
{
	$sql="UPDATE Alumno SET
	Nombre='".$_POST['nombre']."',
	ApellidoPa='".$_POST['paterno']."',
	ApellidoMa='".$_POST['materno']."',
	Email='".$_POST['email']."',
	Semestre='".$_POST['semestre']."'
	WHERE Matricula=".$_POST['matricula'];

	if($conexion->query($sql)===TRUE){
		echo"Correcto";
	}else{
		echo"Error al actualizar:".$conexion->error;
	}
}
elseif($accion=="Agregar")
{
	$Matricula=utf8_decode($_POST['matricula']);
	$consulta  = mysqli_query($conexion,"select estado_residencia from alumno where matricula = '$Matricula'");

	if(mysqli_num_rows($consulta)>0)
	{
		while($row = mysqli_fetch_assoc($consulta)) {
			if($row["estado_residencia"] == "False")
			{
				$sql="UPDATE Alumno SET estado_residencia = 'True', usuario = '".$_SESSION['coordinador']."', fecha_alta = '2017-11-09' WHERE Matricula= $Matricula";

				if($conexion->query($sql)===TRUE){
					echo"Correcto";
				}else{
					echo"Error al guardar alumno:".$conexion->error;
				}
			}
			else
			{
				echo "Alumno ya estaba activo";
			}
		}
	}else{
		echo "Alumno no encontrado";
	}
}
elseif($accion=="AgregarAsesor")
{
	$tipo_asesor=utf8_decode($_POST['tipo_asesor']);
	$id_asesor=utf8_decode($_POST['id_asesor']);
	$Nombre= utf8_decode($_POST['nombre']);
	$ApellidoPa= utf8_decode($_POST['paterno']);
	$ApellidoMa= utf8_decode($_POST['materno']);
	$Direccion= utf8_decode($_POST['direccion']);
	$Telefono= utf8_decode($_POST['telefono']);
	$Email= utf8_decode($_POST['email']);

	if($tipo_asesor=="Interno")
	{
		$sql="insert into AsesorInterno values (DEFAULT,'$Nombre','$ApellidoPa','$ApellidoMa','$Direccion','$Telefono','$Email')";
	}else if($tipo_asesor=="Externo"){
		$sql="insert into AsesorExterno values (DEFAULT,'$Nombre','$ApellidoPa','$ApellidoMa','$Direccion','$Telefono','$Email')";
	}
	

	if($conexion->query($sql)===TRUE){
		echo"Correcto";
	}else{
		echo"Error al ingresar:".$sql."<br>".$conexion->error;
	}
}
elseif ($accion=="mostrarAlumno") 
{
	$Matricula=utf8_decode($_POST['matricula']);
	
	if($Matricula == null)
	{
		echo 'Rellena los campos.';
	}else{
		$consulta  = mysqli_query($conexion,"select nombre, apellidoPa, apellidoMa, Direccion, Telefono, Email, Semestre, Sexo, Edad from alumno where matricula = '$Matricula'");

		if(mysqli_num_rows($consulta)>0)
		{
			while($row = mysqli_fetch_assoc($consulta)) {
				echo $row["nombre"].",". $row["apellidoPa"].",".$row['apellidoMa'].",".$row['Direccion'].",".$row['Telefono'].",".$row['Email'].",".$row['Semestre'].",".$row['Sexo'].",".$row['Edad'];
			}
		}else{
			echo "Alumno no encontrado";
		}
	}	
}
elseif ($accion=="detalle_alumno") 
{
	$Matricula=utf8_decode($_POST['matricula']);
	
	if($Matricula == null)
	{
		echo 'Rellena los campos.';
	}else{
		$consulta  = mysqli_query($conexion,"select nombre, (select nombre from carrera where idcarrera = a.idcarrera) as carrera, Semestre from alumno a where matricula = '$Matricula' and estado_residencia = 'True'");

		if(mysqli_num_rows($consulta)>0)
		{
			while($row = mysqli_fetch_assoc($consulta)) {
				echo $row["nombre"].",". $row["carrera"].",".$row['Semestre'];
			}
		}else{
			echo "Alumno no encontrado / no dado de alta";
		}
	}	
}
elseif($accion=="guardar_residencia")
{
	$IdProyecto=utf8_decode($_POST['IdProyecto']);
	$NombreProyecto=utf8_decode($_POST['NombreProyecto']);
	$FechaInicio= utf8_decode($_POST['FechaInicio']);
	$FechaFinal= utf8_decode($_POST['FechaFinal']);
	$Matricula= utf8_decode($_POST['Matricula']);
	$TipoProyecto= utf8_decode($_POST['TipoProyecto']);

	$sql="insert into proyectos values ('$IdProyecto','$NombreProyecto','$FechaInicio','$FechaFinal','$Matricula','$TipoProyecto', '".$_SESSION['coordinador']."')";

	if($conexion->query($sql)===TRUE){
		if($TipoProyecto == "Interno"){
			$NombreAsesor= utf8_decode($_POST['AsesorInterno']);

			$sql2="insert into seguimiento_interno (IdProyecto, Matricula, idAsesorInterno) values ('$IdProyecto', $Matricula, (select idAsesorInterno from asesorInterno where nombre = '$NombreAsesor'))";
			if($conexion->query($sql2)===TRUE){
				$sql3="insert into edo_proyecto_interno values ('$IdProyecto', (select idAsesorInterno from asesorInterno where nombre = '$NombreAsesor'),'no', 'no')";
				if($conexion->query($sql3)===TRUE){
					echo"Correcto";
				}
				else{
					echo"Error al ingresar:".$sql."<br>".$conexion->error;
				}
			}else{
				echo"Error al ingresar:".$sql."<br>".$conexion->error;
			}
		}
		else if($TipoProyecto == "Externo"){
			$asesorInterno= utf8_decode($_POST['AsesorInterno']);
			$asesorExterno= utf8_decode($_POST['AsesorExterno']);

			$sql2="insert into seguimiento_Externo (IdProyecto, Matricula, idAsesorInterno, idAsesorExterno) values ('$IdProyecto', $Matricula, (select idAsesorInterno from asesorInterno where nombre = '$asesorInterno'),(select idAsesorExterno from asesorExterno where nombre = '$asesorExterno'))";
			if($conexion->query($sql2)===TRUE){
				$sql3="insert into edo_proyecto_externo values ('$IdProyecto',(select idAsesorInterno from asesorInterno where nombre = '$asesorInterno'), (select idAsesorExterno from asesorExterno where nombre = '$asesorExterno'),'no', 'no','no')";
				if($conexion->query($sql3)===TRUE){
					echo"Correcto";
				}
				else{
					echo"Error al ingresar:".$sql."<br>".$conexion->error;
				}
			}else{
				echo"Error al ingresar:".$sql."<br>".$conexion->error;
			}
		}
	}else{
		echo"Error al ingresar:".$sql."<br>".$conexion->error;
	}
}
?>
