function f_agregarAlumno(){
  var r = confirm("Deseas continuar");

  if (r == false) {
    return;
  }else{ 

    //Se extraen los valores de la fila
    var accion= "Agregar";
    var matricula = document.getElementById("Matricula").value;
    var nombre = document.getElementById("Nombre").value;
    var paterno = document.getElementById("ApellidoPa").value;
    var materno = document.getElementById("ApellidoMa").value;
    var telefono = document.getElementById("Telefono").value;
    var direccion = document.getElementById("Direccion").value;
    var semestre = document.getElementById("Semestre").value;
    var email = document.getElementById("Email").value;
    var edad = document.getElementById("Edad").value;
    var sexo= document.getElementById("Sexo").value;
    var creditos= document.getElementById("Creditos").value;
    var servicio= document.getElementById("Servicio").value;

    if(creditos != "Si" || servicio != "Si")
    {
      alert("El alumno debe haber concluido sus creditos complementarios y servicio. Ingresa 'Si'")
      return;
    }

    var params = {matricula:matricula, nombre:nombre, paterno:paterno, materno:materno, telefono:telefono, direccion:direccion, semestre:semestre, email:email, edad:edad, sexo:sexo, accion:accion}

    $.ajax({
      url:'../accionesCoordinador.php',
      type: 'POST',
      data: params,
      success: function(resp){
        if(resp == "Correcto"){
          alert("Ya esta activo: " + matricula + ", " + nombre);
          location.href="lista_alumnos.php";
        }
        else if(resp == "Alumno ya estaba activo"){
          alert("No se agrego porque el alumno ya estaba activo ");
          location.reload();
        }
        else
        {
          alert(resp);
        }
      }
    });
  }
}

function f_eliminarAlumno(fila){
  var r = confirm("Deseas continuar");
  if (r == false) {
    return;
  }else{
    var accion= "Eliminar";
    var matricula = document.getElementById("matricula["+fila+"]").value;

    var params = {matricula:matricula, accion:accion};

    $.ajax({
      url:'../accionesCoordinador.php',
      type: 'POST',
      data: params,
      success: function(resp){
        if(resp == "Correcto"){
          $(document.getElementById("tabla_alumnos").deleteRow(fila+1)).html(resp);
        }else
        {
          alert("No se elimino: " + matricula);
          console.log(resp);
        }
      }
    });
  }
}

function f_modificarAlumno(fila){
  var r = confirm("Deseas continuar");
  if (r == false) {
    return;
  }else{

      //Se extraen los valores de la fila
      var modificar= "Modificar";
      var matricula = document.getElementById("matricula["+fila+"]").value;
      var nombre = document.getElementById("nombre["+fila+"]").value;
      var paterno = document.getElementById("paterno["+fila+"]").value;
      var materno = document.getElementById("materno["+fila+"]").value;
      var email = document.getElementById("email["+fila+"]").value;
      var semestre = document.getElementById("semestre["+fila+"]").value;
      
      if(nombre == "" || paterno == "" || email == "" || semestre < 10 || semestre > 13)
      {
        alert("No se pudo realizar la acción, verifica los campos que sean correctos.");
        return;
      }      

      $.ajax({
        url:'../accionesCoordinador.php',
        type: 'POST',
        data: 'matricula='+matricula+' &nombre='+nombre+'&paterno='+paterno+'&materno='+materno+'&email='+email+'&semestre='+semestre+'&accion='+modificar,
        success: function(resp){
          if(resp == "Correcto"){
            alert("Se ha modificado");
          }else
          {
            alert("No se modifico");
          }
          console.log(resp);
        }
      });
    }
  }

  function f_agregarAsesor(){
    var r = confirm("Deseas continuar");

    if (r == false) {
      return;
    }else{

    //Se extraen los valores de la fila
    var accion= "AgregarAsesor";
    var tipo_asesor = document.getElementById("tipo_asesor").value;
    var nombre = document.getElementById("Nombre").value;
    var paterno = document.getElementById("ApellidoPa").value;
    var materno = document.getElementById("ApellidoMa").value;
    var telefono = document.getElementById("Telefono").value;
    var direccion = document.getElementById("Direccion").value;
    var email = document.getElementById("Email").value;

    var params = {tipo_asesor:tipo_asesor, nombre:nombre, paterno:paterno, materno:materno, telefono:telefono, direccion:direccion, email:email, accion:accion}

    $.ajax({
      url:'../accionesCoordinador.php',
      type: 'POST',
      data: params,
      success: function(resp){
        if(resp == "Correcto"){
          alert("Se agrego: " + id_asesor + ", " + nombre);
          location.href="AltaAsesor.php";
        }else
        {
          alert(resp);
        }
      }
    });
  }
}
function f_mostrarAlumno(){
  //Se extraen los valores de la fila
  var accion= "mostrarAlumno";
  var matricula = document.getElementById("Matricula").value;

  var params = {matricula:matricula, accion:accion}

  $.ajax({
    url:'../accionesCoordinador.php',
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
        
        document.getElementById("btn_guardar").disabled = false;
        document.getElementById("Matricula").disabled = true;
      }else{
        alert(resp);
        document.getElementById("btn_guardar").disabled = true;
        document.getElementById("Matricula").disabled = false;
      }
    }
  });
}

function f_alumnoValido(){
  //Se extraen los valores de la fila
  var accion= "detalle_alumno";
  var matricula = document.getElementById("Matricula").value;

  var params = {matricula:matricula, accion:accion}

  $.ajax({
    url:'../accionesCoordinador.php',
    type: 'POST',
    data: params,
    success: function(resp){
      if(resp != "Alumno no encontrado"){
        let str = resp;
        let resultado = str.split(",");

        document.getElementById("Nombre").value = resultado[0];
        document.getElementById("Carrera").value= resultado[1];
        document.getElementById("Semestre").value= resultado[2];
        
        document.getElementById("Matricula").disabled = false;
        document.getElementById("proyecto").style.visibility = "visible"; 
        document.getElementById("asesores").style.visibility = "visible"; 
        document.getElementById("fechas").style.visibility = "visible"; 
        document.getElementById("btn_guardar_residencia").style.visibility ="visible"

        document.getElementById("Id_Proyecto").value = matricula+"17";

        document.getElementById("lblTexto").style.visibility = "hidden";
        document.getElementById("Matricula").readOnly = "true";
      }else{
        alert(resp);
        document.getElementById("proyecto").style.visibility = "hidden"; 
        document.getElementById("asesores").style.visibility = "hidden"; 
        document.getElementById("fechas").style.visibility = "hidden"; 
        document.getElementById("btn_guardar_residencia").style.visibility = "hidden"; 
      }
    }
  });
}

function tipo_proyecto() {
  var tipo_proyecto = document.getElementById("TipoProyecto").value;

  if(tipo_proyecto == "Externo"){
   document.getElementById("asesor_externo").style.visibility = "visible"; 
 }else if(tipo_proyecto == "Interno"){
   document.getElementById("asesor_externo").style.visibility = "hidden"; 
 }
}

function f_guardar_residencia() {
  var accion= "guardar_residencia";

  var IdProyecto = document.getElementById("Id_Proyecto").value;
  var NombreProyecto = document.getElementById("NombreProyecto").value;
  var FechaInicio = document.getElementById("FechaInicio").value;
  var FechaFinal = document.getElementById("FechaFinal").value;
  var Matricula = document.getElementById("Matricula").value;

  var TipoProyecto = document.getElementById("TipoProyecto").value;
  var AsesorInterno = document.getElementById("AsesorInterno").value;
  var AsesorExterno = document.getElementById("AsesorExterno").value;

  if(IdProyecto != "" && NombreProyecto != "" && FechaInicio != "" && FechaFinal != "" && Matricula != "" && TipoProyecto != "" && AsesorInterno != ""){

    if(TipoProyecto == "Externo"){
      if(AsesorExterno == ""){
        alert("Recuerda llenar todos los campo")
        return;
      }
    }
    var params = {IdProyecto:IdProyecto, NombreProyecto:NombreProyecto, FechaInicio:FechaInicio, FechaFinal:FechaFinal, Matricula:Matricula,TipoProyecto:TipoProyecto,AsesorInterno:AsesorInterno, AsesorExterno:AsesorExterno, accion:accion}

    $.ajax({
      url:'../accionesCoordinador.php',
      type: 'POST',
      data: params,
      success: function(resp){
        if(resp == "Correcto"){
          alert("Se agrego el proyecto");
          alert(resp);
          location.reload();
        }
        else if(resp == "Alumno ya estaba activo"){
          alert("No se agrego porque el alumno ya estaba activo ");
          location.reload();
        }
        else
        {
         alert("El alumno ya tiene un proyecto, no se le puede añadir otro");
        }
      }
    });


  }else
  {
    alert("Recuerda llenar todos los campos")
  }
}