<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nueva Cuenta</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form id="FormRegCuenta">
  <div class="modal-body row">
    <div class="form-group col-md-12">
      <label for="">Socio</label>
      <select name="socio" id="socio" class="form-control">
        <?php
        require "../../controlador/socioControlador.php";
        require "../../modelo/socioModelo.php";

        $Socio = ControladorSocio::ctrInformacionSocio();
        foreach($Socio as $value){
        ?>
        <option value="<?php echo $value["id_socio"];?>"><?php echo $value["nombre_socio"]." ".$value["ap_pat_socio"]." ".$value["ap_mat_socio"]; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label for="">Numero de Cuenta</label>
      <input type="text" class="form-control" id="numCuenta" name="numCuenta">
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
  </div>
</form>


<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        RegCuenta()
      }
    })
    $(document).ready(function() {
      $("#FormRegCuenta").validate({
        rules: {
          socio: {
            required: true,
          },
          numCuenta: {
            required: true,
            minlength: 3
          }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback')
          element.closest('.form-group').append(error)
        },

        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid')
        },

        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid')
        }

      })
    })

  })

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>