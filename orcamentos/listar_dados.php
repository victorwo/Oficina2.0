<?php
	
	//incluindo uma conexão com o banco de dados
	include_once "conexao.php";
	
	//Seleciona os registros do banco 
	$sql = "SELECT id, nome_cliente, nome_vendedor, valor, descricao, data, horario 
	FROM orcamento 
	ORDER BY id DESC";
	
	//Cria a query para recupear os registros do Banco
	$resultado = mysqli_query($conexao, $sql);
	
	//Exibe os registros em uma tabela
	if(mysqli_num_rows($resultado) > 0){
		//Cria o cabeçalho da tabela
		$dados = "<table class='table table-striped table-bordered table-hover'>";
		$dados .= "<thead>";
		$dados .= "<tr>";
		$dados .= "<th>Id</th>";
		$dados .= "<th>Cliente</th>";
		$dados .= "<th>Vendedor</th>";
		$dados .= "<th>Valor</th>";
		$dados .= "<th>Descricao</th>";
		$dados .= "<th>Data</th>";
		$dados .= "<th>Data</th>";
		$dados .= "<th>Ações</th>";
		$dados .= "</tr>";
        $dados .= "</thead>";
		$dados .= "</tbody>";

		
		while ($row = mysqli_fetch_assoc($resultado)){
			//exibindo os resultados de cada linha
			$id = $row["id"];
			$dados .= "<tr>";
			$dados .= "<td>" . $id . "</td>";
			$dados .= "<td>" . $row["nome_cliente"] . "</td>";
			$dados .= "<td>" . $row["nome_vendedor"] . "</td>";
			$dados .= "<td>" . $row["valor"] . "</td>";
			$dados .= "<td>" . $row["descricao"] . "</td>";
			$dados .= "<td>" . $row["data"] . "</td>";
			$dados .= "<td>" . $row["horario"] . "</td>";
			$dados .= "<td> <button type='button' class='btn btn-outline-primary botaoEditar' data-bs-toggle='modal' data-bs-target='#modalEditar' onclick='editarDados($id)'>Editar </button> 
			<button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#modalApagar' onclick='apagarDados($id)'>Apagar</button></td>";
			$dados .= "</tr>";
		}
		
		$dados .= "</tbody>"; 
		$dados .= "</table>";
		
		
		$exibir = ['status' => true , 'dados' => $dados];
	}
	else{
		$exibir = ['status' => false , 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Nenhum orçamento foi encontrado </div>"];
	}
	
	//Codifica a tabela para JSON
	echo json_encode($exibir);
?>