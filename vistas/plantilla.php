<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="vistas/css/style.css">

<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Proyecto Konecta</title>
</head>

<body>
   <div>

<?php  

include "modulos/cabezote.php";

if(isset($_GET["ruta"])){
    if($_GET["ruta"] == "pacientes"){

        include  "modulos/pacientes.php";
  
    }
    if($_GET["ruta"] == "hospitales"){

        include  "modulos/hospitales.php";
  
    }
    if($_GET["ruta"] == "gestion"){

        include  "modulos/gestion.php";
  
    }
}else{
    include  "modulos/pacientes.php";
  
}

?>
  
  <script LANGUAGE="JavaScript" src="vistas/js/pacientes.js"></script>
  <script LANGUAGE="JavaScript" src="vistas/js/plantilla.js"></script>
  <script LANGUAGE="JavaScript" src="vistas/js/hospitales.js"></script>
  </div>
</body>
</html>