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
          <h1><i class="mdi-action-assignment-ind"></i> Tratamiento</h1>
        </div>
        <form method="post" action="process/processTratamiento.php">
          <input type="number" id="inputCantidadTratamiento" name="inputCantidadTratamiento" class="form-control input-lg" placeholder="Cantidad de Tratamiento" required autofocus>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
        </form>
      </div>
    </div>
    <?php include 'html/foot.php' ?>
  </body>
</html>
