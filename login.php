<?php
    require_once 'assets/Config/routes.php';
    include_once PATH. '/assets/bdados/index.php';
    require_once PATH. '/assets/seguranca/autenticacao_admin.php';
    if(isset($_POST['entrar'])){
      $usuario = $_POST['usuario'];
      $senha = md5($_POST['senha']);
      if(empty($usuario&$senha)){
        echo "<script>alert('Usuário e/ou Senha está vazio')</script>";
        echo "
          <script>
              window.location = 'login.php';
          </script>";
      }
      $user_adm = new Usuario_adm;
      $dados = array(
        'usuario' => $usuario,
      );
      $user_adm->SetDados_adm($dados);
      $dados_r = $user_adm->Selecionar_Usuario();
      $qtd = $dados_r['qtd'];
      if($qtd == 1){
        $dados_r = $dados_r['dados'];

        if($usuario == $dados_r['usuario']){
          if($senha == $dados_r['senha']){
            $sessao_admim = new Sessao_Login;
            $dados = array(
              'id_user' => $dados_r['id'],
              'ip' => $_SERVER['REMOTE_ADDR'],
              'tipo' => 'admin',
            );
            $sessao_admim->SetDados_Sessao($dados);
            $dados_r = $sessao_admim->Nova_Sessao();
            if ($dados_r['codigo'] == 0) {
              $token = $dados_r['token'];
              echo "
              <script type='text/javascript' src='" .URL. "/libs/cookies/index.js'></script>
              <script>
                setCookie('token_1', '$token', 30);
                setInterval(function(){ window.location = 'clientes/listar'; }, 2000);
                
              </script>";
            }else{
              $erro = $dados_r['erro'];
              echo "<script>alert('$erro')</script>";
            }
          }else{
            echo "<script>alert('Senha incorreta')</script>";
          }
        }else{
          echo "<script>alert('Esse usuário não existe')</script>";
        }

      }else{
        echo "<script>alert('Esse usuário não existe')</script>";
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Sistema de Licença</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="src/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="src/dist/css/adminlte.min.css">
  <script type="text/javascript" src="src/dist/js/cookie.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><img src="src/dist/img/logo.png" width="150px"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Faça login para acessar o painel</p>
      <form method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="usuario" placeholder="Usuário">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="senha" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="entrar" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
  <div class="resultado">
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="src/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="src/dist/js/adminlte.min.js"></script>

</body>
</html>
