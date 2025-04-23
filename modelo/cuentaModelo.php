<?php  
require_once "conexion.php";

class ModeloCuenta {

  static public function mdlInformacionCuenta() {
    $stmt = Conexion::conectar()->prepare("SELECT id_cuenta, so.id_socio, num_cuenta, saldo, cta.create_at, estado_cuenta, so.nombre_socio, so.ap_pat_socio, so.ap_mat_socio FROM cuenta AS cta JOIN socio AS so ON so.id_socio=cta.id_socio");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegCuenta($data) {
    $id_socio = $data["id_socio"];
    $num_cuenta = $data["num_cuenta"];
    $saldo = $data["saldo"];

    $stmt = Conexion::conectar()->prepare("INSERT INTO cuenta (id_socio, num_cuenta, saldo) VALUES ('$id_socio', '$num_cuenta', '$saldo')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoCuenta($id) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM cuenta WHERE id_cuenta = $id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditCuenta($data) {
    $id_cuenta = $data["id_cuenta"];
    $id_socio = $data["id_socio"];
    $num_cuenta = $data["num_cuenta"];
    $saldo = $data["saldo"];
    $estado_cuenta = $data["estado_cuenta"];

    $stmt = Conexion::conectar()->prepare("UPDATE cuenta SET 
            id_socio = '$id_socio', 
            num_cuenta = '$num_cuenta', 
            saldo = '$saldo', 
            estado_cuenta = '$estado_cuenta'
            WHERE id_cuenta = $id_cuenta");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliCuenta($id) {
    try {
      $stmt = Conexion::conectar()->prepare("DELETE FROM cuenta WHERE id_cuenta = $id");
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