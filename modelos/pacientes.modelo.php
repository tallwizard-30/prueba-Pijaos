<?php
require_once "conexion.php";

class Modelopacientes{

/*=============================================
MOSTRAR EL TOTAL DE USUARIOS
=============================================*/	

static public function mdlBuscador($tabla, $key){

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  
    
    WHERE  NO_DOCUENTO	 LIKE  '%".$key."%'
   ");

    $stmt -> execute();

    return $stmt -> fetchAll();

   

    $stmt = null;

}

static public function mdlIngresarPacientes($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo_documento, NO_DOCUENTO, nombres, apellidos, fec_nacimiento, email) VALUES (:tipo_documento, :NO_DOCUENTO, :nombres, :apellidos, :fec_nacimiento, :email)");

    $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
    $stmt->bindParam(":NO_DOCUENTO", $datos["NO_DOCUENTO"], PDO::PARAM_INT);
    $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
    $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
    $stmt->bindParam(":fec_nacimiento", $datos["fec_nacimiento"], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos["email"], PDO::PARAM_INT);
   
    
        if($stmt->execute()){
    
            return "ok";
    
        }else{
            return "error";
        }

   
    $stmt = null;

}




static public function mostrarDatos($tabla,$orden,$inner,$campos){

    $stmt = Conexion::conectar()->prepare("SELECT $campos FROM $tabla  $inner $orden");

    $stmt -> execute();

    return $stmt -> fetchAll();

   

    $stmt = null;
}

static public function listarGestion($tabla,$orden,$inner,$campos){

    $stmt = Conexion::conectar()->prepare("SELECT $campos FROM $tabla  $inner $orden");

    $stmt -> execute();

    return $stmt -> fetch();

   

    $stmt = null;
}





static public function mdlActualizarPaciente($tabla, $datos){

    $id =$datos['id'];
   
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo_documento = :tipo_documento,  nombres = :nombres, apellidos = :apellidos, fec_nacimiento = :fec_nacimiento, email = :email  WHERE ID = $id");
    $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);

    $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
    $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
    $stmt->bindParam(":fec_nacimiento", $datos["fec_nacimiento"], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
  
   
    if($stmt->execute()){

        return "ok";

    }else{

        return "error";
    
    }

   
    $stmt = null;

  
    

}







}