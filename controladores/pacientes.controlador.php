<?php

class Controladorpacientes{

	/*=============================================
	MOSTRAR TOTAL pacientes
	=============================================*/

	static public function ctrMostrarTotalPacientes($tabla,$orden,$inner,$campos){

		

		$respuesta = Modelopacientes::mostrarDatos($tabla, $orden,$inner,$campos);

		return $respuesta;

	}


	


	


}