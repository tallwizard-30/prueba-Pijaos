<?php

require_once "../modelos/pacientes.modelo.php";
require_once "../modelos/hospitales.modelo.php";

class Hospitales{

    static public function editarHospitales(){
      $id = $_POST["ID"];

      $orden ='where Cod_Hospital ='.$id;
      $tabla = "hospitales";
      $campos = "*";
      $inner = "";
      
        $pacientes = Modelopacientes::listarGestion($tabla,$orden,$inner,$campos); 
    
        echo json_encode($pacientes);
    
}

static public function ctrcrearHospital(){

    //agregar al formulario
/*	$crearPerfil = new ControladorProductos();
    $crearPerfil -> ctrcrearProductos();*/
    if(isset($_POST["codHospi"])){

       
        $datos = array("Cod_Hospital" => $_POST["codHospi"],
                           "Nombre" => $_POST["NombreH"],
                           
                        );

                           
        $campos = "*";
        $tabla = "hospitales";
        $inner = "";
        $orden ='where Nombre ="'.$_POST["NombreH"].'"';	

        $filtro = Modelopacientes::listarGestion($tabla,$orden,$inner,$campos);
        if($filtro==0){

            $respuesta = ModeloHospitales::mdlIngresarHospital("hospitales", $datos);

        }else{

            $respuesta = "error";
        }


     echo $respuesta;

    }
    
}








}

if(isset($_POST["ID"])){

$mostrar = new Hospitales();

$mostrar -> editarHospitales();

}
if(isset($_POST["codHospi"])){
    
    $mostrar = new Hospitales();
    
    $mostrar -> ctrcrearHospital();
 }