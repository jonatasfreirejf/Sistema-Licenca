<?php
	require_once '././assets/licenca/Licenca_class.php';
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
							<li class="breadcrumb-item active">Visualizar</li>
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
				 	<div class="col-12">
			            <div class="card">
			              <div class="card-header">
			                <h3 class="card-title">
			                  <i class="fas fa-text-width"></i>
			                  Visualizar Licença
			                </h3>
			              </div>
			              <!-- /.card-header -->
			              <div class="card-body">
			                <dl class="row">
			                	<?php
			                		$lc = new Licenca;
			                		$dados = [
			                		    'id' => $id,
			                		];
			                		$lc->SetDadosLicenca($dados);
			                		$dados_r = $lc->Selecionar_Licenca();

			                		$licenca = $dados_r['dados'];

			                		$dados = [
			                		    'id' => $licenca['id_cliente'], 
			                		];

			                		$lc->SetDadosClientes($dados);


			                		$dados_r = $lc->Selecionar_Cliente();

			                		$cliente = $dados_r['dados'];
			                	?>
			                  <dt class="col-sm-4">Nome:</dt>
			                  <dd class="col-sm-8"><?php echo $cliente['nome'] ?></dd>
			                  <dt class="col-sm-4">CPF:</dt>
			                  <dd class="col-sm-8"><?php echo $cliente['cpf'] ?></dd>
			                  <dt class="col-sm-4">E-mail:</dt>
			                  <dd class="col-sm-8"><?php echo $cliente['email'] ?></dd>
			                  <dt class="col-sm-4">Endereço</dt>
			                  <dd class="col-sm-8"><?php echo $cliente['endereco'] ?>, <?php echo $cliente['numero'] ?>, <?php echo $cliente['complemento'] ?? 'Não informado'?>, <?php echo $cliente['bairro'] ?>, <?php echo $cliente['cep'] ?>
			                  </dd>
			                  <dt class="col-sm-4">Telefone Celular:</dt>
			                  <dd class="col-sm-8"><?php echo $cliente['telefone_celular'] ?>
			                  </dd>
			                  <dt class="col-sm-4">Telefone Fixo:</dt>
			                  <dd class="col-sm-8"><?php echo $cliente['telefone_fixo'] ?? 'Não indentificado' ?>
			                  </dd>
			                  <dt class="col-sm-4">Nome do Software:</dt>
			                  <dd class="col-sm-8">
			                  	<?php echo $licenca['nome_software'];?>
			                  </dd>
			                  <dt class="col-sm-4">Código de Ativação:</dt>
			                  <dd class="col-sm-8">
			                  	<?php echo $licenca['codigo_ativacao'];?>
			                  </dd>
			                  <dt class="col-sm-4">Data de Vencimento:</dt>
			                  <dd class="col-sm-8">
			                  	<?php 
			                  		$data_vencimento = $licenca['data_vencimento'];
			                  		$data_vencimento = explode('-', $data_vencimento);
			                  		if(empty($data_vencimento[0])){
			                  			echo "00/00/0000";
			                  		}else{
			                  			echo $data_vencimento[2]. '/' .$data_vencimento[1] .'/'. $data_vencimento[0];
			                  		}
			                  		
			                  	?>
			                  </dd>
			                  <dt class="col-sm-4">Categoria:</dt>
			                  <dd class="col-sm-8">
			                  	<?php echo $licenca['categoria']?>
			                  </dd>

			                  <dt class="col-sm-4">Status:</dt>
			                  <dd class="col-sm-8">
			                  	<?php echo $licenca['status']?>
			                  </dd>
			                </dl>
			              </div>
			              <!-- /.card-body -->
			            </div>
			            <!-- /.card -->
			          </div>
				</div>
				<!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->