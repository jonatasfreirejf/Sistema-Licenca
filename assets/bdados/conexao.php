<?php
	require PATH. 'assets/seguranca/seg_dados.php';
	require_once PATH. 'assets/Config/bd.php';
	
	class Conexao extends Tratar_Dados{
		protected $host = HOST;
		protected $usuario = USER;
		protected $senha = PASSWORD;
		protected $bdados = BDADOS;
		protected $conexao;

		public function conectar(){
			$host = $this->host;
			$usuario = $this->usuario;
			$senha = $this->senha;
			$bdados = $this->bdados;

			$this->conexao = new mysqli($host, $usuario, $senha, $bdados);
			if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

		}

		public function desconectar(){
			try {
				mysqli_close($this->conexao);
			} catch (Exception $e) {
				
			}
			
		}

		public function conectar_pdo(){
			$host = $this->host;
			$usuario = $this->usuario;
			$senha = $this->senha;
			$bdados = $this->bdados;

			$dns = "mysql:host=$host;dbname=$bdados";
			try {
				$this->conexao = new PDO($dns, $usuario, $senha);
			} catch (PDOException $e) {
				echo "Erro PDO:". $e->getMessage();
			}
			
		}

		public function desconectar_pdo(){
			$this->conexao = null;
		}

	}

?>