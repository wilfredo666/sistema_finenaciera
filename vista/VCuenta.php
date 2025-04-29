<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista de Cuentas
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Número de Cuenta</th>
          <th>Socio</th>
          <th>Saldo</th>
          <th>Fecha Creacion</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-block btn-primary btn-sm" onclick="MNuevaCuenta()">
              <i class="fas fa-plus"></i> Nueva Cuenta
            </button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $cuentas = ControladorCuenta::ctrInformacionCuenta();
        foreach ($cuentas as $value) {
        ?>
        <tr>
          <td><?php echo $value["num_cuenta"]; ?></td>
          <td><?php echo $value["nombre_socio"]." ".$value["ap_pat_socio"]." ".$value["ap_mat_socio"]; ?></td>
          <td><?php echo number_format($value["saldo"], 2); ?> Bs</td>
          <td><?php echo $value["create_at"]; ?></td>
          <?php  
          if($value["estado_cuenta"] == 1){ ?>
          <td><span class="badge badge-success">Activa</span></td>
          <?php } else { ?>
          <td><span class="badge badge-danger">Inactiva</span></td>
          <?php } ?>
          <td>
            <div class="btn-group">
              <button class="btn btn-sm btn-secondary" onclick="MEditCuenta(<?php echo $value['id_cuenta']; ?>)">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-danger" onclick="MEliCuenta(<?php echo $value['id_cuenta']; ?>)">
                <i class="fas fa-trash"></i>
              </button>
              <a class="btn btn-sm btn-warning" href="VTransaccionCuenta?<?php echo $value['id_cuenta'];?>">
                <i class="fas fa-cash-register"></i>
              </a>
            </div>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </section>
</div>