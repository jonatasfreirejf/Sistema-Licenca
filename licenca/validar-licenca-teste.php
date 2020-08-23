<?php
	date_default_timezone_set("America/Porto_Velho");
	require_once '../admin/assets/Config/routes.php';
 	include_once PATH. 'assets/bdados/index.php';
	$mac = $_GET['mac'];
	$codigo = $_GET['codigo'];

	$lc = new Bdados();

	$dia = date("d", strtotime("+1 day"));
	$mes = date("m", strtotime("+1 day"));
	$ano = date("Y", strtotime("+1 day"));

	$result = $lc->Exec_SQL("SELECT * FROM licenca_temporaria WHERE mac='$mac' AND codigo='$codigo'");

	$quat_licenca = mysqli_num_rows($result);

	if($quat_licenca == 0){
		$result = $lc->Exec_SQL("INSERT INTO `licenca_temporaria`(`mac`, `codigo`, `dia`, `mes`, `ano`) VALUES ('$mac','$codigo','$dia','$mes','$ano')");
		
		if($result){
			echo "<status>liberado</status>";
	
		}else{
			echo $mysqli->error;
		}

	}else{
		$dados_de_licenca = $result->fetch_array();
		$dia = $dados_de_licenca['dia'];
		$mes = $dados_de_licenca['mes'];
		$ano = $dados_de_licenca['ano'];
		$data_atual = date("Ymd");
		$data_vencimento = "$ano$mes$dia";
		if($data_atual <= $data_vencimento){
			echo "<status>liberado</status>";
		}else{
			echo "<status>nao liberado</status>";
		}

	}

?>