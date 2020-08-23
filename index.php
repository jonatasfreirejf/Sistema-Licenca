<?php
	require_once 'assets/Config/routes.php';
	include_once 'assets/bdados/index.php';
	require_once __DIR__. '/assets/seguranca/autenticacao_admin.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Painel | Sistema de Licença</title>
		<?php
			require_once 'components/head.php';
		?>
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<?php
				require_once 'components/header.php';
				require_once 'components/menu.php';

				if(isset($_GET['url'])){
					$url1 = $_GET['url'];

					$comando = explode("/", $url1);
					
					if(isset($comando[0])){
						$modulo = $comando[0];
						if(is_dir('pages/' .$modulo)){
							if(isset($comando[1])){
								$acao = $comando[1];
								if(is_file('pages/'. $modulo. '/' . $acao. '.php')){
									if(isset($comando[2])){
										$id = $comando[2];
									}else{
										$id = null;
									}
									require_once 'pages/'. $modulo. '/' . $acao. '.php';
								}else{
									require_once 'components/404.php';
								}
							}else{
								require_once 'components/404.php';
							}
						}else{
							require_once 'components/404.php';
						}
					}else{

					}
					
				}else{
					
				}

				require_once 'components/footer.php';
			?>
		</div>
		<?php
			require_once 'components/script.php';
		?>
	</body>
</html>