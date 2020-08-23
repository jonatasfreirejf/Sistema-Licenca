<?php
	
	if(isset($_POST['cadastrar'])){


		if(isset($_GET['software'])){
			$bd = new Bdados();

			$email = new Email();

			$bd->Tratar($_GET['software']);
			$software = $bd->GetDados();
			$bd->Tratar($_POST['nome']);
			$nome = $bd->GetDados();
			$bd->Tratar($_POST['email']);
			$email = $bd->GetDados();
			$bd->Tratar($_POST['telefone']);
			$telefone = $bd->GetDados();

			if(empty($software&$nome&$email&$telefone)){
				echo '<script>alert("Dados inválido de download")</script>';
				exit();
			}


			$result = $bd->Exec_SQL("SELECT * FROM leads_software WHERE email='$email' AND campanha='$software' OR telefone_celular='$telefone' AND campanha='$software'");
			if($result){
				
				$qtd = mysqli_num_rows($result);
				if($qtd > 0){
					
					$result = $bd->Exec_SQL("UPDATE leads_software SET nome='$nome', email='$email', telefone_celular='$telefone' WHERE email='$email' AND campanha='$software' OR telefone_celular='$telefone' AND campanha='$software'");
					if($result){
						$template = file_get_contents("templates/template_admin.html");

						$dados = array(
							'smtp' => SMTP,
							'porta' => PORT,
							'seguranca' => SECURITY,
							'nome' => NAME,
							'email' => EMAIL,
							'senha' => PASSWORD_,
							'resposta' => REPLY,
							'destinario' => EMAIL_NOTIFICATION,
							'ip' => $_SERVER['REMOTE_ADDR'],
							'assunto' => $nome. " solicitou para baixar o software " .$software,
							'mensagem' => $template,
						);

						$status = $email->enviarEmail($dados);

						if($status == 0){
							$template = file_get_contents("templates/template_cliente.html");

							$dados['destinario'] = $email;
							$dados['assunto'] = $nome. ", você solicitou baixar a ferramenta " .$software;
							$dados["software"] = $software;
							$dados['mensagem'] = $template;

							$status = $email->enviarEmail($dados);
							if($status == 0){
								echo '<script>alert("O software foi enviado por e-mail")</script>';
							}else{
								echo '<script>alert("Erro ao enviar o software para o e-mail")</script>';
							}
						}
					}

				}else{
					
					$data = date("Y-m-d");
					$result = $bd->Exec_SQL("INSERT INTO leads_software(`nome`, `email`, `telefone_celular`, `campanha`, `data`) VALUES('$nome','$email','$telefone','$software','$data')");
					if($result){
						
						$template = file_get_contents("templates/template_admin.html");

						$dados = [
							'smtp'=>SMTP,
							'porta'=>PORT,
							'seguranca'=>SECURITY,
							'nome'=>NAME,
							'email'=>EMAIL,
							'senha'=>PASSWORD,
							'resposta'=> REPLY,
							'destinario' => EMAIL_NOTIFICATION,
							'ip' => $_SERVER['REMOTE_ADDR'],
						];


						$dados['assunto'] = $nome. " solicitou para baixar o software " .$software;
						$dados['mensagem'] = $template;


						$status = $email->enviarEmail($dados);

						if($status == 0){
							$template = file_get_contents("templates/template_cliente.html");

							$dados['destinario'] = $email;
							$dados['assunto'] = $nome. ", você solicitou baixar a ferramenta " .$software;
							$dados["software"] = $software;
							$dados['mensagem'] = $template;

							$status = $email->enviarEmail($dados);
							if($status == 0){
								echo '<script>alert("O software foi enviado por e-mail")</script>';
							}else{
								echo '<script>alert("Erro ao enviar o software para o e-mail")</script>';
							}
						}
					}else{
						echo '<script>alert("Erro ao cadastrar o usuário")</script>';
					}
				}

			}

		
		}else{
			

			echo '<script>alert("Link inválido de Download")</script>';



		}



	}
	

?>