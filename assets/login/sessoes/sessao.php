<?php
	class Sessao_Login extends Bdados
	{
		
		private $dados_Sessao;

		public function SetDados_Sessao($dados){
			foreach ($dados as $key => $value) {
				$this->Tratar($value);
				$dados[$key] = $this->GetDados();
			}
			$this->dados_Sessao = $dados;
		}

		public function GetDados_Sessao(){
			$dados = $this->dados_Sessao;
			foreach ($dados as $key => $value) {
				$this->Tratar($value);
				$dados[$key] = $this->GetDados();
			}
			return $dados;
		}

		public function Nova_Sessao(){
			$dados = $this->GetDados_Sessao();

			$id_user = $dados['id_user'];
			$token = hash('sha256', rand(10000000000,99999999999));
			$ip = $dados['ip'];
			$tipo = $dados['tipo'];
			$result = $this->Exec_SQL("INSERT INTO `sessoes_login`(`id_user`, `token`, `ip`, `tipo`) VALUES ('$id_user', '$token', '$ip', '$tipo')");
			if($result){
				return $resultado = array(
					'codigo' => '0',
					'token' => $token, 
					'mensagem' => 'Sessão cadastrada com sucesso',
					'dados_enviados' => $this->GetDados_Sessao(), 
				);
			}else{
				$conexao = $this->conexao;
				return $resultado = array(
					'codigo' => '3', 
					'mensagem' => 'Erro no banco de dados do sistema',
					'erro' => $conexao->error,
					'dados_enviados' => $this->GetDados_Sessao(),
				);
			}

		}

		public function Excluir_Sessao(){
			$dados = $this->GetDados_Sessao();
			$tipo = $dados['tipo'];
			$dado = $dados['dado'];

			$result = $this->Exec_SQL("DELETE * FROM sessoes_login WHERE $tipo='$dado'");
			if($result){
				return $resultado = array(
					'codigo' => '0', 
					'mensagem' => 'Sessão excluída com sucesso',
					'dados_enviados' => $this->GetDados_Sessao(), 
				);
			}else{
				$conexao = $this->conexao;
				return $resultado = array(
					'codigo' => '3', 
					'mensagem' => 'Erro no banco de dados do sistema',
					'erro' => $conexao->error,
					'dados_enviados' => $this->GetDados_Sessao(),
				);
			}
		}

		public function Selecionar_Sessao(){
  			$dados = $this->GetDados_Sessao();
  			$token = $dados['token'];

  			$result = $this->Exec_SQL("SELECT * FROM sessoes_login WHERE token='$token'");
  			if($result){
  				return $resultado = array(
  					'codigo' => 0,
  					'dados' => $result->fetch_array(),
  					'qtd' => mysqli_num_rows($result),
  					'dados_enviados' => $this->GetDados_Sessao(),
  				);
  			}else{
  				return $resultado = array(
  					'codigo' => 1,
  					'mensagem' => 'Erro no banco de dados do sistema',
					'erro' => $this->conexao->error,
					'dados_enviados' => $this->GetDados_Sessao(),
  				);
  			}
		}

		public function salvar_sessao_afs(){
			$dados = $this->GetDados_Sessao();
			$token = $dados['token'];
			setcookie("token_2", $token, time()+3600*24*30);
			if(isset($_COOKIE['token_2'])){
				return $resultado  = array(
					'codigo' => 0,
				);
			}else{
				return $resultado  = array(
					'codigo' => 1,
				);
			}
		}

		public function salvar_sessao_admin(){
			$dados = $this->GetDados_Sessao();
			$token = $dados['token'];
			setcookie("token_1", $token, time()+3600*24*30);
			if(isset($_COOKIE['token_1'])){
				return $resultado  = array(
					'codigo' => 0,
				);
			}else{
				return $resultado  = array(
					'codigo' => 1,
				);
			}
		}
	}
?>