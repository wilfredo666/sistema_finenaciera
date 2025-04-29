<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista Mayor de Transacciones
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Socio</th>
          <th>Cuenta</th>
          <th>Monto (Bs.)</th>
          <th>Fecha Hora</th>
          <td>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $transaccion = ControladorCuenta::ctrInfoTransacciones();
        foreach ($transaccion as $value) {
        ?>
        <tr>
          <td><?php echo $value["id_transaccion"]; ?></td>
          <td><?php echo $value["nombre_socio"]." ".$value["ap_pat_socio"]." ".$value["ap_mat_socio"]; ?></td>
          <td><?php echo $value["num_cuenta"]; ?></td>
          <td><?php echo number_format($value["monto"], 2); ?> Bs</td>
          <td><?php echo $value["create_at"]; ?></td>
          <?php  
          if($value["estado_transaccion"] == 1){ ?>
          <td><span class="badge badge-success">Efectuda</span></td>
          <?php } else { ?>
          <td><span class="badge badge-danger">Declinada</span></td>
          <?php } ?>
          <td>
           
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </section>
</div>