<?php
include_once "conexao.php";
// Receber os dados
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM orcamento WHERE id=$id";
$apagar_orcamento = $conexao->prepare($sql);
    
// Verificar se editou o endereco
if ($apagar_orcamento->execute()) {
    $mensagem = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'> Orçamento apagado com sucesso!</div>"]; 
    
}else {
    $mensagem = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Não foi possível apagar o orçamento!</div>"]; 
}
echo json_encode($mensagem);

?>