<?php
require_once "conexion.php";
class ModeloGestion{



    
    static public function mdlIngresarGestion($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Tipo_Doc_Paciente, No_Doc_Paciente, Cod_Hospital, Fecha_Ingreso, Fecha_Salida,estado) VALUES (:Tipo_Doc_Paciente, :No_Doc_Paciente, :Cod_Hospital, :Fecha_Ingreso, :Fecha_Salida,:estado)");
    
        $stmt->bindParam(":Tipo_Doc_Paciente", $datos["Tipo_Doc_Paciente"], PDO::PARAM_STR);
        $stmt->bindParam(":No_Doc_Paciente", $datos["No_Doc_Paciente"], PDO::PARAM_INT);
        $stmt->bindParam(":Cod_Hospital", $datos["Cod_Hospital"], PDO::PARAM_INT);

        $stmt->bindParam(":Fecha_Ingreso", $datos["Fecha_Ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":Fecha_Salida", $datos["Fecha_Salida"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        
        
        
    
        if($stmt->execute()){
    
            return "ok";
    
        }else{
    
            return "error";
        
        }
    
       
        $stmt = null;
    
    }



    static public function mdlEditarGestion($tabla, $datos){
        $id =$datos['id'];
       
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET    Fecha_Ingreso = :Fecha_Ingreso, Fecha_Salida = :Fecha_Salida, estado = :estado WHERE Id_hospitalizacion = $id");
        
        $stmt->bindParam(":Fecha_Ingreso", $datos["Fecha_Ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":Fecha_Salida", $datos["Fecha_Salida"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
       
      
       
        if($stmt->execute()){
    
            return "ok";
    
        }else{
    
            return "error";
        
        }
    
       
        $stmt = null;
    
      
        
    
    }


    static public function mdlEliminarRegistros($tabla, $datos,$campo){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $campo = :id");
    
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
    
        if($stmt -> execute()){
    
            return "ok";
        
        }else{
    
            return "error";	
    
        }
    
       
    
        $stmt = null;
    
    }
    
}