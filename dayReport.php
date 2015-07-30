<?php session_start() ?>
<?php include 'class/productClass.php' ?>
<?php include 'class/jabonClass.php' ?>
<?php include 'class/tonicoClass.php' ?>
<?php include 'class/dayReportClass.php' ?>
<?php use barla\jabon\jabonClass as jabon ?>
<?php use barla\tonico\tonicoClass as tonico ?>
<?php use barla\dayReport\dayReportClass as dayReport ?>
<?php $tonico = new tonico() ?>
<?php $jabon = new jabon() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>BARLA - Sistema de ventas</title>
    <?php include 'html/head.php' ?>
  </head>
  <body>
    <div class="container container-fluid">
      <div class="well" id="dayReport">
        <div class="page-header">
          <h1><i class="mdi-action-assignment-ind"></i> Informe del día</h1>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Artículo</th>
                <th>Cantidad en Stock</th>
                <th>Cantidad vendida</th>
                <th>Valor de venta</th>
                <th>Valor de producción</th>
                <th>Ganancia</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $tonico->getName() ?></td>
                <td><?php echo $tonico->getStock() ?></td>
                <td><?php echo dayReport::getTonico() ?></td>
                <td><?php echo $tonico->getSalePrice() ?></td>
                <td><?php echo $tonico->getProductionPrice() ?></td>
                <td><?php echo $vTonico = dayReport::calcProfit(dayReport::getTonico(), $tonico->getSalePrice(), $tonico->getProductionPrice()) ?></td>
              </tr>
              <tr>
                <td><?php echo $jabon->getName() ?></td>
                <td><?php echo $jabon->getStock() ?></td>
                <td><?php echo dayReport::getJabon() ?></td>
                <td><?php echo $jabon->getSalePrice() ?></td>
                <td><?php echo $jabon->getProductionPrice() ?></td>
                <td><?php echo $vJabon = dayReport::calcProfit(dayReport::getJabon(), $jabon->getSalePrice(), $jabon->getProductionPrice()) ?></td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2">Cantidad vendida</td>
                <td class="izquierda"><?php echo dayReport::getTonico() + dayReport::getJabon() ?></td>
                <td colspan="2">Ganancia Total</td>
                <td class="izquierda"><?php echo $vTonico + $vJabon ?></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <a href="mainMenu.php" class="btn btn-primary">Volver</a>
      </div>
    </div>
    <?php include 'html/foot.php'; ?>
  </body>
</html>
