<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Inventario</title>
    <link rel="shortcut icon" href="#">
    <!-- Google Font: Source Sans Pro -->
    <!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assest/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assest/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assest/dist/css/adminlte.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assest/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assest/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assest/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assest/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="assest/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assest/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="assest/plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assest/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="assest/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assest/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="assest/plugins/summernote/summernote-bs4.min.css">

    <!-- dropzonejs -->
    <link rel="stylesheet" href="assest/plugins/dropzone/min/dropzone.min.css">
    <!--icono-->
    <link rel="icon" href="assest/dist/img/material/product_default.png">

    <script type="text/javascript" src="assest/dist/js/otros/jquery.min.js"></script>
    <script type="text/javascript" src="assest/dist/js/otros/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assest/dist/js/otros/daterangepicker.css" />

    <style>
      table {
        /*font-size: 14px;*/
      }

      .brand-link {
        padding: 3%;
      }

      .main-header {
        padding: 0.2%;
      }

      aside {
        /* font-size: 0.9em;*/
      }

      table.dataTable tbody th,
      table.dataTable tbody td {
        /*padding: 0;*/
      }
      .table-title{
        border-left: 5px solid #6c757d;
        padding-left:5px;
        color:#484848;
      }
    </style>
  </head>

  <?php
  if (isset($_SESSION["ingreso"]) && $_SESSION["ingreso"] == "ok") {
    include "asideMenu.php";


    if (isset($_GET["ruta"])) {
      if (
        $_GET["ruta"] == "inicio"
        || $_GET["ruta"] == "salir"
        || $_GET["ruta"] == "VUsuario"
        || $_GET["ruta"] == "VPersonal"
      ) {
        $ruta = $_GET["ruta"] . ".php";
      }
      include $ruta;
      include "vista/footer.php";
    }
  } else {
    include "vista/login.php";
  }

  ?>