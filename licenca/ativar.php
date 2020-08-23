<?php
	require_once '../admin/conexao.php';
	date_default_timezone_set("America/Porto_Velho");
	if(isset($_POST['ativar'])){
		$codigo = $_POST['codigo'];
		$email = $_POST['email'];
		$ip = $_SERVER['REMOTE_ADDR'];
		require('../get_dados.php');
		$c_info = new Users_info;
		$ip = $c_info->c_ip();
		$os = $c_info->c_OS();
		$navegador = $c_info->c_Browser();
		$dispositivo = $c_info->c_Device();

		$url = "http://ip-api.com/json/$ip";

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$data = curl_exec($ch);
		curl_close($ch);

		$data1 = json_decode($data,TRUE);

		$provedor = $data1['isp'];
		$cidade = $data1['city'];

		$estado = $data1['regionName'];

		$pais = $data1['country'];
		$codepais = $data1['countryCode'];
		$lat = $data1['lat'];
		$lon = $data1['lon'];

		$sql = "SELECT * FROM licenca WHERE codigo='" .$codigo. "' AND email2='" .$email. "'";
		$query = mysqli_query($mysqli, $sql);
		$quat = mysqli_num_rows($query);
		$query1 = mysqli_query($mysqli, $sql);
		if($quat != 0){
			while ($dados_de_licenca = $query1->fetch_array()) {
				$id = rand("10000", "99999");
				$dia = $dados_de_licenca['dia'];
				$mes = $dados_de_licenca['mes'];
				$ano = $dados_de_licenca['ano'];
				$status = $dados_de_licenca['status'];
				$id_licenca = $dados_de_licenca['id'];
				$id_cliente = $dados_de_licenca['id_da_conta'];
				$nome = $dados_de_licenca['nome'];
				$email = $dados_de_licenca['email'];
				$cpf = $dados_de_licenca['cpf'];
				$software = $dados_de_licenca['software'];
				$plano = $dados_de_licenca['plano'];
				$preco = $dados_de_licenca['preco'];
				$vencimento = $dados_de_licenca['vencimento'];
				$data = date("d/m/Y h:i:s");

				$data_vencimento = "$ano$mes$dia";
				$data_atual = date("Ymd");
				if($status == "bloqueado"){
					echo "<script>alert('Não foi possivel ativar sua licença, foi bloqueado por suspeita de violar as regras.')</script>";
					exit();
				}elseif($status == "arquivado"){

				}else{
					if($data_atual <= $data_vencimento){
						$sql = "INSERT INTO `historico_licenca`(`id`, `id_licenca`, `id_cliente`, `nome`, `cpf`, `software`, `plano`, `preco`, `codigo`, `email`, `provedor`, `cidade`, `estado`, `pais`, `codepais`, `lat`, `log`, `vencimento`, `data`) VALUES ('$id','$id_licenca','$id_cliente','$nome','$cpf','$software','$plano','$preco','$codigo','$email','$provedor','$cidade','$estado','$pais','$codepais','$lat','$lon','$vencimento','$data')";
						$query = mysqli_query($mysqli, $sql);
						if($query){
							$sql = "UPDATE licenca SET data_de_acesso='$data' WHERE id='$id_licenca'";
							$query = mysqli_query($mysqli, $sql);
							if($query){
								echo "
								<input type='submit' name='Ativado' value='Ativado'></br>
								Nome:$nome</br>
								Email:$email</br>
								Plano:$plano</br>
								Vencimento:$dia/$mes/$ano</br>
								";
							}else{
								echo $mysqli->error;
							}
						}else{
							echo $mysqli->error;
						}
						
					}else{
						echo "<script>alert('Não foi possivel ativar sua licença, encontra-se no momento vencida ou não foi liberado ainda.')</script>";
					}
				}
			}
		}else{
			echo "<script>alert('Não foi possivel ativar sua licença, nenhuma assinatura encontrada para essa licença.')</script>";
			exit();
		}

		

		

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Licença</title>
</head>
<body>
	<form method="POST">
		<input type="text" name="codigo" placeholder="Código">
		<input type="email" name="email" placeholder="Email">
		<input type="submit" name="ativar" value="Ativar">
	</form>
	
</body>
</html>