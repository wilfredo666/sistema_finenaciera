<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);
$idCuenta=$ruta["query"];

$cuenta = ControladorCuenta::ctrInfoCuenta($idCuenta);


?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          Informacion de la cuenta
        </div>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>

      </div>
      <div class="card-body">

        <table class="table table-info">
          <tr>
            <th>SOCIO:</th>
            <td><?php echo $cuenta["nombre_socio"]." ".$cuenta["ap_pat_socio"]." ".$cuenta["ap_mat_socio"];?></td>
            <th> NUM. DE CUENTA:</th>
            <td><?php echo $cuenta["num_cuenta"];?></td>
          </tr>
          <tr>
            <th>
              FECHA DE CREACION:
            </th>
            <td>
              <?php echo $cuenta["create_at"];?>
            </td>
            <th>
              SALDO:
            </th>
            <td>
              <?php echo $cuenta["saldo"];?> Bs
            </td>
          </tr>
          <tr>
            <th>
              ESTADO:
            </th>
            <?php  
            if($cuenta["estado_cuenta"] == 1){ ?>
            <td><span class="badge badge-success">Activa</span></td>
            <?php } else { ?>
            <td><span class="badge badge-danger">Inactiva</span></td>
            <?php } ?>
          </tr>
        </table>

      </div>
    </div>
    <h5 class="table-title">
      Lista de transacciones
    </h5>
    <table id="DataTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Tipo</th>
          <th>Concepto</th>
          <th>Monto (Bs.)</th>
          <th>Fecha</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-block btn-primary btn-sm" onclick="MNTransCuenta(<?php echo $idCuenta;?>)">
              <i class="fas fa-plus"></i> Nueva Transaccion
            </button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $c=0;
        $transaccion = ControladorCuenta::ctrInfoTransCuenta($idCuenta);
        foreach ($transaccion as $value) {
        ?>
        <tr>
         <td><?php echo $c=$c+1; ?></td>
          <td><?php echo $value["tipo"]; ?></td>
          <td><?php echo $value["concepto"]; ?></td>
          <td><?php echo number_format($value["monto"], 2); ?></td>
          <td><?php echo $value["create_at"]; ?></td>
          <?php  
          if($value["estado_transaccion"] == 1){ ?>
          <td><span class="badge badge-success">Efectuado</span></td>
          <?php } else { ?>
          <td><span class="badge badge-danger">Declinado</span></td>
          <?php } ?>
          <td>
            <div class="btn-group">
              <button class="btn btn-sm btn-danger" onclick="MEliTrans(<?php echo $value['id_transaccion']; ?>)">
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