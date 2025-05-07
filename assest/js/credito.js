function MNuevoCredito() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/credito/FNuevoCredito.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegCredito() {

  var formData = new FormData($("#FormRegCredito")[0])

  $.ajax({
    type: "POST",
    url: "controlador/creditoControlador.php?ctrRegCredito",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El credito ha sido registrado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Error de registro!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}

function MEditCredito(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/credito/FEditCredito.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditCredito() {
  var formData = new FormData($("#FormEditCredito")[0])
  $.ajax({
    type: "POST",
    url: "controlador/creditoControlador.php?ctrEditCredito",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Credito actualizado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'No se ha podido actualizar!!!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}

function MEliCredito(id) {
  var obj = {
    id: id
  }
  Swal.fire({
    title: '¿Esta seguro de eliminar esta Credito?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/CreditoControlador.php?ctrEliCredito",
        success: function (data) {
          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Credito eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'La Credito no puede ser eliminado debido a estar activo',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}
