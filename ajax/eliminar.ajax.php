<?php
require_once "../modelos/gestion.modelo.php";
require_once "../modelos/pacientes.modelo.php";
class Eliminarproductos{
static public function Eliminar(){
    $id = $_POST["CodeGestion"];
    $tabla = "Gestion_Hospitalaria";
    $campo ="Id_hospitalizacion";
    $respuesta = ModeloGestion::mdlEliminarRegistros($tabla,$id,$campo);
    echo $respuesta ;
}


static public function EliminarHospital(){
    $id = $_POST["HospiId"];
    $campos = "*";
    $tabla = "gestion_hospitalaria";
    $inner = "";
    $orden ='where Cod_Hospital  ="'.$id.'"';	

    $filtro = Modelopacientes::listarGestion($tabla,$orden,$inner,$campos);
    if($filtro==0){
      
        $tabla = "hospitales";
        $campo ="Cod_Hospital";
    
        $respuesta = ModeloGestion::mdlEliminarRegistros($tabla,$id,$campo);
        echo $respuesta ;

    }else{

        echo "Cuenta Con Gestiones en Hospitalizacion";
    }
   
}

static public function EliminarPacientes(){
    
    $id = $_POST["numeDocuOCU"];
    $campos = "*";
    $tabla = "gestion_hospitalaria";
    $inner = "";
    $orden ='where No_Doc_Paciente   ="'.$id.'"';	

    $filtro = Modelopacientes::listarGestion($tabla,$orden,$inner,$campos);
    if($filtro==0){
      
        $tabla = "pacientes";
        $campo ="id";
    
        $respuesta = ModeloGestion::mdlEliminarRegistros($tabla,$id,$campo);
        echo $respuesta ;

    }else{

        echo "Cuenta Con Gestiones en Hospitalizacion";
    }
   
}


}

if(isset($_POST["CodeGestion"])){

	$mostrar = new Eliminarproductos();
	
	$mostrar -> Eliminar();

}


if(isset($_POST["HospiId"])){

	$mostrar = new Eliminarproductos();
	
	$mostrar -> EliminarHospital();

}
if(isset($_POST["numeDocuOCU"])){

	$mostrar = new Eliminarproductos();
	
	$mostrar -> EliminarPacientes();

}