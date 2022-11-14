<?php
require_once "controladores/plantillaControlador.php";

require_once "controladores/pacientes.controlador.php";
require_once "modelos/pacientes.modelo.php";

require_once "modelos/rutas.php";
$plantilla = new ControladorPlantilla();
$plantilla-> plantilla();