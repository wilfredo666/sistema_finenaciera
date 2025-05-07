function MNuevaCuenta() {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/cuenta/FNuevaCuenta.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegCuenta() {

  var formData = new FormData($("#FormRegCuenta")[0])

  $.ajax({
    type: "POST",
    url: "controlador/cuentaControlador.php?ctrRegCuenta",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Cuenta ha sido registrada',
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

function MEditCuenta(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/cuenta/FEditCuenta.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditCuenta() {
  var formData = new FormData($("#FormEditCuenta")[0])
  $.ajax({
    type: "POST",
    url: "controlador/cuentaControlador.php?ctrEditCuenta",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'La Cuenta ha sido actualizada',
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

function MEliCuenta(id) {
  var obj = {
    id: id
  }
  Swal.fire({
    title: '¿Esta seguro de eliminar esta Cuenta?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/cuentaControlador.php?ctrEliCuenta",
        success: function (data) {
          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Cuenta eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'La Cuenta no puede ser eliminado debido a estar activo',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}

/*=============
Transaccion
==============*/
function MNTransCuenta(id){
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/cuenta/FNTransCuenta.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegTransCuenta(){
    var formData = new FormData($("#FRegTransCuenta")[0])

  $.ajax({
    type: "POST",
    url: "controlador/cuentaControlador.php?ctrRegTransCuenta",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Transaccion registrada',
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

function MEliTrans(id){
    var obj = {
    id: id
  }
  Swal.fire({
    title: '¿Eliminar transaccion?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/cuentaControlador.php?ctrEliTransCuenta",
        success: function (data) {
          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Transaccion eliminada',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'Comunicarse co el supervisor',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}
