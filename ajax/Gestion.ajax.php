<?php

require_once "../modelos/pacientes.modelo.php";


class Gestion{

    static public function editarGestion(){
      $id = $_POST["ID"];

      
       
        $campos = "Id_hospitalizacion,No_Doc_Paciente, 
        CONCAT(p.nombres, ' ', p.apellidos) as Nombre,
        h.Nombre as hospital,g.Cod_Hospital,Fecha_Ingreso,Fecha_Salida,estado";
        $tabla = "Gestion_Hospitalaria as g";
        $inner = "inner join pacientes as p on(No_Doc_Paciente = p.NO_DOCUENTO)
        inner join hospitales as h on(h.Cod_Hospital  = g.Cod_Hospital)";
        $orden ="where Id_hospitalizacion=".$id;
        $pacientes = Modelopacientes::listarGestion($tabla,$orden,$inner,$campos); 
    
        echo json_encode($pacientes);
    
}


}

if(isset($_POST["ID"])){

$mostrar = new Gestion();

$mostrar -> editarGestion();

}
