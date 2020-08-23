<?php
	require_once '././assets/licenca/Licenca_class.php';
	$pagina = $_GET['pagina'] ?? 1;
	$cpf = $_GET['cpf'];
	$l = new Licenca;
	$dados = [
	    'pagina' => $pagina,
	    'cpf' => $cpf,
	];

	$l->SetDadosLicenca($dados);

	$dados_r = $l->Buscar_Licenca();
?>
<div class="content-wrapper">
	<section class="content-header">
	    <div class="container-fluid">
	       <div class="row mb-2">
	        <div class="col-sm-6">
	          <h1>Licenças</h1>
	        </div>
	        <div class="col-sm-6">
	          <ol class="breadcrumb float-sm-right">
	            <li class="breadcrumb-item"><a href="#">Home</a></li>
	            <li class="breadcrumb-item active">Licenças</li>
	          </ol>
	        </div>
	       </div>
	    </div><!-- /.container-fluid -->
	</section>


	<section class="content"></section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
	            <div class="card">
	              <div class="card-header">
	                <h3 class="card-title">Licenças</h3>

	                <div class="card-tools">
	                	<form method="GET" action="buscar">
	                		 <div class="input-group input-group-sm" style="width: 150px;">
			                    <input type="text" name="cpf" class="form-control float-right" placeholder="Digite um CPF...">

			                    <div class="input-group-append">
			                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
			                    </div>
			                  </div>
	                	</form>
	                </div>
	              </div>
	              <!-- /.card-header -->
	              <div class="card-body table-responsive p-0">
	                <table class="table table-hover text-nowrap">
	                  <thead>
	                    <tr>
	                      <th>Nome</th>
	                      <th>CPF</th>
	                      <th>Software</th>
	                      <th>Codigo</th>
	                      <th>Ações</th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                  	<?php
	                  		while ($licenca = $dados_r['dados']->fetch_array()) {
	                  			$c = new Clientes;
								$dados = [
								    'id' => $licenca['id_cliente'],
								];

								$c->SetDadosClientes($dados);

								$dados_r2 = $c->Selecionar_Cliente();
								$cliente = $dados_r2['dados'];
	                  	?>

	                  			<tr>
			                      <td><?php echo $cliente['nome']?></td>
			                      <td><?php echo $cliente['cpf']?></td>
			                      <td><?php echo $licenca['nome_software']?></td>
			                      <td><?php echo $licenca['codigo_ativacao']?></td>
			                      <td><a href="excluir/<?php echo $licenca['id']?>">Excluir</a> | <a href="visualizar/<?php echo $licenca['id']?>">Visualizar</a> | <a href="editar/<?php echo $licenca['id']?>">Editar</a></td>
			                    </tr>
	                  	<?php
	                  		}
	                  	?>
	                    
	                    
	                  </tbody>
	                </table>
	                <?php
	                	require_once '././components/paginacao.php';
	                ?>
	              </div>
	              <!-- /.card-body -->
	            </div>
	            <!-- /.card -->
	          </div>
		</div> 
	</div>
</div>