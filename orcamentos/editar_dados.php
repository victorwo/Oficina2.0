<?php

// Incluir a conexao com o banco de dados
include_once "conexao.php";
// Receber os dados
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$cliente = $dados['cliente'];
$vendedor = $dados['vendedor'];
$valor = $dados['valor'];
$descricao = $dados['descricao'];
$data = $dados['data_orc'];
$horario = $dados['hora_orc'];
$horario = $horario . ":00";
$retorna = "";

// validar o formulario
if(empty($cliente)){
	$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo cliente!</div>"]; 
}elseif(empty($dados['vendedor'])){
	$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo vendedor!</div>"]; 
}elseif(empty($dados['valor'])){
	$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo valor!</div>"]; 
}elseif(empty($dados['descricao'])){
	$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo descrição!</div>"]; 
}elseif(empty($dados['data_orc'])){
	$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo data!</div>"]; 
}elseif(empty($horario)){
	$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Preencha o campo horário!</div>"]; 
}else {
    // Editar os dados na tabela
	$query = "UPDATE orcamento SET  nome_cliente='$cliente', nome_vendedor='$vendedor', valor='$valor', descricao='$descricao', data='$data', horario = '$horario' WHERE id='$id'";
    
	$edit_orcamento = $conexao->prepare($query);
    
	// Verificar se editou o endereco
	if ($edit_orcamento->execute()) {
		$retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'> Orçamento editado com sucesso!</div>"]; 
		
    }else {
		$retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Orçamento não editado com sucesso!</div>"]; 
    }

}
echo json_encode($retorna);
?>