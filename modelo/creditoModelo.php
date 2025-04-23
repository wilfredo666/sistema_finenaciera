<?php  
require_once "conexion.php";

class ModeloCredito {

  static public function mdlInformacionCredito() {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM credito");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegCredito($data) {
    $id_socio = $data["id_socio"];
    $monto = $data["monto"];
    $fecha_vencimiento = $data["fecha_vencimiento"];

    $stmt = Conexion::conectar()->prepare("INSERT INTO credito (id_socio, monto, fecha_vencimiento) VALUES ('$id_socio', '$monto', '$fecha_vencimiento')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoCredito($id) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM credito WHERE id_credito = $id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditCredito($data) {
    $id_credito = $data["id_credito"];
    $id_socio = $data["id_socio"];
    $monto = $data["monto"];
    $fecha_aprobacion = $data["fecha_aprobacion"];
    $fecha_vencimiento = $data["fecha_vencimiento"];
    $estado_credito = $data["estado_credito"];

    $stmt = Conexion::conectar()->prepare("UPDATE credito SET 
            id_socio = '$id_socio', 
            monto = '$monto', 
            fecha_aprobacion = '$fecha_aprobacion', 
            fecha_vencimiento = '$fecha_vencimiento', 
            estado_credito = '$estado_credito'
            WHERE id_credito = $id_credito");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliCredito($id) {
    try {
      $stmt = Conexion::conectar()->prepare("DELETE FROM credito WHERE id_credito = $id");
      $stmt->execute();
    } catch (PDOException $e) {
      $codeError = $e->getCode();
      if ($codeError == "23000") {
        return "error";
        $stmt->close();
        $stmt->null;
      }
    }
    return "ok";
    $stmt->close();
    $stmt->null;
  }

  /*===========
  pagos
  ===========*/

  static public function mdlInformacionPago() {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM pago");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegPago($data) {
    $id_credito = $data["id_credito"];
    $monto_pagado = $data["monto_pagado"];

    $stmt = Conexion::conectar()->prepare("INSERT INTO pago (id_credito, monto_pagado) VALUES ('$id_credito', '$monto_pagado')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoPago($id) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM pago WHERE id_pago = $id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditPago($data) {
    $id_pago = $data["id_pago"];
    $id_credito = $data["id_credito"];
    $monto_pagado = $data["monto_pagado"];
    $estado_pago = $data["estado_pago"];

    $stmt = Conexion::conectar()->prepare("UPDATE pago SET 
            id_credito = '$id_credito', 
            monto_pagado = '$monto_pagado', 
            estado_pago = '$estado_pago'
            WHERE id_pago = $id_pago");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliPago($id) {
    try {
      $stmt = Conexion::conectar()->prepare("DELETE FROM pago WHERE id_pago = $id");
      $stmt->execute();
    } catch (PDOException $e) {
      $codeError = $e->getCode();
      if ($codeError == "23000") {
        return "error";
        $stmt->close();
        $stmt->null;
      }
    }
    return "ok";
    $stmt->close();
    $stmt->null;
  }
}