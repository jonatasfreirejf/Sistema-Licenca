  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?php echo URL ?>src/dist/img/logo1.png"
           alt="JF Startup Studio"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">JF Startup Studio</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo URL ?>src/dist/img/users.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $admin_dados['nome'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo URL ?>clientes/listar" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo URL ?>licenca/listar" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Licenças
              </p>
            </a>
            <ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="<?php echo URL ?>licenca/listar-aguardando-aprovacoes" class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Aguardando Aprovação</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL ?>licenca/listar-teste" class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Teste(3-7 dias)</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL ?>licenca/listar-pagas" class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Pago</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL ?>licenca/listar-vencidos" class="nav-link">
						<i class="far fa-circle nav-icon"></i>
						<p>Vencidos</p>
					</a>
				</li>			
			</ul>
          </li>
          <li class="nav-item">
				<a href="<?php echo URL ?>usuarios/listar" class="nav-link">
					<i class="nav-icon fas fa-users-cog"></i>
					<p>Usuários</p>
				</a>
			</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>