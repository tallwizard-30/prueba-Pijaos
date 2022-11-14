<?php

require_once "../modelos/gestion.modelo.php";
require_once "../modelos/pacientes.modelo.php";

 
 class registrar {


    static public function ctrcrearGestion(){

		//agregar al formulario
	/*	$crearPerfil = new ControladorProductos();
		$crearPerfil -> ctrcrearProductos();*/
		if(isset($_POST["TipoDoc"])){

			if ($_POST["fechaSali"] =="") {
				$estado = 0;
			}else{
				$estado = 1;
			}
			$datos = array("Tipo_Doc_Paciente" => $_POST["TipoDoc"],
					           "No_Doc_Paciente" => $_POST["numeDocu"],
					           "Cod_Hospital" =>  $_POST["Hospital"],
					           "Fecha_Ingreso" => $_POST["fechaIngreso"],			       
					           "Fecha_Salida"=>$_POST["fechaSali"],	
							   "estado"=> $estado,
                            );


			$campos = "*";
			$tabla = "Gestion_Hospitalaria ";
			$inner = "";
			$orden ='WHERE Fecha_Ingreso   between "'.$_POST["fechaIngreso"].'"  AND
			 "'.$_POST["fechaSali"].'"';	

			$filtro = Modelopacientes::listarGestion($tabla,$orden,$inner,$campos);
			if($filtro==0){

				$respuesta = ModeloGestion::mdlIngresarGestion("gestion_hospitalaria", $datos);

			}else{

				$respuesta = "error";
			}


         echo $respuesta;

		}
		
	}


    static public function CtrActualizar(){

		//agregar al formulario
	/*	$crearPerfil = new ControladorProductos();
		$crearPerfil -> ctrcrearProductos();*/
		if ($_POST["fechaSali"] =="") {
			$estado = 0;
		}else{
			$estado = 1;
		}
		
		if(isset($_POST["CodeGestion"])){

			$datos = array(
					           "id"=>$_POST["CodeGestion"],
					           
					           "Fecha_Ingreso" => $_POST["fechaIngreso"],			       
					           "Fecha_Salida"=>$_POST["fechaSali"],	
							   "estado"=> 1,
                            );

			$respuesta = ModeloGestion::mdlEditarGestion("gestion_hospitalaria", $datos);

         echo $respuesta;

		}

	}
 }

 if(isset($_POST["CodeGestion"])){

	$mostrar = new registrar();
	
	$mostrar -> CtrActualizar();

}if (isset($_POST["numeDocu"])){

	$mostrar = new registrar();
	
	$mostrar -> ctrcrearGestion();

}

