<?php
	date_default_timezone_set("America/Porto_Velho");
	$data_atual = date("Ymd");
	echo $data_atual;
	echo "<br/>";
	$data_programada = date("Ymd", strtotime("+1 month"));
	echo $data_programada;
	echo "<br/>";
	if($data_atual<=$data_programada){
		echo "Ativada";
	}else{
		echo "Não Ativada";
	}
	
?>