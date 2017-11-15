<?php
session_start();

//se incluye la config dela base de datos
include'./bdconfig.php';

$accion=$_POST['accion'];

if ($accion=="mostrarAlumno") 
{
	$consulta  = mysqli_query($conexion,"select nombre, apellidoPa, apellidoMa, Direccion, Telefono, Email, Semestre, Sexo, Edad, (select nombre from carrera where idcarrera = a.idcarrera) as Carrera from alumno a where matricula = '".$_SESSION['alumno-matricula']."'");

	if(mysqli_num_rows($consulta)>0)
	{
		while($row = mysqli_fetch_assoc($consulta)) {
			echo $row["nombre"].",". $row["apellidoPa"].",".$row['apellidoMa'].",".$row['Direccion'].",".$row['Telefono'].",".$row['Email'].",".$row['Semestre'].",".$row['Sexo'].",".$row['Edad'].",".$row['Carrera'].",".$_SESSION['alumno-matricula'];
		}
	}else{
		echo "Alumno no encontrado";
	}
}
else if ($accion=="cargar_mi_residencia") 
{
	$sql  = mysqli_query($conexion,"select tipo from proyectos where matricula = '".$_SESSION['alumno-matricula']."'");
	if(mysqli_num_rows($sql)>0){
		
		while($row = mysqli_fetch_assoc($sql)) {
			$TipoProyecto = $row["tipo"];

			if($TipoProyecto == "Interno"){
				$consulta  = mysqli_query($conexion,"select idProyecto, nombre,(select nombre from asesorInterno where idAsesorInterno = (select idAsesorinterno from seguimiento_interno where idProyecto = p.idProyecto)) as AsesorInterno from proyectos p where matricula = '".$_SESSION['alumno-matricula']."'");

				if(mysqli_num_rows($consulta)>0)
				{
					while($row1 = mysqli_fetch_assoc($consulta)) {
						$datosProyecto = $row1["idProyecto"].",". $row1["nombre"].",". $row1["AsesorInterno"].", No disponible";

						$consulta2  = mysqli_query($conexion,"select url_entrega_1, edo_entrega_1, url_entrega_2, edo_entrega_2, url_entrega_3, edo_entrega_3 from seguimiento_interno where matricula = '".$_SESSION['alumno-matricula']."'");

						$resumenTareas;
						if(mysqli_num_rows($consulta2)>0)
						{
							while($row2 = mysqli_fetch_assoc($consulta2)) {
								$resumenTareas = $row2["url_entrega_1"].",". $row2["edo_entrega_1"].",".$row2['url_entrega_2'].",".$row2['edo_entrega_2'].",".$row2['url_entrega_3'].",".$row2['edo_entrega_3'];
							}
						}
						echo $datosProyecto.",".$resumenTareas;
						$_SESSION['tipo-residencia']= "Interno";
					}
				}else{
					echo "No haz iniciado tu proceso de residencia";
				}
			}
			if($TipoProyecto == "Externo"){
				$consulta  = mysqli_query($conexion,"select idProyecto, nombre,(select nombre from asesorInterno where idAsesorInterno = (select idAsesorinterno from seguimiento_Externo where idProyecto = p.idProyecto)) as AsesorInterno, (select nombre from asesorExterno where idAsesorExterno = (select idAsesorExterno from seguimiento_Externo where idProyecto = p.idProyecto)) as AsesorExterno from proyectos p where matricula = '".$_SESSION['alumno-matricula']."'");

				if(mysqli_num_rows($consulta)>0)
				{
					while($row1 = mysqli_fetch_assoc($consulta)) {
						$datosProyecto =  $row1["idProyecto"].",". $row1["nombre"].",". $row1["AsesorInterno"].",". $row1["AsesorExterno"];

						$consulta2  = mysqli_query($conexion,"select url_entrega_1, edo_entrega_1, url_entrega_2, edo_entrega_2, url_entrega_3, edo_entrega_3 from seguimiento_externo where matricula = '".$_SESSION['alumno-matricula']."'");

						$resumenTareas;
						if(mysqli_num_rows($consulta2)>0)
						{
							while($row2 = mysqli_fetch_assoc($consulta2)) {
								$resumenTareas = $row2["url_entrega_1"].",". $row2["edo_entrega_1"].",".$row2['url_entrega_2'].",".$row2['edo_entrega_2'].",".$row2['url_entrega_3'].",".$row2['edo_entrega_3'];
							}
						}
						$_SESSION['tipo-residencia']= "Externo";
						echo $datosProyecto.",".$resumenTareas;
					}
				}else{
					echo "No haz iniciado tu proceso de residencia";
				}

			}
		}
	}
}
?>
