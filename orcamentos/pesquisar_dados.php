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
		<!--Cabecalho-->
			<div class="row mt-4 divCabecalho">
				<div class="col-lg-12 d-flex justify-content-between align-items-center">
					<h3>Pesquisar</h1>
					<div>
						<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"><a href="index.php" class="p-cabecalho" style="text-decoration:none;">Listar</a></button>
						<button type="button" class="btn btn-outline-dark btnCabecalho" data-bs-toggle="modal" data-bs-target="#modalCadastro" >Cadastrar</button>

					</div>
				</div>
			</div>
			<!--Formulário Pesquisa-->
			<form method="POST" action="" class="form-busca">
				<div class=col-auto>
				<label>Nome cliente: </label>
				<input type="text" class="form-control" name="nm_cliente" placeholder="Digite o nome do cliente">
				<label>Nome vendedor:</label>
				<input type="text" class="form-control" name="nm_vendedor" placeholder="Digite o nome do vendedor">
				<label>Intervalo de datas:</label>
				<div class="col-md-6"> 
					<input class="form-control" type="date"  name="data_inicial"/>
				</div>
				<div class="col-md-6"> 
					<input class="form-control" type="date" name="data_final"/>
				</div>
				<input class="btn btn-outline-primary mb-3 botao-busca" name="pesquisaOrc" type="submit" value="Pesquisar">
				</div>
			</form>
			<!-- Modal de cadastro-->
			<div class="modal fade" id="modalCadastro" tabindex="-1" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
				  <div class="modal-body">
					<span id="mensagemAlertaErro"></span>
					<div>
						<form class="row g-3" id="form-cadastro">
							<div class="col-md-12">
								<input class="form-control" placeholder="001" type="number" name="id"/>
							</div>
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
							<div class="col-md-12">
								<input class="btn btn-primary" type="submit" id="botao-cadastro" value="Cadastrar"/>
							</div>
						</form>
					</div>
				  </div>
				  </div>
			  </div>
			</div>			
			<!--Fim modal Cadastrar-->
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
								<input class="form-control" placeholder="Cliente" id="editCliente" type="text" name="cliente"/>
							</div>
							<div class="col-md-12">
								<input class="form-control" placeholder="Vendedor" id="editVendedor" type="text" name="vendedor"/> 
							</div>
							<div class="col-md-6"> 
								<input class="form-control" type="date"  id="editData" name="data_orc"/>
							</div>
							<div class="col-md-6">
								<input class="form-control" type="time" id="editHorario" name="hora_orc"/>
							</div>
							<div class="col-md-12">
								<input class="form-control" placeholder="Descricao" id="editDescricao" type="text" name="descricao"/>
							</div>
							<div class="col-md-12">
								<input class="form-control" placeholder="50,00" id="editValor" type="number" name="valor"/>
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
					<button type="button" id="botaoApagar" class="btn btn-outline-primary">Apagar</button>
				</div>
				</div>
			</div>
			</div>
			<!--Fim Modal Deletar-->
		<?php
		$pesquisaOrc = filter_input(INPUT_POST, 'pesquisaOrc', FILTER_SANITIZE_STRING);
		if($pesquisaOrc){
			$nm_cliente = filter_input(INPUT_POST, 'nm_cliente', FILTER_SANITIZE_STRING);
			$nm_vendedor = filter_input(INPUT_POST, 'nm_vendedor', FILTER_SANITIZE_STRING);
			$data_inicial = filter_input(INPUT_POST, 'data_inicial', FILTER_SANITIZE_STRING);
			$data_final = filter_input(INPUT_POST, 'data_final', FILTER_SANITIZE_STRING);


			if(empty($nm_cliente) && empty($nm_vendedor) && empty($data_inicial) && empty($data_final)){
				echo "<div class='alert alert-danger' role='alert'>Você deve preencher algum campo<div/>";
			}elseif(!empty($data_inicial) && empty($data_final)){
				echo "<div class='alert alert-danger' role='alert'>Você deve preencher o segundo campo de data<div/>";
			}elseif(!empty($data_final) && empty($data_inicial)){
				echo "<div class='alert alert-danger' role='alert'>Você deve preencher o primeiro campo de data<div/>";
			}else{
				if(empty($data_final)){
					$result_orcamento = "SELECT * FROM orcamento 
					 WHERE ((nome_cliente LIKE '%$nm_cliente%') AND (nome_vendedor LIKE '%$nm_vendedor%'))";
					$query = mysqli_query($conexao, $result_orcamento);
				}else{
					$result_orcamento = "SELECT * FROM orcamento 
					WHERE (data>'$data_inicial' AND data<'$data_final') AND ((nome_cliente LIKE '%$nm_cliente%') AND (nome_vendedor LIKE '%$nm_vendedor%'))";
				   	$query = mysqli_query($conexao, $result_orcamento);
				}


				if(mysqli_num_rows($query) > 0){
					//Cria o cabeçalho da tabela
					echo "<table class= 'table table-striped table-bordered table-hover'>";
					echo "<thead>";
					echo "<tr>";
					echo "<th class='col'>ID</th>";
					echo "<th class='col'>Cliente</th>";
					echo "<th class='col'>Vendedor</th>";
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
						$id = $row["id"];
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
					echo "<div class='alert alert-danger' role='alert'>Nenhum orçamento foi encontrado!<div/>";
				}
			}
			
		}
		?>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<script src="js/index.js"></script>
	</body>
</html>