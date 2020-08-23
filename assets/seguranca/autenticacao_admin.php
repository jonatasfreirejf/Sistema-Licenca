<?php
    include_once PATH. '/assets/login/sessoes/sessao.php';
    include_once PATH. '/assets/login/admin/usuarios.php';
    if(isset($_COOKIE['token_1'])){
    	$token = $_COOKIE['token_1'];

    	$sessao = new Sessao_Login;
    	$dados = array('token' => $token);
    	$sessao->SetDados_Sessao($dados);
    	$dados_r = $sessao->Selecionar_Sessao();
    	if($dados_r['qtd'] == 0){
    		$uri = $_SERVER['REQUEST_URI'];
    		if(URI == BASE. "login.php"){
    			
    		}else{
    			header("Location: " .URL. "login.php");
    		}
			
    	}else{
    		$uri = $_SERVER['REQUEST_URI'];
    		if(URI == BASE. "login.php"){
    			header("Location: home/index");
    		}else{
    			
    		}
    	}

    	$admin_dados = $dados_r['dados'];
    	$id = $admin_dados['id_user'];
    	$afs = new Usuario_adm;
    	$afs->conectar();
    	$dados = array(
    		'usuario' => $id,
    	);
    	$afs->SetDados_adm($dados);
	    $dados_r = $afs->Selecionar_Usuario();
	    $admin_dados = $dados_r['dados'];
        

	    if($dados_r['qtd'] == 0){
            header("Location: " .URL. "login.php");
	    }
    }else{
    	$uri = $_SERVER['REQUEST_URI'];
    	if(URI == BASE. "login.php"){
    		
    	}else{
    		header("Location: " .URL. "login.php");
    	}
    }


?>