<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista del Creditos
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Socio</th>
      <th>Monto</th>
      <th>Fecha Solicitud</th>
      <th>Fecha Vencimiento</th>
      <th>Estado</th>
      <td>
        <button class="btn btn-block btn-primary btn-sm" onclick="MNuevoCredito()">
          <i class="fas fa-plus"></i> Nuevo Crédito
        </button>
      </td>
    </tr>
  </thead>
  <tbody>
    <?php
    $creditos = ControladorCredito::ctrInformacionCredito();
    foreach ($creditos as $value) {
    ?>
    <tr>
      <td><?php echo $value["id_socio"]; ?></td>
      <td><?php echo number_format($value["monto"], 2); ?> Bs</td>
      <td><?php echo $value["fecha_solicitud"]; ?></td>
      <td><?php echo $value["fecha_vencimiento"]; ?></td>
      <td><span class="badge badge-<?php echo $value["estado_credito"] == 'aprobado' ? 'success' : ($value["estado_credito"] == 'pendiente' ? 'warning' : 'danger'); ?>">
          <?php echo ucfirst($value["estado_credito"]); ?>
      </span></td>
      <td>
        <div class="btn-group">
          <button class="btn btn-sm btn-info" onclick="MVerCredito(<?php echo $value['id_credito']; ?>)">
            <i class="fas fa-eye"></i>
          </button>
          <button class="btn btn-sm btn-secondary" onclick="MEditCredito(<?php echo $value['id_credito']; ?>)">
            <i class="fas fa-edit"></i>
          </button>
          <button class="btn btn-sm btn-danger" onclick="MEliCredito(<?php echo $value['id_credito']; ?>)">
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