<?php
	require_once '../assets/Config/routes.php';
	include_once PATH. '/assets/bdados/index.php';
	require_once PATH. 'assets/licenca/Licenca_class.php';



	$dados = [];

	if (isset($_GET['codigo_ativacao'])) {
		if(empty($_GET['codigo_ativacao'])){
			$dados['codigo'] = "1";
			$dados['mensagem'] = "Codigo de Ativação não enviado";
			echo json_encode($dados);
			exit();
		}
		$codigo_ativacao = $_GET['codigo_ativacao'];

		$lc = new Licenca;

		$dados = [
		    'codigo_ativacao' => $codigo_ativacao, 
		];

		$lc->SetDadosLicenca($dados);

		$dados_r = $lc->verificar_licenca();

		$dados = [];

		if($dados_r['qtd'] <= 0){
			$dados['codigo'] = "1";
			$dados['mensagem'] = "A sua licença não foi encontrado em nosso sistema";
			echo json_encode($dados);
			exit();
		}

		$licenca = $dados_r['dados'];
		$id_cliente = $licenca['id_cliente'];

		$lc->SetDadosClientes([
		    'id' => $id_cliente,
		]);

		$dados_r = $lc->Selecionar_Cliente();

		$cliente = $dados_r['dados'];

		$dados['nome'] = $cliente['nome'];
		$dados['email'] = $cliente['email'];

		$dados['nome_software'] = $licenca['nome_software'] ?? "Não Indentificado";
		$dados['codigo_ativacao'] = $licenca['codigo_ativacao'];
		$data_vencimento = explode("-", $licenca['data_vencimento'] ?? "Não Indentificado");
		$data_vencimento = $data_vencimento[2]. '/' .$data_vencimento[1]. '/' .$data_vencimento[0];
		$dados['data_vencimento'] = $data_vencimento ?? "Não Indentificado";
		$dados['categoria'] = $licenca['categoria'];
		$dados['status'] = $licenca['status'];

		if($licenca['categoria'] == 'Pendente'){
			$dados['codigo'] = "1";
			$dados['mensagem'] = "A sua licença ainda não foi liberada";
			echo json_encode($dados);
			exit();
		}


		if($licenca['status'] == 'Desativado'){
			$dados['codigo'] = "1";
			$dados['mensagem'] = "Sua licença foi desativada, por favor, entre em contato com suporte.";
			echo json_encode($dados);
			exit();
		}

		$data_atual = date('Y-m-d');

		
		if($data_atual <=  $licenca['data_vencimento']){
			$dados['codigo'] = 0;
			$dados['liberado'] = true;
			$dados['mensagem'] = "Licença ativada com sucesso";
			

			echo json_encode($dados);
		}else{
			$dados['codigo'] = "1";
			$dados['mensagem'] = "A sua licenca está vencida, por favor, entre em contato para renovar.";
			echo json_encode($dados);
			exit();
		}

		

	} else {
		$dados['codigo'] = "1";
		$dados['mensagem'] = "Codigo de Ativação não enviado";
		echo json_encode($dados);
		exit();
	}


?>