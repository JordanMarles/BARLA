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
      <div class="well" id="wellIdentificacion">
        <div class="page-header">
          <h1><i class="mdi-action-assignment-ind"></i>Iniciar sesión</h1>
        </div>
        <form method="post" action="process/login.php">
          <input type="text" id="inputUser" name="inputUser" class="form-control input-lg" placeholder="Usuario" required autofocus>
          <input type="password" id="inputPassword" name="inputPassword" class="form-control input-lg" placeholder="Contraseña" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar</button>
        </form>
        <?php if(request::hasParamGet('user') === true and request::getParamGet('user') === 'false'): ?>
        <div class="alert alert-danger" role="alert">
          <i class="mdi-alert-error"></i>Usuario o contraseña incorrecta.
        </div>
        <?php endif ?>
      </div>
    </div>
    <?php include 'html/foot.php'; ?>
  </body>
</html>
