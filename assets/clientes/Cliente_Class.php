<?php
	class Clientes extends Bdados
	{
		private $DadosClientes;

		public function SetDadosClientes($dados)
		{
			foreach ($dados as $key => $value) {
				$this->Tratar($value);
				$dados[$key] = $this->GetDados();
			}
			$this->DadosClientes = $dados;
		}

		public function Novo_Cliente(){
			$dados = $this->DadosClientes;
			$nome = $dados['nome'];
			$cpf = $dados['cpf'];
			$email = $dados['email'];
			$endereco = $dados['endereco'];
			$cep = $dados['cep'];
			$numero = $dados['numero'];
			$bairro = $dados['bairro'];
			$cidade = $dados['cidade'];
			$estado = $dados['estado'];
			$telefone_celular = $dados['telefone_celular'];
			$telefone_fixo = $dados['telefone_fixo'] ?? null;

			$dados_r = $this->Exec_SQL("INSERT INTO clientes (`nome`, `cpf`, `email`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `telefone_celular`, `telefone_fixo`) VALUES ('$nome', '$cpf', '$email', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$telefone_celular', '$telefone_fixo')");
			if($dados_r){
				return $dados = array(
					'codigo' => 0,
					'mensagem' => 'Cliente Cadastrado',
					'dados_enviados' => $dados, 
				);
			}else{
				return $dados = array(
					'codigo' => 1,
					'mensagem' => 'Erro ao cadastrar o cliente',
					'dados_enviados' => $dados,
				);
			}
		}

		public function Editar_Cliente(){
			$dados = $this->DadosClientes;
			$id = $dados['id'];
			$nome = $dados['nome'];
			$cpf = $dados['cpf'];
			$email = $dados['email'];
			$endereco = $dados['endereco'];
			$numero = $dados['numero'];
			$bairro = $dados['bairro'];
			$cidade = $dados['cidade'];
			$estado = $dados['estado'];
			$telefone_celular = $dados['telefone_celular'];
			$telefone_fixo = $dados['telefone_fixo'];

			$dados_r = $this->Exec_SQL("UPDATE `clientes` SET `nome`='$nome',`cpf`='$cpf',`email`='$email',`endereco`='$endereco',`numero`='$numero',`bairro`='$bairro',`cidade`='$cidade',`estado`='$estado',`cep`='$cep',`telefone_celular`='$telefone_celular',`telefone_fixo`='$telefone_fixo' WHERE id = '$id'");
			if($dados_r){
				return $dados = array(
					'codigo' => 0,
					'mensagem' => 'Cliente editado',
					'dados_enviados' => $dados, 
				);
			}else{
				return $dados = array(
					'codigo' => 1,
					'mensagem' => 'Erro ao editar o cliente',
					'dados_enviados' => $dados, 
					'erro' => $this->conexao->error,
				);
			}
			
		}

		public function Buscar_Cliente(){
			$dados = $this->DadosClientes;
			$cpf = $dados['cpf'];

			$dados_r = $this->Exec_SQL("SELECT * FROM clientes WHERE cpf='$cpf'");
			if($dados_r){
				return $dados = array(
					'codigo' => 0,
					'qtd' => mysqli_num_rows($dados_r),
					'dados' => $dados_r->fetch_array(),
					'dados_enviados' => $dados,
				);
			}else{
				return $dados = array(
					'codigo' => 1,
					'mensagem' => 'Falha ao buscar o cliente',
					'dados_enviados' => $dados,
					'erro' => $this->conexao->error,
				);
			}
		}

		public function Selecionar_Cliente(){
			$dados = $this->DadosClientes;
			$id = $dados['id'];

			$dados_r = $this->Exec_SQL("SELECT * FROM `clientes` WHERE `id`=$id");
			if($dados_r){
				return $dados = array(
					'codigo' => 0,
					'dados' => $dados_r->fetch_array(),
					'dados_enviados' => $dados,
				);
			}else{
				return $dados = array(
					'codigo' => 1,
					'mensagem' => 'Falha ao buscar o cliente',
					'dados_enviados' => $dados,
					'erro' => $this->conexao->error,
				);
			}
		}

		public function listar_clientes(){
			$dados = $this->DadosClientes;

			$pg = $dados['pagina'];
			if(empty($pg) OR $pg == 0){
				$pg = 1;
			}

			$dados_r = $this->Exec_SQL("SELECT * FROM clientes");

			$quant1 = mysqli_num_rows($dados_r);

			$num_pg = ceil($quant1 / 10);

			$inicio = (10 * $pg) - 10;

			$query = $this->Exec_SQL("SELECT * FROM clientes ORDER BY id DESC LIMIT $inicio, 10 ");
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