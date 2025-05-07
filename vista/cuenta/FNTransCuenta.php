<?php

$id = $_GET["id"];

?>

<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Nueva Transaccion</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form id="FRegTransCuenta">
  <div class="modal-body row">

    <fieldset class="border col-md-12 row" style="margin-left:0">
      <legend class="float-none w-auto px-3"><b style="font-size:20px">Tipo</b></legend>
      
      <div class="form-group col-md-6">
        <div class="custom-control form-group custom-radio">
          <input class="custom-control-input" type="radio" id="customRadio1" name="tipoTrans" value="ingreso" checked>
          <label for="customRadio1" class="custom-control-label">Ingreso</label>
        </div>
      </div>

      <div class="form-group col-md-6">
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" id="customRadio2" name="tipoTrans" value="salida">
          <label for="customRadio2" class="custom-control-label">Salida</label>
        </div>
      </div>
      <input type="hidden" name="idCuenta" value="<?php echo $id;?>">
    </fieldset>

    <div class="form-group col-md-12">
      <label for="">Concepto</label>
      <input type="text" class="form-control" id="concepto" name="concepto">
      <input type="hidden" value="<?php echo $id;?>" name="idCuenta">
    </div>

    <div class="form-group col-md-12">
      <label for="">Monto</label>
      <input type="number" class="form-control" id="monto" name="monto">
    </div>

  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>


<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        RegTransCuenta()
      }
    })
    $(document).ready(function() {
      $("#FRegTransCuenta").validate({
        rules: {
          monto: {
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
