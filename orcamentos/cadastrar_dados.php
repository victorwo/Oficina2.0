<?php

	include_once "conexao.php";
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$id = $dados['id'];
	$cliente = $dados['cliente'];
	$vendedor = $dados['vendedor'];
	$valor = $dados['valor'];
	$descricao = $dados['descricao'];
	$data = $dados['data_orc'];
	$horario = $dados['hora_orc'];
	$horario = $horario . ":00";
	$retorna = "";
	
	//Validar o formulário
	
	if(empty($id)){
		$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo id!</div>"]; 
	}elseif(empty($cliente)){
		$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo cliente!</div>"]; 
	}elseif(empty($vendedor)){
		$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo vendedor!</div>"]; 
	}elseif(empty($valor)){
		$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo valor!</div>"]; 
	}elseif(empty($descricao)){
		$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo descricao!</div>"]; 
	}elseif(empty($data)){
		$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo data!</div>"]; 
	}elseif(empty($horario)){
		$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo horário!</div>"]; 
	}else{
		//Insere os dados no BD orcamento
		$sql = "INSERT INTO orcamento (id, nome_cliente, nome_vendedor, valor, descricao, data, horario)
		VALUES ('$id', '$cliente', '$vendedor', '$valor', '$descricao', '$data', '$horario')";
		
		if(mysqli_query($conexao, $sql)){
			$retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'> Orçamento foi cadastrado com sucesso!</div>"]; 
		}
	}
	echo json_encode($retorna);
?>
