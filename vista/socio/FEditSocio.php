<?php
require "../../controlador/socioControlador.php";
require "../../modelo/socioModelo.php";

$id = $_GET["id"];
$Socio = ControladorSocio::ctrInfoSocio($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Socio</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditSocio">
  <div class="modal-body row">
    <div class="form-group col-md-12">
      <label for="">Nombres</label>
      <input type="text" class="form-control" id="nomSocio" name="nomSocio" value="<?php echo $Socio['nombre_socio']; ?>">
      <input type="hidden" name="idSocio" id="idSocio" value="<?php echo $id; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" id="patSocio" name="patSocio" value="<?php echo $Socio['ap_pat_socio']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Materno</label>
      <input type="text" class="form-control" id="matSocio" name="matSocio" value="<?php echo $Socio['ap_mat_socio']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">C.I.</label>
      <input type="text" class="form-control" id="ciSocio" name="ciSocio" value="<?php echo $Socio['ci_socio']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">E-mail</label>
      <input type="email" class="form-control" id="emailSocio" name="emailSocio" value="<?php echo $Socio['email']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Teléfono</label>
      <input type="text" class="form-control" id="telSocio" name="telSocio" value="<?php echo $Socio['telefono_socio']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Dirección</label>
      <input type="text" class="form-control" id="dirSocio" name="dirSocio" value="<?php echo $Socio['direccion']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Estado</label>
      <select name="estadoSocio" id="estadoSocio" class="form-control">
        <option value="1" <?php if ($Socio["estado_socio"] == 1) : ?> selected <?php endif; ?>>Activo</option>
        <option value="0" <?php if ($Socio["estado_socio"] == 0) : ?> selected <?php endif; ?>>Inactivo</option>
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
        EditSocio()
      }
    })
    $(document).ready(function() {
      $("#FormEditSocio").validate({
        rules: {
          nomSocio: {
            required: true,
            minlength: 3
          },
          ciSocio: {
            required: true,
          },
          patSocio: {
            required: true,
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