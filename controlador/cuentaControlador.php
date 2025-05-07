<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);
if (isset($ruta["query"])) {
  if ($ruta["query"] == "ctrRegCuenta" ||
      $ruta["query"] == "ctrEditCuenta" ||
      $ruta["query"] == "ctrEliCuenta" ||
      $ruta["query"] == "ctrRegTransCuenta" ||
      $ruta["query"] == "ctrEliTransCuenta" ||
      $ruta["query"] == "ctrBusCuenta") {
    $metodo = $ruta["query"];
    $Cuenta = new ControladorCuenta();
    $Cuenta->$metodo();
  }
}

class ControladorCuenta {

  static public function ctrInformacionCuenta() {
    $respuesta = ModeloCuenta::mdlInformacionCuenta();
    return $respuesta;
  }

  static public function ctrRegCuenta() {
    require "../modelo/cuentaModelo.php";
    $data = array(
      "id_socio"    => $_POST["socio"],
      "num_cuenta"  => $_POST["numCuenta"]
    );
    $respuesta = ModeloCuenta::mdlRegCuenta($data);
    echo $respuesta;
  }

  static public function ctrInfoCuenta($id) {
    $respuesta = ModeloCuenta::mdlInfoCuenta($id);
    return $respuesta;
  }

  static public function ctrEditCuenta() {
    require "../modelo/cuentaModelo.php";
    $data = array(
      "id_cuenta"   => $_POST["idCuenta"],
      "num_cuenta"  => $_POST["numCuenta"],
      "estado_cuenta" => $_POST["estadoCuenta"]
    );
    $respuesta = ModeloCuenta::mdlEditCuenta($data);
    echo $respuesta;
  }

  static public function ctrEliCuenta() {
    require "../modelo/cuentaModelo.php";
    $id = $_POST["id"];
    $respuesta = ModeloCuenta::mdlEliCuenta($id);
    echo $respuesta;
  }

  //informacion de las transacciones de determinada cuenta
  static public function ctrInfoTransCuenta($idCuenta){
    $respuesta = ModeloCuenta::mdlInfoTransCuenta($idCuenta);
    return $respuesta;
  }
  
  static public function ctrInfoTransacciones(){
    $respuesta = ModeloCuenta::mdlInfoTransacciones();
    return $respuesta;
  }
  
  static public function ctrRegTransCuenta(){
    require "../modelo/cuentaModelo.php";
    
    $data = array(
      "id_cuenta"   => $_POST["idCuenta"],
      "tipo"  => $_POST["tipoTrans"],
      "concepto" => $_POST["concepto"],
      "monto" => $_POST["monto"]
    );
    
    $respuesta = ModeloCuenta::mdlRegTransCuenta($data);
    echo $respuesta;
  }
  
  static public function ctrEliTransCuenta(){
    require "../modelo/cuentaModelo.php";
    
    $id=$_POST["id"];
    $respuesta = ModeloCuenta::mdlEliTransCuenta($id);
    echo $respuesta;
  }
}