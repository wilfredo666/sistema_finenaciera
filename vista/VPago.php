<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista del Pagos
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Crédito</th>
          <th>Monto Pagado</th>
          <th>Fecha de Pago</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-block btn-primary btn-sm" onclick="MNuevoPago()">
              <i class="fas fa-plus"></i> Nuevo Pago
            </button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $pagos = ControladorCredito::ctrInformacionPago();
        foreach ($pagos as $value) {
        ?>
        <tr>
          <td><?php echo $value["id_credito"]; ?></td>
          <td><?php echo number_format($value["monto_pagado"], 2); ?> Bs</td>
          <td><?php echo $value["create_at"]; ?></td>
          <td><span class="badge badge-<?php echo $value["estado_pago"] == 'confirmado' ? 'success' : 'warning'; ?>">
            <?php echo ucfirst($value["estado_pago"]); ?>
            </span></td>
          <td>
            <div class="btn-group">
              <button class="btn btn-sm btn-info" onclick="MVerPago(<?php echo $value['id_pago']; ?>)">
                <i class="fas fa-eye"></i>
              </button>
              <button class="btn btn-sm btn-secondary" onclick="MEditPago(<?php echo $value['id_pago']; ?>)">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-danger" onclick="MEliPago(<?php echo $value['id_pago']; ?>)">
                <i class="fas fa-trash"></i>
              </button>
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