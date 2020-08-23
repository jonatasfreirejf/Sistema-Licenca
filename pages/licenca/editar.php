<?php
	require_once '././assets/licenca/Licenca_class.php';
	require_once '././components/Select_lib.php';
	if(isset($_POST['salvar'])){
		$nome_software = $_POST['nome_software'];
		$codigo_ativacao = $_POST['codigo_ativacao'];
		$data_vencimento = $_POST['data_vencimento'];
		$categoria = $_POST['categoria'];
		$status = $_POST['status'];
		$dados = array(
			'id' => $id,
			'nome_software' => $nome_software,
			'codigo_ativacao' => $codigo_ativacao,
			'data_vencimento' => $data_vencimento,
			'categoria' => $categoria,
			'status' => $status,
		);
		$licenca = new Licenca;
		$licenca->SetDadosLicenca($dados);

		$dados_r = $licenca->Editar_Licenca();
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
            <h1 class="m-0 text-dark">Licenças</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Licenças</li>
              <li class="breadcrumb-item active">Editar</li>
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
        	$lc = new Licenca;
			$dados = [
			    'id' => $id,
			];
			$lc->SetDadosLicenca($dados);
			$dados_r = $lc->Selecionar_Licenca();

			$licenca = $dados_r['dados'];
        ?>
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Editar Licença</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome do Software:</label>
                    <input type="text" class="form-control" name="nome_software" value="<?php echo $licenca['nome_software']; ?>"placeholder="Nome do Software">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Código de Ativação:</label>
                    <input type="text" class="form-control" name="codigo_ativacao" value="<?php echo $licenca['codigo_ativacao']; ?>"placeholder="Código de Ativação">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Data de Vencimento:</label>
                    <input type="date" class="form-control" name="data_vencimento" value="<?php echo $licenca['data_vencimento'] ?>" placeholder="Data de Vencimento">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Categoria:</label>
                    <select class="form-control" name="categoria">
                    	<?php
                    		new Select_Render(['Pendente', 'Teste(3-7) Dias', 'Paga'], $licenca['categoria']);
                    	?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status:</label>
                    <select class="form-control" name="status">
                    	<?php
                    		new Select_Render(['Ativado','Desativado'], $licenca['status']);
                    	?>
                    </select>
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