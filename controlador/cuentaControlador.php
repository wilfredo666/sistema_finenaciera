<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);
if (isset($ruta["query"])) {
    if ($ruta["query"] == "ctrRegCuenta" ||
        $ruta["query"] == "ctrEditCuenta" ||
        $ruta["query"] == "ctrEliCuenta" ||
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
            "id_socio"    => $_POST["id_socio"],
            "num_cuenta"  => $_POST["num_cuenta"],
            "saldo"       => $_POST["saldo"]
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
            "id_cuenta"   => $_POST["id_cuenta"],
            "id_socio"    => $_POST["id_socio"],
            "num_cuenta"  => $_POST["num_cuenta"],
            "saldo"       => $_POST["saldo"],
            "estado_cuenta" => $_POST["estado_cuenta"]
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
}