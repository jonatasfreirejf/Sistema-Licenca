<?php

	class Usuario_adm extends Bdados{
		private $dados_adm;

		public function SetDados_adm($dados){
			foreach ($dados as $key => $value) {
				$this->Tratar($value);
				$dados[$key] = $this->GetDados();
			}
			$this->dados_adm = $dados;
		}

		public function GetDados_adm(){
			$dados = $this->dados_adm;
			foreach ($dados as $key => $value) {
				$this->Tratar($value);
				$dados[$key] = $this->GetDados();
			}
			return $dados;
		}
		public function Criar_Usuario(){
			$dados = $this->GetDados_adm();
			$nome = $dados['nome'];
			$usuario = $dados['usuario'];
			$senha = md5($dados['senha']);

			if(empty($nome&$usuario&$senha)){
				return $resultado = array(
					'codigo' => '1', 
					'mensagem' => 'Dados imcompleto',
					'dados_enviados' => $this->GetDados_adm(), 
				);
				exit();
			}

			$result = $this->Exec_SQL("INSERT INTO `usuarios`(`nome`, `usuario`, `senha`) VALUES ('$nome','$usuario','$senha')");
			if($result){
				return $resultado = array(
					'codigo' => '0', 
					'mensagem' => 'Usuário cadastrado com sucesso',
					'dados_enviados' => $this->GetDados_adm(), 
				);
			}else{
				$conexao = $this->conexao;
				return $resultado = array(
					'codigo' => '3', 
					'mensagem' => 'Erro no banco de dados do sistema',
					'erro' => $conexao->error,
					'dados_enviados' => $this->GetDados_adm(),
				);
			}

			
		}

		public function Excluir_Usuario(){
			$dados = $this->GetDados_adm();
			if(isset($dados['id'])){
				$id = $dados['id'];
				if($id == 1){
					return $resultado = array(
						'codigo' => 2,
						'mensagem'=> "Usuário não pode ser excluído",
						'dados_enviados' => $this->GetDados_adm(),
					);
					exit();
				}
				$result = $this->Exec_SQL("DELETE FROM usuarios WHERE id='$id'");
				if($result){
					return $resultado = array(
						'codigo' => 0,
						'mensagem'=> "Usuário excluído com sucesso",
						'dados_enviados' => $this->GetDados_adm(),
					);
				}else{
					return $resultado = array(
						'codigo' => 1,
						'mensagem'=> "Usuário não excluído com sucesso",
						'dados_enviados' => $this->GetDados_adm(),
						'erro' => $conexao->error,
					);
				}
			}elseif(isset($dados['usuario'])){
				$usuario = $dados['usuario'];
				$result = $this->Exec_SQL("DELETE FROM usuarios WHERE usuario='$usuario'");
				if($result){
					return $resultado = array(
						'codigo' => 0,
						'mensagem'=> "Usuário excluído com sucesso",
						'dados_enviados' => $this->GetDados_adm(),
					);
				}else{
					return $resultado = array(
						'codigo' => 1,
						'mensagem'=> "Usuário não excluído com sucesso",
						'dados_enviados' => $this->GetDados_adm(),
						'erro' => $conexao->error,
					);
				}
			}
		}

		public function Editar_Usuario(){
			$dados = $this->GetDados_adm();
			$id = $dados['id'];
			$nome = $dados['nome'];
			$usuario = $dados['usuario'];
			$senha = $dados['senha'];
			if(empty($nome&$usuario&$senha)){
				return $resultado = array(
					'codigo' => '2', 
					'mensagem' => 'Dados imcompleto',
					'dados_enviados' => $this->GetDados_adm(), 
				);
				exit();
			}
			$senha  = md5($senha);
			$result = $this->Exec_SQL("UPDATE usuarios SET nome='$nome', usuario='$usuario', senha='$senha' WHERE id='$id'");
			if($result){
				return $resultado = array(
					'codigo' => 0,
					'mensagem'=> "Usuário editado com sucesso",
					'dados_enviados' => $this->GetDados_adm(),
				);
			}else{
				return $resultado = array(
					'codigo' => 1,
					'dados_enviados' => $this->GetDados_adm(),
					'erro' => $conexao->error,
				);
			}

		}

		public function Selecionar_Usuario(){
			$dados = $this->GetDados_adm();
			$usuario = $dados['usuario'];
			$result = $this->Exec_SQL("SELECT * FROM usuarios WHERE usuario='$usuario' OR id='$usuario'");
			if($result){
				$quant = mysqli_num_rows($result);
				$dados_r = $result->fetch_array();
				$conexao = $this->conexao;
				return $resultado = array(
					'codigo' => 0,
					'qtd' => $quant,
					'dados'=> $dados_r,
					'dados_enviados' => $this->GetDados_adm(),
				);
			}else{
				return $resultado = array(
					'codigo' => 1,
					'erro' => $conexao->error,
					'dados_enviados' => $this->GetDados_adm(),
				);
			}
			
		}

		public function Listar_Usuarios(){
			$dados = $this->GetDados_adm();
			$pg = $dados['pagina'];
			if(empty($pg) OR $pg == 0){
				$pg = 1;
			}

			$query = $this->Exec_SQL("SELECT * FROM usuarios");
			$quant1 = mysqli_num_rows($query);

			$num_pg = ceil($quant1 / 10);

			$inicio = (10 * $pg) - 10;

			$query = $this->Exec_SQL("SELECT * FROM usuarios ORDER BY id DESC LIMIT $inicio, 10");
			$quant = mysqli_num_rows($query);

			return array(
				'num_pg' => $num_pg,
				'quant' => $quant,
				'quant2' => $quant1,
				'dados' => $query,
			);
		}
	}
?>