<?php
	require_once '././assets/clientes/Cliente_Class.php';
	$pagina = $_GET['pagina'] ?? 1;
	$c = new Clientes;
	$dados = [
	    'pagina' => $pagina,
	];

	$c->SetDadosClientes($dados);

	$dados_r = $c->listar_clientes();
?>
<div class="content-wrapper">
	<section class="content-header">
	    <div class="container-fluid">
	       <div class="row mb-2">
	        <div class="col-sm-6">
	          <h1>Clientes</h1>
	        </div>
	        <div class="col-sm-6">
	          <ol class="breadcrumb float-sm-right">
	            <li class="breadcrumb-item"><a href="#">Home</a></li>
	            <li class="breadcrumb-item active">Clientes</li>
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
	                <h3 class="card-title">Clientes</h3>
	              </div>
	              <!-- /.card-header -->
	              <div class="card-body table-responsive p-0">
	                <table class="table table-hover text-nowrap">
	                  <thead>
	                    <tr>
	                      <th>ID</th>
	                      <th>Nome</th>
	                      <th>CPF</th>
	                      <th>E-mail</th>
	                      <th>Ações</th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                  	<?php
	                  		while ($cliente = $dados_r['dados']->fetch_array()) {
	                  	?>
	                  			<tr>
			                      <td><?php echo $cliente['id']?></td>
			                      <td><?php echo $cliente['nome']?></td>
			                      <td><?php echo $cliente['cpf']?></td>
			                      <td><?php echo $cliente['email']?></td>
			                      <td><a href="visualizar/<?php echo $cliente['id']?>">Visualizar</a></td>
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
