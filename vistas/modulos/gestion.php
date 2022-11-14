


<div class="container">

<?php 
        $orden =" order by Id_hospitalizacion";
        $campos = "Id_hospitalizacion,No_Doc_Paciente,  p.nombres as Nombres ,p.apellidos as apellidos";
        $tabla = "Gestion_Hospitalaria  ";
        $inner = "inner join pacientes as p on(No_Doc_Paciente = p.NO_DOCUENTO)";
        $pacientes = Controladorpacientes::ctrMostrarTotalPacientes($tabla,$orden,$inner,$campos); 
        if (!$pacientes==0) {
           
        ?>
        
        <select class="form-control" onchange="editar(this)" id="PacienteGest">
        <option valu="0" selected disabled>Seleccione una gestion</option>
        <?php 

        foreach ($pacientes as $key => $value) {
            $valor = $value["Id_hospitalizacion"]." ".$value["Nombres"]." ".$value["apellidos"];

            echo strtoupper('<option value="'.$value["Id_hospitalizacion"].'" >'.$valor.'</option>');
        }
        echo "</select>";
    }
        ?>

<form id="addGestion">
  
  
    <div class="form-group ">
      <label for="documento">Numero Documento</label>
      <input type="number" class="form-control" id="numeDocu" name="numeDocu" onkeyup="buscadorpacientes()" required>
      <div class="suggestions" id="suggestions"></div>
    </div>
  
    <input type="hidden" class="form-control" id="estado" value="0">
    <input type="hidden" class="form-control" id="CodeGestion" name="CodeGestion" disabled>
    <input type="hidden" class="form-control" id="TipoDoc" name="TipoDoc">
    <div class="form-group ">
    <label for="nombres">Nombre Paciente</label>
      <input type="text" class="form-control" id="nombreCom"  name="nombreCom"  disabled>
    </div>
   

    <div class="form-group">
    <label for="hospital">Hospital</label>
    <?php 
        $orden =" order by Cod_Hospital";
        $tabla = "Hospitales";
        $campos = "*";
        $inner = "";
        $pacientes = Controladorpacientes::ctrMostrarTotalPacientes($tabla,$orden,$inner,$campos); ?>

        <select class="form-control" id="Hospital" name="Hospital" required>
        <?php 

        foreach ($pacientes as $key => $value) {

            echo strtoupper('<option value="'.$value["Cod_Hospital"].'" selected>'.$value["Nombre"].'</option>');
        }
        ?>
</select>



  </div>

  <div class="form-group inactive" id="fechaIngre">
    <label for="fechaIngreso">Fecha Ingreso</label>
    <input type="datetime-local" class="form-control" id="fechaIngreso" name="fechaIngreso" required>
  </div>

  <div class="form-group inactive" id="Fecha_Salida">
    <label for="fechaSali">Fecha Salida</label>
    <input type="datetime-local" class="form-control" id="fechaSali" name="fechaSali" >
  </div>
 
  
</form>
<button type="buttom" class="btn btn-outline-success" onclick="Guardar()" id="Guardar" >Guardar</button>
  <button type="buttom" class="btn btn-outline-primary" onclick="modificar()" id="modificar" disabled>Modificar</button>
  <button type="buttom" class="btn btn-outline-danger" id="eliminar" onclick="Delete('addGestion')" disabled>Eliminar</button>
  <button type="buttom" class="btn btn-outline-info" onclick="Nuevo()"  id="BtnNuevo" disabled>Nuevo</button>

</div>
