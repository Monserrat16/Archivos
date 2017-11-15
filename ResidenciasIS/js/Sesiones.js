var contador = 0;

function sesion_Alumno(){
	var num_control = document.getElementById("num_control").value;
	var email = document.getElementById("email").value;
	var tipo = "alumno";

	if(num_control != "" && email != ""){
		contador++;
	}  

	var params = {num_control:num_control, email:email, tipo:tipo};

	$.ajax({
		url:'validar.php',
		type: 'POST',
		data: params,
		success: function(resp){
			if(resp == "Correcto"){
				location.href="C-Alumnos/index.php";
			}else
			{
				alert(resp);
			}

			if(contador >= 3){
				// <?php
				// $_SESSION['bloqueado']="Si";
				// ?>
				location.href="bloqueado.php";
			}
		}
	});
}
function sesion_coordinador(){
	var user = document.getElementById("Usuario").value;
	var pass = document.getElementById("contraseña").value;
	var tipo = "coordinador";

	if(user != "" && pass != ""){
		contador++;
	}  

	var params = {user:user, pass:pass, tipo:tipo};

	$.ajax({
		url:'validar.php',
		type: 'POST',
		data: params,
		success: function(resp){
			if(resp == "Correcto"){
				location.href="C-Coordinador/index.php";
			}else
			{
				alert(resp);
			}

			if(contador >= 3){
				// <?php
				// $_SESSION['bloqueado']="Si";
				// ?>
				// location.href="bloqueado.php";
			}
		}
	});
}

function sesion_asesor(){
	var id = document.getElementById("id").value;
	var email = document.getElementById("email").value;
	var tipo_asesor = document.getElementById("tipo_asesor").value;

	var tipo = "asesor";

	if(id != "" && email != ""){
		contador++;
	}  

	var params = {id:id, email:email, tipo_asesor:tipo_asesor, tipo:tipo};

	$.ajax({
		url:'validar.php',
		type: 'POST',
		data: params,
		success: function(resp){
			if(resp == "Correcto"){
				location.href="C-Asesores/index.php";
				alert(resp);
			}
			else
			{
				alert(resp);
			}

			if(contador >= 3){
				// <?php
				// $_SESSION['bloqueado']="Si";
				// ?>
				// location.href="bloqueado.php";
			}
		}
	});
}