<?php
	require_once PATH. '/assets/login/index.php';
	if(isset($_POST['salvar'])){
		$nome = $_POST['nome'];
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		$dados = array(
			'id' => $id,
			'nome' => $nome,
			'usuario' => $usuario,
			'senha' => $senha,
		);
		$user = new Usuario_adm;
		$user->conectar();
		$user->SetDados_adm($dados);

		$dados_r = $user->Editar_Usuario();
?>
		<script type="text/javascript">
			alert('<?php echo $dados_r['mensagem'] ?>');
			window.location = '<?php echo $_SERVER['HTTP_REFERER']; ?>';
		</script>
<?php
	}
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuários</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Usuários</li>
              <li class="breadcrumb-item active">Editar Usuário</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <?php
        	$user = new Usuario_adm;
    			$dados = array(
    				'usuario' => $id,
    			);
    			$user->SetDados_adm($dados);
    			$dados_r = $user->Selecionar_Usuario();
    			$usuario = $dados_r['dados'];
        ?>
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header" style="background-color: #F48533;">
                <h3 class="card-title">Editar Usuário</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $usuario['nome']; ?>"placeholder="Nome do Usuário">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Usuário:</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo $usuario['usuario'] ?>" placeholder="Usuário">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Senha:</label>
                    <input type="password" class="form-control" name="senha" placeholder="Senha de Acesso">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success" name="salvar">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->