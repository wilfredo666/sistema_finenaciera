<?php  
require_once "conexion.php";

class ModeloSocio {

  // Obtener todos los socios
  static public function mdlInformacionSocio() {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM socio");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  // Registrar un nuevo socio
  static public function mdlRegSocio($data) {
    $nombre_socio = $data["nombre_socio"];
    $ap_pat_socio = $data["ap_pat_socio"];
    $ap_mat_socio = $data["ap_mat_socio"];
    $ci_socio = $data["ci_socio"];
    $direccion = $data["direccion"];
    $telefono_socio = $data["telefono_socio"];
    $email = $data["email"];

    $stmt = Conexion::conectar()->prepare("INSERT INTO socio (ci_socio, ap_pat_socio, ap_mat_socio, nombre_socio, direccion, telefono_socio, email) VALUES ('$ci_socio', '$ap_pat_socio', '$ap_mat_socio', '$nombre_socio', '$direccion', '$telefono_socio', '$email')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  // Obtener información de un socio específico
  static public function mdlInfoSocio($id) {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM socio WHERE id_socio = $id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  // Editar información de un socio
  static public function mdlEditSocio($data) {
    $id_socio = $data["id_socio"];
    $nombre_socio = $data["nombre_socio"];
    $ap_pat_socio = $data["ap_pat_socio"];
    $ap_mat_socio = $data["ap_mat_socio"];
    $ci_socio = $data["ci_socio"];
    $direccion = $data["direccion"];
    $telefono_socio = $data["telefono_socio"];
    $email = $data["email"];
    $estado_socio = $data["estado_socio"];

    $stmt = Conexion::conectar()->prepare("UPDATE socio SET 
            nombre_socio = '$nombre_socio', 
            ap_pat_socio = '$ap_pat_socio',  
            ap_mat_socio = '$ap_mat_socio', 
            ci_socio = '$ci_socio', 
            direccion = '$direccion', 
            telefono_socio = '$telefono_socio', 
            email = '$email', 
            estado_socio = '$estado_socio' 
            WHERE id_socio = $id_socio");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  // Eliminar un socio
  static public function mdlEliSocio($id) {
    try {
      $stmt = Conexion::conectar()->prepare("DELETE FROM socio WHERE id_socio = $id");
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
  
  static public function mdlCantidadSocios(){
    $stmt = Conexion::conectar()->prepare("select count(*) as socios from socio");

    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
}