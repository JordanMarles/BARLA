<?php session_start() ?>
<?php include 'class/routingClass.php' ?>
<?php include 'class/productClass.php' ?>
<?php include 'class/jabonClass.php' ?>
<?php include 'class/tonicoClass.php' ?>
<?php include 'class/billClass.php' ?>
<?php use barla\bill\billClass as bill ?>
<?php use barla\routing\routingClass as routing ?>
<?php $bill = new bill() ?>
<?php // ($bill->getShirt() === 0 and $bill->getPants() === 0) ? routing::redirect('mainMenu.php') : null ?>
<?php // if ($bill->getShirt() === 0 and $bill->getPants() === 0) routing::redirect('mainMenu.php') ?>
<?php if ($bill->getTonico() === 0 and $bill->getJabon() === 0) { routing::redirect('sell.php'); } ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>BARLA - Sistema de ventas</title>
    <?php include 'html/head.php' ?>
  </head>
  <body>
    <div class="container container-fluid">
      <div class="well" id="wellIdentificacion">
        <div class="page-header">
          <h1><i class="mdi-action-assignment-ind"></i> Datos del cliente</h1>
        </div>
        <form method="post" action="process/processClientData.php">
          <input type="text" id="inputId" name="inputId" class="form-control input-lg" placeholder="Digite documento" required autofocus>
          <input type="text" id="inputName" name="inputName" class="form-control input-lg" placeholder="Nombre del cliente" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Facturar</button>
        </form>
      </div>
    </div>
    <?php include 'html/foot.php'; ?>
  </body>
</html>
