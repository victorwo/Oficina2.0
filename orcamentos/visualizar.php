<?php

// Incluir a conexao com o banco de dados
include_once "conexao.php";

// Receber o id
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Acessa o IF quando a variavel ID possui valor
if (!empty($id)) {
    $query = "SELECT id, nome_cliente, nome_vendedor, valor, descricao, data, horario 
	FROM orcamento 
    WHERE id=$id LIMIT 1";

    $resultado = mysqli_query($conexao, $query);


    if (($resultado) and (mysqli_num_rows($resultado) > 0)) {
        $row_orcamento = mysqli_fetch_assoc($resultado);
        $retorna = ['status' => true, 'dados' => $row_orcamento];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum orçamento encontrado!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum orçamento encontrado!</div>"];
}

echo json_encode($retorna);
