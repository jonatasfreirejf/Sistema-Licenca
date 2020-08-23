<?php
			              		$num_pg = $dados_r['num_pg'];
			              		$max_page = 2;
			              ?>
			              <div class="card-footer clearfix">
			                <ul class="pagination pagination-sm m-0 float-right">
			                  <li class="page-item  <?php if($pagina == 0 OR $pagina == 1){echo "disabled";} ?>"><a class="page-link" href="?pagina=<?php echo $pagina - 1?>">« Anterior</a></li>
			                 	<?php
				                 for($pg_anterior = $pagina - $max_page; $pg_anterior <= $pagina - 1; $pg_anterior++){
				                 	if($pg_anterior >= 1){
				               ?>
				                 	<li class="page-item"><a class="page-link" href="?pagina=<?php echo $pg_anterior ?>&<?php if(isset($_GET['cpf'])){ echo "cpf=". $_GET['cpf'];}?>"><?php echo $pg_anterior; ?></a></li>
				               <?php
				                 	}
				                 }
				               ?>

				               <li class="page-item disabled"><a class="page-link" href="#"><?php echo $pagina ?></a></li>

				               <?php
				                 for($pg_proximo = $pagina + 1; $pg_proximo <= $pagina + $max_page; $pg_proximo++){
				                 	if($pg_proximo <= $num_pg){
				               ?>
				                 		<li class="page-item"><a class="page-link" href="?pagina=<?php echo $pg_proximo; ?>&<?php if(isset($_GET['cpf'])){ echo "cpf=". $_GET['cpf'];}?>"><?php echo $pg_proximo; ?></a></li>
				                <?php
				                 	}
				                 }
				                ?>

			                  	<li class="page-item <?php if($pagina >= $dados_r['num_pg']){echo "disabled";}?>"><a class="page-link" href="?pagina=<?php echo $pagina + 1?>&<?php if(isset($_GET['cpf'])){ echo "cpf=". $_GET['cpf'];}?>">Próximo »</a></li>
			                </ul>
			              </div>