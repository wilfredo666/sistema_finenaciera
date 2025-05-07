<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);
if (isset($ruta["query"])) {
  if ($ruta["query"] == "ctrRegCredito" ||
      $ruta["query"] == "ctrEditCredito" ||
      $ruta["query"] == "ctrEliCredito" ||
      $ruta["query"] == "ctrBusCredito" ||
      $ruta["query"] == "ctrRegPago" ||
      $ruta["query"] == "ctrEditPago" ||
      $ruta["query"] == "ctrEliPago" ||
      $ruta["query"] == "ctrBusPago") {
    $metodo = $ruta["query"];
    $Credito = new ControladorCredito();
    $Credito->$metodo();
  }
}

class ControladorCredito {

  static public function ctrInformacionCredito() {
    $respuesta = ModeloCredito::mdlInformacionCredito();
    return $respuesta;
  }

  static public function ctrRegCredito() {
    require "../modelo/creditoModelo.php";
    $data = array(
      "id_socio"         => $_POST["socio"],
      "monto"            => $_POST["monto"],
      "fecha_vencimiento"=> $_POST["fechaVencimiento"]
    );
    $respuesta = ModeloCredito::mdlRegCredito($data);
    echo $respuesta;
  }

  static public function ctrInfoCredito($id) {
    $respuesta = ModeloCredito::mdlInfoCredito($id);
    return $respuesta;
  }

  static public function ctrEditCredito() {
    require "../modelo/creditoModelo.php";
    $data = array(
      "id_credito"       => $_POST["idCredito"],
      "monto"            => $_POST["monto"],
      "fecha_aprobacion" => $_POST["fechaAprobacion"],
      "fecha_vencimiento"=> $_POST["fechaVencimiento"],
      "estado_credito"   => $_POST["estado"]
    );
    $respuesta = ModeloCredito::mdlEditCredito($data);
    echo $respuesta;
  }

  static public function ctrEliCredito() {
    require "../modelo/creditoModelo.php";
    $id = $_POST["id"];
    $respuesta = ModeloCredito::mdlEliCredito($id);
    echo $respuesta;
  }
  
  /*==============
    Pagos
  ===============*/
    static public function ctrInformacionPago() {
        $respuesta = ModeloCredito::mdlInformacionPago();
        return $respuesta;
    }

    static public function ctrRegPago() {
        require "../modelo/creditoModelo.php";
        $data = array(
            "id_credito"   => $_POST["id_credito"],
            "monto_pagado" => $_POST["monto_pagado"]
        );
        $respuesta = ModeloCredito::mdlRegPago($data);
        echo $respuesta;
    }

    static public function ctrInfoPago($id) {
        $respuesta = ModeloCredito::mdlInfoPago($id);
        return $respuesta;
    }

    static public function ctrEditPago() {
        require "../modelo/creditoModelo.php";
        $data = array(
            "id_pago"      => $_POST["id_pago"],
            "id_credito"   => $_POST["id_credito"],
            "monto_pagado" => $_POST["monto_pagado"],
            "estado_pago"  => $_POST["estado_pago"]
        );
        $respuesta = ModeloCredito::mdlEditPago($data);
        echo $respuesta;
    }

    static public function ctrEliPago() {
        require "../modelo/creditoModelo.php";
        $id = $_POST["id"];
        $respuesta = ModeloCredito::mdlEliPago($id);
        echo $respuesta;
    }
  
    static public function ctrCantidadCredito(){
    $respuesta = ModeloCredito::mdlCantidadCredito();
    return $respuesta;
  }

}