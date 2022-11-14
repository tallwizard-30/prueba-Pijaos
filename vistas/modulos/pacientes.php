
<div class="container">


<?php 
        $orden =" order by NO_DOCUENTO  ";
        $campos = "*";
        $tabla = "pacientes";
        $inner = "";
        $pacientes = Controladorpacientes::ctrMostrarTotalPacientes($tabla,$orden,$inner,$campos); 
        if (!$pacientes==0) {
           
        ?>
        
        <select class="form-control" onchange="editarPacientes(this)" id="HospitalId">
        <option valu="0" selected disabled>Seleccione un Paciente</option>
        <?php 

        foreach ($pacientes as $key => $value) {
           

            echo strtoupper('<option value="'.$value["NO_DOCUENTO"].'" >'.$value["nombres"]." ".$value["apellidos"].'</option>');
        }
        echo "</select>";
    }
        ?>
<form id="addPaciente">
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="documento">Tipo Documento</label>
    <select id="tipo" name="tipo" class="form-control">
        <option value="CC" selected>Cedula Ciudadania</option>
        <option value ="TI">Tarjeta Identidad</option>
        <option value ="PP">Pasaporte</option>
        <option value ="RC">Registro Civil</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="documento">Numero Documento</label>
      <input type="number" class="form-control" id="numeDocu" name="numeDocu" placeholder="123456">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="nombres">Nombres</label>
      <input type="text" class="form-control" id="nombres"  name="nombres" placeholder="andres felipe">
    </div>
    <div class="form-group col-md-6">
      <label for="apellidos">Apellidos</label>
      <input type="text" class="form-control" id="apellidos"  name="apellidos"placeholder="torres ">
    </div>
  </div>
 
  <input type="hidden" class="form-control" id="numeDocuOCU"  name="numeDocuOCU" >
  <input type="hidden" class="form-control" id="id"  name="id" disabled>
  <div class="form-group">
    <label for="fechaNac">Fecha Naacimiento</label>
    <input type="date" class="form-control" id="fechaNac"  name="fechaNac">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="juanito@midominio.com">
  </div>
  
 
  
</form>
<button type="buttom" class="btn btn-outline-success" onclick="GuardarPaciente()" id="Guardar" >Guardar</button>
  <button type="buttom" class="btn btn-outline-primary" onclick="modificarPaciente()" id="modificar" disabled>Modificar</button>
  <button type="buttom" class="btn btn-outline-danger" id="eliminar" onclick="DeletePaciente()" disabled>Eliminar</button>
  <button type="buttom" class="btn btn-outline-info" onclick="NuevoPaciente()"  id="BtnNuevo" disabled>Nuevo</button>

</div>
