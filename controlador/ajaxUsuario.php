<?php
require_once "../modelo/usuarioModelo.php";

header('Content-Type: application/json');
$datos = ModeloUsuario::mdlInfoUsuarios();
echo json_encode(["data" => $datos], JSON_PRETTY_PRINT);

?>