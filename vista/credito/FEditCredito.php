<?php
require "../../controlador/creditoControlador.php";
require "../../modelo/creditoModelo.php";

$id = $_GET["id"];
$credito = ControladorCredito::ctrInfoCredito($id);
?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Editar Credito</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditCredito">
  <div class="modal-body row">
    <div class="form-group col-md-12">
      <label for="">Socio</label>
      <input type="text" name="socio" class="form-control" value="<?php echo $credito["nombre_socio"]." ".$credito["ap_pat_socio"]." ".$credito["ap_mat_socio"]; ?>" readonly>
      <input type="hidden" name="idCredito" value="<?php echo $id;?>">

    </div>
    <div class="form-group col-md-6">
      <label for="">Monto</label>
      <input type="text" class="form-control" id="monto" name="monto" value="<?php echo $credito["monto"];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Fecha de vencimiento</label>
      <input type="date" class="form-control" id="fechaVencimiento" name="fechaVencimiento" value="<?php echo $credito["fecha_vencimiento"];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Fecha de Aprobacion</label>
      <input type="date" class="form-control" id="fechaAprobacion" name="fechaAprobacion" value="<?php echo $credito["fecha_aprobacion"];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="">Estado</label>
      <select name="estado" id="estado" class="form-control">
        <option value="pendiente" <?php if($credito["estado_credito"]=="pendiente"):?>selected<?php endif;?>>Pendiente</option>
        <option value="aprobado" <?php if($credito["estado_credito"]=="aprobado"):?>selected<?php endif;?>>Aprobado</option>
        <option value="cancelado" <?php if($credito["estado_credito"]=="cancelado"):?>selected<?php endif;?>>Cancelado</option>
      </select>
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
        EditCredito()
      }
    })
    $(document).ready(function() {
      $("#FormEditCredito").validate({
        rules: {
          monto: {
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