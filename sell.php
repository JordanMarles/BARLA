<?php session_start() ?>
<?php
/*
$cantidadTonicos = 89;
$numero = $cantidadTonicos/6;
$dato = explode('.', $numero); // "14.83333333" - array(14, 83333333333);
echo 'compró 89 tonicos<br>';
echo 'Kits: ' . $dato[0];
echo '<br>';
echo 'Tonicos' . ($cantidadTonicos - ($dato[0]*6));

<pre>
  <?php print_r($_SESSION) ?>
</pre>

*/
?>

<?php include 'class/requestClass.php' ?>
<?php use barla\request\requestClass as request ?>
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
          <h1><i class="mdi-action-assignment"></i> Menú de ventas</h1>
        </div>
        <div class="list-group">
          <a href="sellTonico.php" class="list-group-item">Tónico</a>
          <a href="sellJabon.php" class="list-group-item">Jabón</a>
          <a href="sellAceite.php" class="list-group-item">Aceite</a>
          <a href="sellTratamiento.php" class="list-group-item">Tratamiento</a>
          <a href="sellKit.php" class="list-group-item">Kit</a>
          <a href="clientData.php" class="list-group-item">Facturar</a>
          <a href="process/cancel.php" class="list-group-item">Cancelar venta</a>
        </div>
        
        <?php if(request::hasParamGet('tonico') === true and request::getParamGet('tonico') === 'false'): ?>
        <div class="alert alert-danger" role="alert">
          <i class="mdi-alert-error"></i> No hay stock para vender la cantidad de tónico deseadas
        </div>
        <?php endif ?>
        
        <?php if(request::hasParamGet('jabon') === true and request::getParamGet('jabon') === 'false'): ?>
        <div class="alert alert-danger" role="alert">
          <i class="mdi-alert-error"></i> No hay stock para vender la cantidad de jabón deseados
        </div>
        <?php endif ?>
        
      </div>
    </div>
    
    <?php include 'html/foot.php' ?>
  </body>
</html>
