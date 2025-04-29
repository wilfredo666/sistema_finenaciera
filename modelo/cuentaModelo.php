<?php  
require_once "conexion.php";

class ModeloCuenta {

  static public function mdlInformacionCuenta() {
    $stmt = Conexion::conectar()->prepare("SELECT id_cuenta, so.id_socio, num_cuenta, saldo, cta.create_at, estado_cuenta, so.nombre_socio, so.ap_pat_socio, cta.create_at, so.ap_mat_socio FROM cuenta AS cta JOIN socio AS so ON so.id_socio=cta.id_socio");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegCuenta($data) {
    $id_socio = $data["id_socio"];
    $num_cuenta = $data["num_cuenta"];

    $stmt = Conexion::conectar()->prepare("INSERT INTO cuenta (id_socio, num_cuenta) VALUES ($id_socio, '$num_cuenta')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoCuenta($id) {
    $stmt = Conexion::conectar()->prepare("SELECT id_cuenta, num_cuenta, saldo, estado_cuenta, so.nombre_socio, so.ap_pat_socio, so.ap_mat_socio, cta.create_at FROM cuenta AS cta JOIN socio AS so ON so.id_socio=cta.id_socio WHERE id_cuenta = $id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditCuenta($data) {
    $id_cuenta = $data["id_cuenta"];
    $estado_cuenta = $data["estado_cuenta"];
    $num_cuenta = $data["num_cuenta"];

    $stmt = Conexion::conectar()->prepare("UPDATE cuenta SET 
            num_cuenta = '$num_cuenta',
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

  static public function mdlInfoTransCuenta($idCuenta){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM transaccion WHERE id_cuenta=$idCuenta");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->closeCursor();
  }
  
  static public function mdlInfoTransacciones(){
    $stmt = Conexion::conectar()->prepare("SELECT cta.num_cuenta, so.nombre_socio, so.ap_pat_socio, so.ap_mat_socio, tr.id_transaccion, tr.tipo, tr.concepto, tr.monto, tr.create_at, tr.estado_transaccion FROM transaccion AS tr
JOIN cuenta AS cta
ON cta.id_cuenta=tr.id_cuenta
JOIN socio AS so
ON so.id_socio=cta.id_socio");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->closeCursor();
  }
}