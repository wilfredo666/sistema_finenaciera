<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);
if (isset($ruta["query"])) {
  if ($ruta["query"] == "ctrRegSocio" ||
      $ruta["query"] == "ctrEditSocio" ||
      $ruta["query"] == "ctrEliSocio" ||
      $ruta["query"] == "ctrBusSocio") {
    $metodo = $ruta["query"];
    $Socio = new ControladorSocio();
    $Socio->$metodo();
  }
}

class ControladorSocio {

  // Obtener información de todos los socios
  static public function ctrInformacionSocio() {
    $respuesta = ModeloSocio::mdlInformacionSocio();
    return $respuesta;
  }

  // Registrar nuevo socio
  static public function ctrRegSocio() {
    require "../modelo/socioModelo.php";
    $data = array(
      "nombre_socio"  => $_POST["nomSocio"],
      "ap_pat_socio"  => $_POST["patSocio"],
      "ap_mat_socio"  => $_POST["matSocio"],
      "ci_socio"      => $_POST["ciSocio"],
      "direccion"     => $_POST["dirSocio"],
      "telefono_socio"=> $_POST["telSocio"],
      "email"         => $_POST["emailSocio"]
    );
    $respuesta = ModeloSocio::mdlRegSocio($data);
    echo $respuesta;
  }

  // Obtener información de un socio específico
  static public function ctrInfoSocio($id) {
    $respuesta = ModeloSocio::mdlInfoSocio($id);
    return $respuesta;
  }

  // Editar información de un socio
  static public function ctrEditSocio() {
    require "../modelo/socioModelo.php";
    $data = array(
      "id_socio"      => $_POST["idSocio"],
      "nombre_socio"  => $_POST["nomSocio"],
      "ap_pat_socio"  => $_POST["patSocio"],
      "ap_mat_socio"  => $_POST["matSocio"],
      "ci_socio"      => $_POST["ciSocio"],
      "direccion"     => $_POST["dirSocio"],
      "telefono_socio"=> $_POST["telSocio"],
      "email"         => $_POST["emailSocio"],
      "estado_socio"  => $_POST["estadoSocio"]
    );
    $respuesta = ModeloSocio::mdlEditSocio($data);
    echo $respuesta;
  }

  // Eliminar un socio
  static public function ctrEliSocio() {
    require "../modelo/socioModelo.php";
    $id = $_POST["id"];
    $respuesta = ModeloSocio::mdlEliSocio($id);
    echo $respuesta;
  }
}