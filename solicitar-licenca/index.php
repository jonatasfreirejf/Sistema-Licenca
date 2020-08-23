<?php
	require_once '../assets/Config/routes.php';
	include_once PATH. '/assets/bdados/index.php';
	require_once PATH. 'assets/licenca/Licenca_class.php';

	if(isset($_GET['url'])){
		$url1 = $_GET['url'];
		if($url1 == "post"){
			require_once 'solicitar-licenca.php';
		}else{
			require_once 'login.php';
		}
	}else{
		require_once 'login.php';
	}
	

?>