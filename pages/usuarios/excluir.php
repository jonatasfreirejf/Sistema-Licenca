<?php
	require_once PATH. '/assets/login/index.php';
	$user = new Usuario_adm;
	$dados = array(
		'id' => $id,
	);
	$user->SetDados_adm($dados);

	$dados_r = $user->Excluir_Usuario();
?>
<script type="text/javascript">
	alert('<?php echo $dados_r['mensagem'] ?>');
	window.location = '<?php echo $_SERVER['HTTP_REFERER']; ?>';
</script>