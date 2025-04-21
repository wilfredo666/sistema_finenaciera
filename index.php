<?php
/* controladores */
require_once "controlador/usuarioControlador.php";
require_once "controlador/plantillaControlador.php";
require_once "controlador/personalControlador.php";

/* modelos */
require_once "modelo/usuarioModelo.php";
require_once "modelo/personalModelo.php";



$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();