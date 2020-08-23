<?php

  $dados_cliente = [];
  if (isset($_POST['cpf'])) {
    $lc = new Licenca;
    $dados = [
        'cpf' => $_POST['cpf'],
    ];
    $lc->SetDadosClientes($dados);
    $dados_r = $lc->Buscar_Cliente();
    $dados_cliente = $dados_r['dados'];

  }

  if(isset($_POST['solicitar'])){
      $lc = new Licenca;
      $lc->SetDadosClientes($_POST);
      $dados_r = $lc->Buscar_Cliente();
      if($dados_r['qtd'] == 0){
        $lc->Novo_Cliente();
        $lc->SetDadosClientes($_POST);
        $dados_r = $lc->Buscar_Cliente();
      }
      $dados_cliente = $dados_r['dados'];
      $dados = [];
      $dados = $_POST;
      $dados['id_cliente'] = $dados_cliente['id'];
      $dados['data_vencimento'] = null;
      $dados['categoria'] = "Pendente";
      $dados['status'] = "Ativado";
      $lc->SetDadosLicenca($dados);

      $dados = $lc->Nova_Licenca();

?>
      <script type="text/javascript">
        alert('<?php echo $dados['mensagem'] ?>');
        window.location = '<?php echo $_SERVER['HTTP_REFERER']; ?>';
    </script>
<?php


  }
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Solicitar Licença</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com.br/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com.br/docs/4.0/examples/checkout/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="login-logo">
        <a href="#"><img src="<?php echo URL ?>src/dist/img/logo.png" width="150px"></a>
      </div>
      <div class="py-5 text-center">
        <h2>Solicitação de Licença</h2>
        
      </div>

      <div class="row">
        
        <div class="col-12">
          <h4 class="mb-3">Dados Do Cliente</h4>
          <form class="needs-validation" method="POST">

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nome Completo:</label>
                <input type="text" class="form-control" name="nome" placeholder="Fulano de Tal" value="<?php echo $dados_cliente['nome'] ?? '' ?>" required>
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">CPF:</label>
                <input type="text" class="form-control" maxlength="11" minlength="11" name="cpf" placeholder="78489368975" value="<?php echo $dados_cliente['cpf'] ?? '' ?>" required>
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
            </div>


            <div class="mb-3">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com" value="<?php echo $dados_cliente['email'] ?? '' ?>" required>
              <div class="invalid-feedback">
                Inválido
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">CEP:</label>
                <input type="text" class="form-control" maxlength="8" minlength="8" name="cep" placeholder="78607934" value="<?php echo $dados_cliente['cep'] ?? '' ?>" required>
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Endereço:</label>
                <input type="text" class="form-control" name="endereco" placeholder="Rua Fulano de Tal" value="<?php echo $dados_cliente['endereco'] ?? '' ?>" required>
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="country">Número:</label>
                <input type="text" class="form-control" name="numero" placeholder="462" value="<?php echo $dados_cliente['numero'] ?? '' ?>" required>
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="state">Bairro:</label>
                <input type="text" class="form-control" name="bairro" placeholder="Fulano de Tal" value="<?php echo $dados_cliente['bairro'] ?? '' ?>" required>
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Cidade</label>
                <input type="text" class="form-control" name="cidade" placeholder="São Paulo" value="<?php echo $dados_cliente['cidade'] ?? '' ?>" required>
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
              <div class="col-md-1 mb-3">
                <label for="zip">UF:</label>
                <input type="text" class="form-control" name="estado" placeholder="SP" value="<?php echo $dados_cliente['estado'] ?? '' ?>" required>
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Telefone Celular:</label>
                <input type="text" class="form-control" name="telefone_celular" placeholder="Fulano de Tal" maxlength="11" minlength="11" value="<?php echo $dados_cliente['telefone_celular'] ?? '' ?>" required>
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Telefone Fixo:</label>
                <input type="text" class="form-control" maxlength="10" minlength="10" name="telefone_fixo" placeholder="78489368975" value="<?php echo $dados_cliente['telefone_fixo'] ?? '' ?>">
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Dados do Software</h4>

            
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="cc-name">Código de Ativação:</label>
                <input type="text" class="form-control" name="codigo_ativacao" placeholder="Código de Ativação do Software, pressione CTRL+V para colar." value="" required>
                <div class="invalid-feedback">
                  Incompleto
                </div>
              </div>
              
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="solicitar">Solicitar Licença</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2020 AS Empreendimentos</p>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com.br/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com.br/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com.br/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com.br/assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
