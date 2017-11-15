function cargar_datos(){
  //Se extraen los valores de la fila
  var accion= "mostrarAlumno";
  var params = {accion:accion}

  $.ajax({
    url:'../accionesAlumno.php',
    type: 'POST',
    data: params,
    success: function(resp){
      if(resp != "Alumno no encontrado"){
        let str = resp;
        let resultado = str.split(",");

        document.getElementById("Nombre").value = resultado[0];
        document.getElementById("ApellidoPa").value = resultado[1];
        document.getElementById("ApellidoMa").value= resultado[2];
        document.getElementById("Direccion").value= resultado[3];
        document.getElementById("Telefono").value= resultado[4];
        document.getElementById("Email").value= resultado[5];
        document.getElementById("Semestre").value= resultado[6];
        document.getElementById("Sexo").value= resultado[7];
        document.getElementById("Edad").value= resultado[8];
        document.getElementById("Carrera").value= resultado[9];
        document.getElementById("Matricula").value= resultado[10];
        //alert(resp);
      }else{
        alert(resp);
      }
    }
  });
}
function cargar_mi_residencia() {
  var accion= "cargar_mi_residencia";
  var params = {accion:accion}

  $.ajax({
    url:'../accionesAlumno.php',
    type: 'POST',
    data: params,
    success: function(resp){
      if(resp != "Alumno no encontrado"){
        let str = resp;
        let resultado = str.split(",");

        document.getElementById("IdProyecto").value = resultado[0];
        document.getElementById("NombreProyecto").value = resultado[1];
        document.getElementById("IdAsesorInterno").value = resultado[2];
        document.getElementById("IdAsesorExterno").value = resultado[3]

        document.getElementById("NombreEntrega1").value = resultado[4];
        document.getElementById("Estado1").value = resultado[5];
        document.getElementById("NombreEntrega2").value = resultado[6];
        document.getElementById("Estado2").value = resultado[7];
        document.getElementById("NombreEntrega3").value = resultado[8];
        document.getElementById("Estado3").value = resultado[9];

        if(document.getElementById("Estado1").value == "Entregado"){
          document.getElementById("btnEntrega1").disabled = true;
        }
        if(document.getElementById("Estado2").value == "Entregado"){
          document.getElementById("btnEntrega2").disabled = true;
        }
        if(document.getElementById("Estado3").value == "Entregado"){
          document.getElementById("btnEntrega3").disabled = true;
        }

        if(document.getElementById("Estado1").value == "undefined"){
          document.getElementById("btnEntrega1").disabled = true;
        }
        if(document.getElementById("Estado2").value == "undefined"){
          document.getElementById("btnEntrega2").disabled = true;
        }
        if(document.getElementById("Estado3").value == "undefined"){
          document.getElementById("btnEntrega3").disabled = true;
          alert("No haz iniciado tu proceso de residencia");
        }
      }else{
        alert("No haz iniciado tu proceso de residencia");
      }
    }
  });
}
