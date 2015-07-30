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
          <h1><i class="mdi-action-assignment-ind"></i> Tónico</h1>
        </div>
        <form method="post" action="process/processTonico.php">
          <input type="number" id="inputCantidadTonico" name="inputCantidadTonico" class="form-control input-lg" placeholder="Cantidad de Tónico" required autofocus>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
        </form>
      </div>
    </div>
    <?php include 'html/foot.php' ?>
  </body>
</html>
