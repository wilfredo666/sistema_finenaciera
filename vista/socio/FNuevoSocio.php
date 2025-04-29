<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Registrar nuevo Socio</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegSocio">
  <div class="modal-body row">
    <div class="form-group col-md-12">
      <label for="">Nombres</label>
      <input type="text" class="form-control" id="nomSocio" name="nomSocio">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Paterno</label>
      <input type="text" class="form-control" id="patSocio" name="patSocio">
    </div>
    <div class="form-group col-md-6">
      <label for="">Apellido Materno</label>
      <input type="text" class="form-control" id="matSocio" name="matSocio">
    </div>
    <div class="form-group col-md-6">
      <label for="">C.I.</label>
      <input type="text" class="form-control" id="ciSocio" name="ciSocio">
    </div>
    <div class="form-group col-md-6">
      <label for="">E-mail</label>
      <input type="email" class="form-control" id="emailSocio" name="emailSocio">
    </div>
    <div class="form-group col-md-6">
      <label for="">Teléfono</label>
      <input type="text" class="form-control" id="telSocio" name="telSocio">
    </div>
    <div class="form-group col-md-6">
      <label for="">Dirección</label>
      <input type="text" class="form-control" id="dirSocio" name="dirSocio">
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
        RegSocio()
      }
    })
    $(document).ready(function() {
      $("#FormRegSocio").validate({
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

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>