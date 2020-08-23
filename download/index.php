<?php
	require_once '../assets/Config/routes.php';
	require_once PATH. 'assets/Config/email.php';
	require_once PATH. 'assets/bdados/index.php';

	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once PATH. "libs/phpmailer/vendor/autoload.php";

	include PATH. "assets/Email/Email.php";



	include "processa.php";

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Download do Software</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="https://getbootstrap.com.br/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="https://getbootstrap.com.br/docs/4.1/examples/floating-labels/floating-labels.css" rel="stylesheet">

    <link rel="stylesheet" href="https://www.jfstartupstudio.com.br/download/poupup.css">
  </head>
  <style type="text/css">
  	.campo{
	    height: 34px;
	    padding: 6px 12px;
	    font-size: 14px;
	    line-height: 1.42857143;
	    color: #555;
	    background-color: #fff;
	    background-image: none;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	    margin-top: 2px;
  	}

  	.cadastrar{
	    margin: 8px 0 0 0;
	    padding: 7px;
	    color: #fff;
	    font-size: 14px;
	    font-weight: 600;
	    background-color: #70bb39;
	    border: 1px solid #47ad0b;
	    cursor: pointer;
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    border-radius: 10px;
	    text-decoration: none;
	    margin-bottom: 8px;
  	}

  	.form-group{
  		margin-bottom: 3px;
  	}
  </style>
  <body style="background-color: #3a5275; font-family: 'Helvetica Neue',Helvetica,Arial,'sans-serif'; font-size: 14px; line-height: 1.42857143;">
    <form class="form-signin" method="POST">
      <div class="text-center mb-4">
      	<span style="color: #fff; font-size: 24px; font-weight: 600;">Baixe a versão Trial do software agora!</span>
	  	<div class="span2">Teste o programa por 1 dia gratuito ilimitado</div>
	  	<div class="span3">Só prencher e baixar</div>
      </div>
      <div style="margin: 0; padding: 0;">
      	<div class="form-group">
	       <input type="text" id="inputEmail" class="form-control campo" placeholder="Digite seu nome" name="nome" required>
	    </div>

	    <div class="form-group">
	       <input type="email" id="inputEmail" class="form-control campo" placeholder="Seu melhor E-mail" name="email" required>
	    </div>

	    <div class="form-group">
	      <input type="text" id="telefone" class="form-control campo" placeholder="Seu celular/WhatsApp | (DDD) + 9 + Numero" maxlength="15" name="telefone" required>
	    </div>
      </div>
      

      <button class="btn btn-lg btn-primary btn-block cadastrar" style="background-color: #70bb39; border: 1px solid #47ad0b; font-weight: 600; font-size: 15px;" type="submit" name="cadastrar">Eu Quero Baixar!</button>
    </form>
    <script type="text/javascript">
  	function mascara(o,f){
	    v_obj=o
	    v_fun=f
	    setTimeout("execmascara()",1)
	}
	function execmascara(){
	    v_obj.value=v_fun(v_obj.value)
	}
	function mtel(v){
	    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
	    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
	    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
	    return v;
	}
	function id(el){
		return document.getElementById(el);
	}
	window.onload = function(){
		id('telefone').onkeyup = function(){
			mascara(this,mtel);
		}
	}
  </script>
  </body>

</html>
