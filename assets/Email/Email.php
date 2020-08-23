<?php
    class Email
    {

        private function formatarEmail($dados){
            $mensagem = $dados['mensagem'];
            $mensagem = str_replace("{id}", $dados['id'], $mensagem);
            $mensagem = str_replace("{id_licenca}", $dados['id_licenca'], $mensagem);
            $mensagem = str_replace("{id_cliente}", $dados['id_cliente'], $mensagem);
            $mensagem = str_replace("{afiliado}", $dados['afiliado'], $mensagem);
            $mensagem = str_replace("{nome}", $dados['nome'], $mensagem);
            $mensagem = str_replace("{cpf}", $dados['cpf'], $mensagem);
            $mensagem = str_replace("{email}", $dados['email'], $mensagem);
            $mensagem = str_replace("{razao_social}", $dados['razao_social'], $mensagem);
            $mensagem = str_replace("{cnpj}", $dados['cnpj'], $mensagem);
            $mensagem = str_replace("{endereco}", $dados['endereco'], $mensagem);
            $mensagem = str_replace("{numero}", $dados['numero'], $mensagem);
            $mensagem = str_replace("{bairro}", $dados['bairro'], $mensagem);
            $mensagem = str_replace("{cidade}", $dados['cidade'], $mensagem);
            $mensagem = str_replace("{estado}", $dados['estado'], $mensagem);
            $mensagem = str_replace("{cep}", $dados['cep'], $mensagem);
            $mensagem = str_replace("{fixo}", $dados['fixo'], $mensagem);
            $mensagem = str_replace("{skype}", $dados['skype'], $mensagem);
            $mensagem = str_replace("{celular}", $dados['celular'], $mensagem);
            $mensagem = str_replace("{software}", $dados['software'], $mensagem);
            $mensagem = str_replace("{preco}", $dados['preco'], $mensagem);
            $mensagem = str_replace("{plano}", $dados['plano'], $mensagem);
            $mensagem = str_replace("{descricao}", $dados['descricao'], $mensagem);
            $mensagem = str_replace("{codigo}", $dados['codigo'], $mensagem);
            $mensagem = str_replace("{email2}", $dados['email2'], $mensagem);
            $mensagem = str_replace("{data_contratacao}", $dados['data_contratacao'], $mensagem);
            $mensagem = str_replace("{data_vencimento}", $dados['data_vencimento'], $mensagem);
            $mensagem = str_replace("{data}", $dados['data'], $mensagem);
            $mensagem = str_replace("{horario}", $dados['ip'], $mensagem);
            $mensagem = str_replace("{ip}", $dados['ip'], $mensagem);
            $mensagem = str_replace("{codigo_transacao}", $dados['codigo_transacao'], $mensagem);
            $mensagem = str_replace("{texto}", $dados['texto'], $mensagem);
            return $mensagem;

        }

        public function enviarEmail($dados){
            $dados['mensagem'] = $this->formatarEmail($dados);
            $dados_de_envio = array(
                'smtp' => $dados['smtp'],
                'porta' => $dados['porta'],
                'seguranca' => $dados['seguranca'],
                'nome' => $dados['nome'],
                'email'=> $dados['email_de_envio'],
                'senha'=> $dados['senha'],
                'resposta'=> $dados['reply'],
            );

            
            $mail = new PHPMailer();
            $mail->Port = $dados_de_envio['porta'];
            $mail->SMTPSecure = $dados_de_envio['seguranca'];
                        
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->IsSMTP(); // Define que a mensagem será SMTP
            $mail->Host = $dados_de_envio['smtp']; // Endereço do servidor SMTP
            $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
            $mail->Username = $dados_de_envio['email']; // Usuário do servidor SMTP
            $mail->Password = $dados_de_envio['senha']; // Senha do servidor SMTP
            
            // Define o remetente
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->From = $dados_de_envio['email']; // Seu e-mail
            $mail->FromName = $dados_de_envio['nome']; // Seu nome
            // Define os destinatário(s)
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->AddAddress($dados['destinatario'], $dados['nome_destinatario']);
            //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
            //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
            // Define os dados técnicos da Mensagem
            $mail->addReplyTo($dados['nome_r'], $dados['resposta']);
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
            $mail->CharSet = 'utf8'; // Charset da mensagem (opcional)
            // Define a mensagem (Texto e Assunto)
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->Subject  = $dados['assunto']; // Assunto da mensagem
            $mail->Body = $dados['mensagem'];
            $mail->AltBody = $dados['mensagem'];
            // Define os anexos (opcional)
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
            // Envia o e-mail
            $enviado = $mail->Send();
                            
            if ($enviado) {
               return 0;
            }else{
                return 1;
            }
        }

    }
 	

?>