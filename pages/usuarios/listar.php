<?php
	require_once PATH. '/assets/login/index.php';
	$user = new Usuario_adm;
	$user->conectar();
	if(isset($_GET['pagina'])){
		$pagina = $_GET['pagina'];
	}else{
		$pagina = 1;
	}

	$dados = array(
		'pagina' => $pagina,
	);

	$user->SetDados_adm($dados);

	$dados_r = $user->Listar_Usuarios();

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
				 		<a type="button" style="margin-bottom: 10px;" href="novo" class="btn btn-success">Novo Usuário</a>
			            <div class="card">
			              <div class="card-header">
			                <h3 class="card-title">Usuários</h3>
			              </div>
			              <!-- /.card-header -->
			              <div class="card-body table-responsive p-0">
			                <table class="table table-hover text-nowrap">
			                  <thead>
			                    <tr>
			                      <th>ID</th>
			                      <th>Nome</th>
			                      <th>Usuário</th>
			                      <th>Ações</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	<?php
			                  		while ($usuario = $dados_r['dados']->fetch_array()) {
			                  	?>
			                  		<tr>
				                      <td><?php echo $usuario['id']; ?></td>
				                      <td><?php echo $usuario['nome']; ?></td>
				                      <td><?php echo $usuario['usuario']; ?></td>
				                      <td><a href='excluir/<?php echo $usuario['id']; ?>'>Excluir</a> | <a href='editar/<?php echo $usuario['id']; ?>'>Editar</a></td>
				                    </tr>	
			                  	<?php
			                  		}

			                  	?>
			                    
			                  </tbody>
			                </table>
			              </div>
			              <?php
			              	require_once PATH.  'components/paginacao.php';
			              ?>
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