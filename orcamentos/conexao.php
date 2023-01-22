<?php
	$host = "localhost";
	$banco = "orcamentos";
	$user = "root";
	$senha = "";
	
	$conexao = new mysqli($host, $user, $senha, $banco);
	if($conexao->connect_error){
		echo "Falha ao conectar: ". $conexao->connect_error;
	}else{
		//echo "Cadastrado com sucesso";
	}
?>