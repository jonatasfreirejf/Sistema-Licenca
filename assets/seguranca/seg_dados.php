<?php
	/**
	 * 
	 */
	class Tratar_Dados
	{
		private $dados;

		public function SetDados($dados){
			$this->dados = $dados;
		}

		public function GetDados(){
			return $this->dados;
		}

		public function Tratar($dados){
			$this->SetDados($dados);
			$dados = str_replace('"', '&quot;', $this->GetDados());
			$dados = str_replace('“', '&ldquo;', $dados);
			$dados = str_replace('”', '&rdquo;', $dados);
			$dados = str_replace('‘', '&lsquo;;', $dados);
			$dados = str_replace('’', '&rsquo;', $dados);
			$dados = str_replace('‚', '&sbquo;', $dados);
			$dados = str_replace('„', '&bdquo;', $dados);
			$dados = str_replace('&', '&amp;', $dados);
			$dados = str_replace('<', '&lt;', $dados);
			$dados = str_replace('>', '&gt;', $dados);
			$dados = str_replace("'", '&apos;', $dados);
			$dados = str_replace("`", '&grave;', $dados);
			$dados = str_replace("´", '&acute;', $dados);
			$dados = str_replace("˝", '&dblac;', $dados);
			$dados = str_replace("′", '&prime;', $dados);
			$dados = str_replace("″", '&Prime;', $dados);
			$dados = str_replace("‵", '&bprime;', $dados);
			$this->SetDados($dados);

		}
	}
?>