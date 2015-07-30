<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <?php include 'html/head.php' ?>
  </head>
  <body>
    <div class="container container-fluid">
      <div class="well" id="wellIdentificacion">
        <div class="page-header">
          <h1><i class="mdi-action-assignment-ind"></i> Kit</h1>
        </div>
        <form method="post" action="process/processKit.php">
          <input type="number" id="inputCantidadKit" name="inputCantidadKit" class="form-control input-lg" placeholder="Cantidad de Kit" required autofocus>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
        </form>
      </div>
    </div>
    <?php include 'html/foot.php' ?>
  </body>
</html>
