<?php
	/**
	 */
	require_once 'conexao.php';
	class SQL extends Conexao
	{
		
		private $sql;

		public function setSql($sql){
			$this->sql = $sql;
		}

		public function getSql(){
			return $this->sql;
		}

		public function Exec_SQL($sql){
			$this->conectar();
			$this->setSql($sql);
			$conexao = $this->conexao;
			$result = $conexao->query($sql);
			$this->desconectar();
			if ($result) {
				return $result;
			} else {
				return $result;
				var_dump($this->conexao);
			}
			
		}

		public function Exec_SQL_PDO($sql, $dados)
		{
			$this->desconectar_pdo();
			$this->conectar_pdo();
			$conexao = $this->conexao;

			try {
				$query = $conexao->prepare($sql);

				if($dados != null){
					foreach ($dados as $key => $value) {
						$query->bindParam($key, $value);	
					}
				}

				return $query->execute();
			} catch (PDOException $e) {
				echo "Error:" . $e->getMessage();
			}

			

			$this->desconectar_pdo();

		}
	}
?>