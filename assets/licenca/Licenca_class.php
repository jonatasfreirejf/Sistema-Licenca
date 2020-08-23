<?php
	require_once PATH. 'assets/clientes/Cliente_Class.php';
	class Licenca extends Clientes
	{
	    private $DadosLicenca;
	    public function SetDadosLicenca($dados)
	    {
	    	foreach ($dados as $key => $value) {
				$this->Tratar($value);
				$dados[$key] = $this->GetDados();
			}
			$this->DadosLicenca = $dados;
	    }

	    public function Nova_Licenca(){
	    	$dados = $this->DadosLicenca;
	    	$id_cliente = $dados['id_cliente'];
	    	$nome_software = $dados['nome_software'] ?? null;
	    	$codigo_ativacao = $dados['codigo_ativacao'];
	    	$data_vencimento = $dados['data_vencimento'];
	    	$categoria = $dados['categoria'];
	    	$status = $dados['status'];
	    	$dados_r = $this->Exec_SQL("INSERT INTO `licencas`(`id_cliente`, `nome_software`, `codigo_ativacao`, `data_vencimento`, `categoria`, `status`) VALUES ('$id_cliente','$nome_software','$codigo_ativacao','$data_vencimento','$categoria','$status')");
	    	if($dados_r){
	    		return $dados = array(
					'codigo' => 0,
					'mensagem' => 'Licença solicitada com sucesso',
					'dados_enviados' => $dados, 
				);
	    	}else{
	    		return $dados = array(
					'codigo' => 1,
					'mensagem' => 'Erro ao cadastrar a Licença',
					'dados_enviados' => $this->conexao->error,
				);
	    	}
	    }

	    public function Buscar_Licenca(){
	    	$dados = $this->DadosLicenca;

	    	$cpf = $dados['cpf'];


	    	$pg = $dados['pagina'];
			if(empty($pg) OR $pg == 0){
				$pg = 1;
			}

	    	$dados = [
	    	    'cpf' => $cpf,
	    	];

	    	$this->SetDadosClientes($dados);
	    	$dados_r = $this->Buscar_Cliente();
	    	if($dados_r['qtd'] > 0){
	    		$dados_cliente = $dados_r['dados'];
	    		$id_cliente = $dados_cliente['id'];
	    	}
	    	

	    	$dados_r = $this->Exec_SQL("SELECT * FROM licencas WHERE id_cliente='$id_cliente'");

			$quant1 = mysqli_num_rows($dados_r);

			$num_pg = ceil($quant1 / 10);

			$inicio = (10 * $pg) - 10;

			$query = $this->Exec_SQL("SELECT * FROM licencas WHERE id_cliente='$id_cliente' ORDER BY id DESC LIMIT $inicio, 10 ");
			$quant = mysqli_num_rows($query);
			
			return array(
				'num_pg' => $num_pg,
				'quant' => $quant,
				'quant2' => $quant1,
				'dados' => $query,
			);

	    }

	    public function Listar_Licencas(){
	    	$dados = $this->DadosLicenca;
	    	$categoria = $dados['categoria'];

	    	$data_atual = date('Y-m-d');


	    	$pg = $dados['pagina'];
			if(empty($pg) OR $pg == 0){
				$pg = 1;
			}

			$dados_r = $this->Exec_SQL("SELECT * FROM `licencas` WHERE `categoria`='$categoria' AND `data_vencimento`>='$data_atual'");

			$quant1 = mysqli_num_rows($dados_r);

			$num_pg = ceil($quant1 / 10);

			$inicio = (10 * $pg) - 10;

			$query = $this->Exec_SQL("SELECT * FROM `licencas` WHERE `categoria`='$categoria' AND `data_vencimento`>='$data_atual' ORDER BY id DESC LIMIT $inicio, 10 ");
			$quant = mysqli_num_rows($query);

			$conexao = $this->conexao;

			return array(
				'num_pg' => $num_pg,
				'quant' => $quant,
				'quant2' => $quant1,
				'dados' => $query,
			);
	    }


	    public function Listar_Licencas_Pendente(){
	    	$dados = $this->DadosLicenca;
	    	$categoria = "Pendente";

	    	$data_atual = date('Y-m-d');


	    	$pg = $dados['pagina'];
			if(empty($pg) OR $pg == 0){
				$pg = 1;
			}

			$dados_r = $this->Exec_SQL("SELECT * FROM `licencas` WHERE `categoria`='$categoria'");

			$quant1 = mysqli_num_rows($dados_r);

			$num_pg = ceil($quant1 / 10);

			$inicio = (10 * $pg) - 10;

			$query = $this->Exec_SQL("SELECT * FROM `licencas` WHERE `categoria`='$categoria' ORDER BY id DESC LIMIT $inicio, 10 ");
			$quant = mysqli_num_rows($query);

			$conexao = $this->conexao;

			return array(
				'num_pg' => $num_pg,
				'quant' => $quant,
				'quant2' => $quant1,
				'dados' => $query,
			);
	    }


	    public function Listar_Licencas_Vencido(){
	    	$dados = $this->DadosLicenca;
	    	$data_vencimento = date('Y-m-d');

	    	$pg = $dados['pagina'];
			if(empty($pg) OR $pg == 0){
				$pg = 1;
			}

			$dados_r = $this->Exec_SQL("SELECT * FROM licencas WHERE data_vencimento<='$data_vencimento'");

			$quant1 = mysqli_num_rows($dados_r);

			$num_pg = ceil($quant1 / 10);

			$inicio = (10 * $pg) - 10;

			$query = $this->Exec_SQL("SELECT * FROM licencas WHERE data_vencimento<='$data_vencimento' ORDER BY id DESC LIMIT $inicio, 10 ");
			$quant = mysqli_num_rows($query);
			
			return array(
				'num_pg' => $num_pg,
				'quant' => $quant,
				'quant2' => $quant1,
				'dados' => $query,
			);
	    }

	    public function Excluir_licenca()
	    {
	    	$dados = $this->DadosLicenca;
	    	$id = $dados['id'];

	    	$dados_r = $this->Exec_SQL("DELETE FROM licencas WHERE id='$id'");
	    	if($dados_r){
	    		return $resultado = array(
					'codigo' => 0,
					'mensagem'=> "Licença excluído com sucesso",
					'dados_enviados' => $dados,
				);
	    	}else{
	    		$conexao = $this->conexao;
	    		return $resultado = array(
					'codigo' => 1,
					'mensagem'=> "Licença não excluído com sucesso",
					'dados_enviados' => $dados,
					'erro' => $conexao->error,
				);
	    	}
	    }

	    public function Selecionar_Licenca(){
	    	$dados = $this->DadosLicenca;
	    	$id = $dados['id'];

	    	$dados_r = $this->Exec_SQL("SELECT * FROM licencas WHERE id='$id'");
	    	if($dados_r){
	    		return $resultado = array(
					'codigo' => 0,
					'dados'=> $dados_r->fetch_array(),
					'dados_enviados' => $dados,
				);
	    	}else {
	    		$conexao = $this->conexao;
	    		return $resultado = array(
					'codigo' => 1,
					'erro' => $conexao->error,
					'dados_enviados' => $dados,
				);
	    	}
	    }

	    public function Editar_Licenca(){
	    	$dados = $this->DadosLicenca;
	    	$id = $dados['id'];
	    	$nome_software = $dados['nome_software'];
	    	$codigo_ativacao = $dados['codigo_ativacao'];
	    	$data_vencimento = $dados['data_vencimento'];
	    	$categoria = $dados['categoria'];
	    	$status = $dados['status'];

	    	$dados_r = $this->Exec_SQL("UPDATE `licencas` SET nome_software='$nome_software', codigo_ativacao='$codigo_ativacao', data_vencimento='$data_vencimento', categoria='$categoria', status='$status' WHERE id='$id'");
	    	if($dados_r){
	    		return $dados = array(
					'codigo' => 0,
					'mensagem' => 'Licença Editada com sucesso',
					'dados_enviados' => $dados, 
				);
	    	}else{
	    		return $dados = array(
					'codigo' => 1,
					'mensagem' => 'Erro ao editar a Licença',
					'dados_enviados' => $this->conexao->error,
				);
	    	}
	    }

	    public function verificar_licenca()
	    {
	    	$dados = $this->DadosLicenca;
	    	$codigo_ativacao = $dados['codigo_ativacao'];

	    	$dados_r = $this->Exec_SQL("SELECT * FROM `licencas` WHERE `codigo_ativacao`='$codigo_ativacao'");
	    	if($dados_r){
	    		return $resultado = array(
					'codigo' => 0,
					'qtd' => mysqli_num_rows($dados_r),
					'dados'=> $dados_r->fetch_array(),
					'dados_enviados' => $dados,
				);
	    	}else{
	    		$conexao = $this->conexao;
	    		return $resultado = array(
					'codigo' => 1,
					'erro' => $conexao->error,
					'dados_enviados' => $dados,
				);
	    	}
	    }

	    public function BuscarLicenca(){
	    	
	    }

	    public function validate_Trial(){
	    	
	    }

	    public function new_Trial(){

	    }
	}
?>