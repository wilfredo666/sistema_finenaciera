<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
  </div>

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assest/plugins/jquery/jquery.min.js"></script>
<!-- ChartJS -->
<script src="assest/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="assest/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- Bootstrap 4 -->
<script src="assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assest/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assest/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assest/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assest/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assest/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assest/plugins/jszip/jszip.min.js"></script>
<script src="assest/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assest/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assest/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- InputMask -->
<script src="assest/plugins/moment/moment.min.js"></script>
<script src="assest/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- SweetAlert2 -->
<script src="assest/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- date-range-picker -->
<script src="assest/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="assest/plugins/select2/js/select2.full.min.js"></script>
<!-- dropzonejs -->
<script src="assest/plugins/dropzone/min/dropzone.min.js"></script>

<script src="assest/js/usuario.js"></script>
<script src="assest/js/personal.js"></script>
<script src="assest/js/socio.js"></script>
<script src="assest/js/cuenta.js"></script>
<script src="assest/js/credito.js"></script>


<!--====================
seccion de modals
=====================-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content" id="content-default">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="content-lg">


    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" id="content-xl">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- jquery-validation -->
<script src="assest/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assest/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="assest/plugins/jquery-validation/localization/messages_es.js"></script>

<script>
  /*dataTable generico*/
  $(function() {
    $("#DataTable").DataTable({
      "responsive": true,
      "lengthChange": false,
      "ordering":false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    }).buttons().container().appendTo('#DataTable_wrapper .col-md-6:eq(0)');
    $('#DataTable td').css('padding', '5px'); 
    //$('#DataTable td').css('text-align', 'center'); 
  });


  /*select2 para formulario NE*/
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

<script>

  //validacion para nota de ingreso
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirNotaIngreso()
      }
    });
    $("#FNotaIngreso").validate({
      rules: {
        codIngreso: {
          required: true,
          minlength: 1
        },
        conceptoIngreso: {
          required: true,
          minlength: 3
        },
        codProyecto: {
          required: true
        },
        provisionador: {
          required: true
        }
      },

      errorElement: "span",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error)
      },
      //destacar
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid")
      },

      //desmarcar
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass("is-invalid")
      }

    })
  })

  //validacion para nota de salida
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirNotaSalida()
      }
    });
    $("#FNotaSalida").validate({
      rules: {
        codSalida: {
          required: true,
          minlength: 1
        },
        conceptoSalida: {
          required: true,
          minlength: 3
        },
        codProyecto: {
          required: true
        },
        solicitante: {
          required: true
        }
      },

      errorElement: "span",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error)
      },
      //destacar
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid")
      },

      //desmarcar
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass("is-invalid")
      }

    })
  })

</script>



</body>

</html>