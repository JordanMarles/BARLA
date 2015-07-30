<?php session_start() ?>
<?php include 'class/productClass.php' ?>
<?php include 'class/jabonClass.php' ?>
<?php include 'class/tonicoClass.php' ?>
<?php include 'class/billClass.php' ?>
<?php use barla\jabon\jabonClass as jabon ?>
<?php use barla\tonico\tonicoClass as tonico ?>
<?php use barla\bill\billClass as bill ?>
<?php $bill = new bill() ?>
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
      <div class="well" id="wellMain">
        <div class="page-header">
          <h1><i class="mdi-action-assignment"></i> Factura de venta</h1>
        </div>

        <fieldset>
          <legend>Datos de factura</legend>
          <table class="table table-bordered">
            <thead>
              <tr>
                <td colspan="2"><?php echo bill::COMPANY ?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo bill::NIT ?></td>
              </tr>
              <tr>
                <td class="tableColumn50"><?php echo number_format($bill->getIdClient(),0,',','.') ?></td>
                <td class="tableColumn50"><?php echo $bill->getNameClient() ?></td>
              </tr>
            </thead>
          </table>
        </fieldset>
        
        <?php if($bill->getTonico() > 0): ?>
        <fieldset>
          <legend><?php echo $tonico->getName() ?></legend>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="tableColumn50">Valor unitario</td>
                <td class="tableColumn50">$ <?php echo number_format($tonico->getSalePrice()) ?></td>
              </tr>
              <tr>
                <td>Cantidad comprada</td>
                <td><?php echo $bill->getTonico() ?></td>
              </tr>
              <tr>
                <td>Costo total del producto</td>
                <td>$ <?php echo number_format(bill::getValorTotalTonico()) ?></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        <?php endif ?>
        
        <?php if($bill->getJabon() > 0): ?>
        <fieldset>
          <legend><?php echo $jabon->getName() ?></legend>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="tableColumn50">Valor unitario</td>
                <td class="tableColumn50">$ <?php echo number_format($jabon->getSalePrice()) ?></td>
              </tr>
              <tr>
                <td>Cantidad comprada</td>
                <td><?php echo $bill->getJabon() ?></td>
              </tr>
              <tr>
                <td>Costo total del producto</td>
                <td>$ <?php echo number_format(bill::getValorTotalJabon()) ?></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        <?php endif ?>
        
        <fieldset>
          <legend>Valores totales</legend>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="tableColumn50">SubTotal</td>
                <td class="tableColumn50">$ <?php echo number_format(bill::getSubTotal()) ?></td>
              </tr>
              <tr>
                <td>IVA</td>
                <td>$ <?php echo number_format(bill::getTotalIVA(),1) ?></td>
              </tr>
              <tr>
                <td>TOTAL</td>
                <td>$ <?php echo number_format(bill::getGranTotal(),1) ?></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <a href="mainMenu.php" class="btn btn-block btn-primary">Volver</a>
      </div>
    </div>

<?php include 'html/foot.php' ?>
  </body>
</html>
<?php bill::delete() ?>