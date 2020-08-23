
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="https://getbootstrap.com.br/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="https://getbootstrap.com.br/docs/4.1/examples/floating-labels/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="POST" action="<?php echo URL ?>solicitar-licenca/post">
      <div class="text-center mb-4">
        <div class="login-logo">
          <a href="#"><img src="<?php echo URL ?>src/dist/img/logo.png" width="150px"></a>
        </div>
        <h1 class="h3 mb-3 font-weight-normal">Sistema de Licença</h1>
      </div>

      <div class="form-label-group">
        <input type="text" id="inputEmail" class="form-control" name="cpf" placeholder="*CPF" required autofocus>
        <label for="inputEmail">CPF:</label>
      </div>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>
  </body>
</html>
