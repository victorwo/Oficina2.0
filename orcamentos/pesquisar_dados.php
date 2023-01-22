<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
        <title>Pesquisar Orçamentos</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">		
		<link rel="stylesheet" href="css/index.css">

	</head>
	<body>
		<div class="container">
		
			<div class="row mt-4">
				<div class="col-lg-12 d-flex justify-content-between align-items-center">
					<h3>Pesquisar</h1>
					<div>
						<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"><a href="index.php" class="p-cabecalho" style="text-decoration:none;">Listar</a></button>
					</div>
				</div>
			</div>
		
		<form method="POST" action="">
			<div class=col-auto>
			<label>ID: </label>
			<input type="text" class="form-control" name="id" placeholder="Digite o id">
			
			<input class="btn btn-outline-primary mb-3" name="pesquisaOrc" type="submit" value="Pesquisar">
			</div>
		
		</form>

		<p></p>


					<!--Modal Editar -->
					<div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5">Editar</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					<span id="alertaErroEdicao"></span>
					<form class="row g-3" id="form-editar">
							<div class="col-md-12">
								<input class="form-control" placeholder="Cliente" type="text" name="cliente"/>
							</div>
							<div class="col-md-12">
								<input class="form-control" placeholder="Vendedor" type="text" name="vendedor"/> 
							</div>
							<div class="col-md-6"> 
								<input class="form-control" type="date" name="data_orc"/>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="time" name="hora_orc"/>
							</div>
							<div class="col-md-12">
								<input class="form-control" placeholder="Descricao" type="text" name="descricao"/>
							</div>
							<div class="col-md-12">
								<input class="form-control" placeholder="50,00" type="number" name="valor"/>
							</div>
							<input class="btn btn-primary" type="submit" id="botao-editar" value="Salvar Mudanças"/>
						</form>
					</div>

					</div>
				</div>
				</div>


			<!--Fim Modal Editar-->

			<!-- Modal Deletar-->
			<div class="modal fade" id="modalApagar" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Apagar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<span id="alertaErroApagar"></span>
					<p>Tem certeza que deseja apagar o orçamento de id #<span id="spanDeletar"></span>?</p>
				</div>
				<div class="modal-footer">
					<button type="button" id="botaoApagar" class="btn btn-primary">Apagar</button>
				</div>
				</div>
			</div>
			</div>
			<!--Fim Modal Deletar-->
		<?php
		$pesquisaOrc = filter_input(INPUT_POST, 'pesquisaOrc', FILTER_SANITIZE_STRING);
		if($pesquisaOrc){
			$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
			$result_orcamento = "SELECT * FROM orcamento WHERE id LIKE '%$id%'";
			$query = mysqli_query($conexao, $result_orcamento);
			if(mysqli_num_rows($query) > 0){
				//Cria o cabeçalho da tabela
				echo "<table class= 'table table-striped table-bordered table-hover'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th class='col'>Id</th>";
				echo "<th class='col'>Vendedor</th>";
				echo "<th class='col'>Cliente</th>";
				echo "<th class='col'>Valor</th>";
				echo "<th class='col'>Descricao</th>";
				echo "<th class='col'>Data</th>";
				echo "<th class='col'>Data</th>";
				echo "<th class='col'>Ações</th>";
				echo "</tr>";
				echo "</thead>";
				echo "</tbody>";
		
				
				while ($row = mysqli_fetch_assoc($query)){
					//exibindo os resultados de cada linha
					echo "<tr>";
					echo "<td>" . $id . "</td>";
					echo "<td>" . $row["nome_cliente"] . "</td>";
					echo "<td>" . $row["nome_vendedor"] . "</td>";
					echo "<td>" . $row["valor"] . "</td>";
					echo "<td>" . $row["descricao"] . "</td>";
					echo "<td>" . $row["data"] . "</td>";
					echo "<td>" . $row["horario"] . "</td>";
					echo "<td> <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#modalEditar' onclick='editarDados($id)'>Editar </button> 
					<button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#modalApagar' onclick='apagarDados($id)'>Apagar</button></td>";
					echo  "</tr>";
				}
				
				echo "</tbody>"; 
				echo "</table>";
				
				
			}
			else{
				echo "<p>Nenhum orçamento foi encontrado!</p>";
			}
			
		}
		?>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<script src="js/index.js"></script>
	</body>
</html>