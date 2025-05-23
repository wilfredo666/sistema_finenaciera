<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <h5 class="table-title">
      Lista del Socios
    </h5>
 <table id="DataTable" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nombre(s)</th>
      <th>Ap. Paterno</th>
      <th>Ap. Materno</th>
      <th>C.I.</th>
      <th>Dirección</th>
      <th>Teléfono</th>
      <th>Email</th>
      <th>Estado</th>
      <td>
        <button class="btn btn-block btn-primary btn-sm" onclick="MNuevoSocio()">
          <i class="fas fa-plus"></i> Nuevo
        </button>
      </td>
    </tr>
  </thead>
  <tbody>
    <?php
    $socios = ControladorSocio::ctrInformacionSocio();
    foreach ($socios as $value) {
    ?>
    <tr>
      <td><?php echo $value["nombre_socio"]; ?></td>
      <td><?php echo $value["ap_pat_socio"]; ?></td>
      <td><?php echo $value["ap_mat_socio"]; ?></td>
      <td><?php echo $value["ci_socio"]; ?></td>
      <td><?php echo $value["direccion"]; ?></td>
      <td><?php echo $value["telefono_socio"]; ?></td>
      <td><?php echo $value["email"]; ?></td>
      <?php  
        if($value["estado_socio"] == 1){ ?>
          <td><span class="badge badge-success">Activo</span></td>
      <?php } else { ?>
          <td><span class="badge badge-danger">Inactivo</span></td>
      <?php } ?>
      <td>
        <div class="btn-group">
          <button class="btn btn-sm btn-secondary" onclick="MEditSocio(<?php echo $value['id_socio']; ?>)">
            <i class="fas fa-edit"></i>
          </button>
          <button class="btn btn-sm btn-danger" onclick="MEliSocio(<?php echo $value['id_socio']; ?>)">
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