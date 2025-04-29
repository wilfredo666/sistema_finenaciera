<?php
require "../../controlador/cuentaControlador.php";
require "../../modelo/cuentaModelo.php";

$id = $_GET["id"];
$cuenta = ControladorCuenta::ctrInfoCuenta($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Cuenta</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditCuenta">
  <div class="modal-body row">
    <div class="form-group col-md-12">
      <label for="">Socio</label>
      <input type="text" class="form-control" id="socio" name="socio" value="<?php echo $cuenta["nombre_socio"]." ".$cuenta["ap_pat_socio"]." ".$cuenta["ap_mat_socio"]; ?>" readonly>
      <input type="hidden" name="idCuenta" id="idCuenta" value="<?php echo $id; ?>">
    </div>
    <div class="form-group col-md-12">
      <label for="">Num Cuenta</label>
      <input type="text" class="form-control" id="numCuenta" name="numCuenta" value="<?php echo $cuenta['num_cuenta']; ?>">
    </div>
    <div class="form-group col-md-12">
      <label for="">Estado</label>
      <select name="estadoCuenta" id="estadoCuenta" class="form-control">
        <option value="1" <?php if ($cuenta["estado_cuenta"] == 1) : ?> selected <?php endif; ?>>Activa</option>
        <option value="0" <?php if ($cuenta["estado_cuenta"] == 0) : ?> selected <?php endif; ?>>Inactiva</option>
      </select>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>

<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        EditCuenta()
      }
    })
    $(document).ready(function() {
      $("#FormEditCuenta").validate({
        rules: {
          numCuenta: {
            required: true
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
</script>