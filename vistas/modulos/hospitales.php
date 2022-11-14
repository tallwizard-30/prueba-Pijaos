
<div class="container">

<?php 
        $orden =" order by Cod_Hospital ";
        $campos = "*";
        $tabla = "hospitales";
        $inner = "";
        $pacientes = Controladorpacientes::ctrMostrarTotalPacientes($tabla,$orden,$inner,$campos); 
        if (!$pacientes==0) {
           
        ?>
        
        <select class="form-control" onchange="editarHospitales(this)" id="HospitalId">
        <option valu="0" selected disabled>Seleccione un Hospital</option>
        <?php 

        foreach ($pacientes as $key => $value) {
           

            echo strtoupper('<option value="'.$value["Cod_Hospital"].'" >'.$value["Nombre"].'</option>');
        }
        echo "</select>";
    }
        ?>
<form id="addHospital">


 
    <div class="form-group ">
    <label for="codHospi">Codigo Hospital</label>
      <input type="nuber" class="form-control" id="codHospi"  name="codHospi" placeholder="695">
      <input type="hidden"  id="HospiId"  name="HospiId" >
    </div>
  
  <div class="form-group">
    <label for="NombreH">Nombre Hopsital</label>
    <input type="text" class="form-control" id="NombreH" name="NombreH">
  </div>
 

</form>

<button type="buttom" class="btn btn-outline-success" onclick="GuardarHospital()" id="Guardar" disabled>Guardar</button>
  <button type="buttom" class="btn btn-outline-primary" onclick="modificarHospital()" id="modificar" disabled>Modificar</button>
  <button type="buttom" class="btn btn-outline-danger" id="eliminar" onclick="DeleteHospital()" disabled>Eliminar</button>
  <button type="buttom" class="btn btn-outline-info" onclick="NuevoHospital()"  id="BtnNuevo" disabled>Nuevo</button>


</div>
