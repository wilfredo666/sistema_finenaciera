<?php
/* controladores */
require_once "controlador/usuarioControlador.php";
require_once "controlador/plantillaControlador.php";
require_once "controlador/personalControlador.php";
require_once "controlador/socioControlador.php";
require_once "controlador/cuentaControlador.php";
require_once "controlador/creditoControlador.php";

/* modelos */
require_once "modelo/usuarioModelo.php";
require_once "modelo/personalModelo.php";
require_once "modelo/socioModelo.php";
require_once "modelo/cuentaModelo.php";
require_once "modelo/creditoModelo.php";



$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();