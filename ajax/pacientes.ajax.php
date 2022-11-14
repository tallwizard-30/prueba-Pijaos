<?php
require_once "../modelos/pacientes.modelo.php";
class  pacientes{

   
    static public function mostrar(){
        $key = $_POST["key"];
        $tabla = "pacientes";
        $html="";
        $respuesta = Modelopacientes::mdlBuscador($tabla,$key);


   foreach($respuesta as $paciente){
    
    $data = utf8_encode($paciente['NO_DOCUENTO']."-".$paciente['nombres']." ". $paciente['apellidos']."-".$paciente['tipo_documento']);
    $value = strtoupper(utf8_encode($paciente['NO_DOCUENTO']."-".$paciente['nombres']." ". $paciente['apellidos']));
    $html .= '<div><a class="suggest-element " 
    data="'.$data.'" id="paciente'.$paciente['id'].'">
    '.$value.'</a></div>';

   }

   echo $html;

    }





    static public function editarPacientes(){
        $id = $_POST["ID"];
  
        $orden ="where NO_DOCUENTO =".$id;
        $tabla = "pacientes";
        $campos = "*";
        $inner = "";
        
          $pacientes = Modelopacientes::listarGestion($tabla,$orden,$inner,$campos); 
      
          echo json_encode($pacientes);
      
  }


  static public function ctrcrearPaciente(){

    //agregar al formulario
/*	$crearPerfil = new ControladorProductos();
    $crearPerfil -> ctrcrearProductos();*/
    if(isset($_POST["numeDocu"])){

       
        $datos = array("tipo_documento" => $_POST["tipo"],
                           "NO_DOCUENTO" => $_POST["numeDocu"],
                           "nombres" => $_POST["nombres"],
                           "apellidos" => $_POST["apellidos"],
                           "fec_nacimiento" => $_POST["fechaNac"],
                           "email" => $_POST["email"],
                           
                        );

                           
       

            $respuesta = Modelopacientes::mdlIngresarPacientes("pacientes", $datos);

       

     echo $respuesta;

    }
    
}

static public function CtrActualizar(){

  
    
    if(isset($_POST["id"])){

        $datos = array( "id" => $_POST["id"],
            "tipo_documento" => $_POST["tipo"],
        "nombres" => $_POST["nombres"],
        "apellidos" => $_POST["apellidos"],
        "fec_nacimiento" => $_POST["fechaNac"],
        "email" => $_POST["email"],
        
     );
        $respuesta = Modelopacientes::mdlActualizarPaciente("pacientes", $datos);

     echo $respuesta;

    }

}

}

if(isset($_POST["key"])){

	$mostrar = new pacientes();
	
	$mostrar -> mostrar();

}

if(isset($_POST["numeDocu"])){

	$mostrar = new pacientes();
	
	$mostrar -> ctrcrearPaciente();

}


if(isset($_POST["ID"])){

	$mostrar = new pacientes();
	
	$mostrar -> editarPacientes();

}
if(isset($_POST["id"])){

	$mostrar = new pacientes();
	
	$mostrar -> CtrActualizar();

}