<?php

class ModeloHospitales{

   static public function mdlIngresarHospital($tabla,$datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Cod_Hospital,Nombre) VALUES (:Cod_Hospital, :Nombre)");
    
    $stmt->bindParam(":Cod_Hospital", $datos["Cod_Hospital"], PDO::PARAM_INT);
    $stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
 
    
    
    
 if($stmt->errorInfo()){

    $respuesta = ModeloHospitales::mdlEditarHospital($tabla, $datos);
    return $respuesta;
    }
    if($stmt->execute()){

        return "ok";

    }

   
    $stmt = null;

}



static public function mdlEditarHospital($tabla, $datos){
    $id =$datos['Cod_Hospital'];
   
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET    Cod_Hospital = :Cod_Hospital, Nombre = :Nombre WHERE Cod_Hospital = $id");
    
    $stmt->bindParam(":Cod_Hospital", $datos["Cod_Hospital"], PDO::PARAM_STR);
    $stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
    
   
  
   
    if($stmt->execute()){

        return "ok";

    }else{

        return "error";
    
    }

   
    $stmt = null;
}
}