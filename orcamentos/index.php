  <html>
    <head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
        <title>Oficina 2.0</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="css/index.css">
	</head>
    <body>
        <div class="container">
			<!--Cabecalho-->
			<div class="row mt-4 divCabecalho">
				<div class="col-lg-12 d-flex justify-content-between align-items-center">
				    <h3>Orçamentos</h1>
					<div>
						<button type="button" class="btn btn-outline-dark btnCabecalho" data-bs-toggle="modal"><a href="pesquisar_dados.php" class="p-cabecalho" style="text-decoration:none;">Pesquisar</a></button>
						<button type="button" class="btn btn-outline-dark btnCabecalho" data-bs-toggle="modal" data-bs-target="#modalCadastro" >Cadastrar</button>
					</div>
				</div>
			</div>
			<!-- Exibir tabela com os orçamentos -->
			<span id="mensagemAlerta"></span>
			<div class="row">
				<div class="col-lg-12">
					<span class="tabela_orcamentos"></span>
				</div>
			</div>


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
					<button type="button" id="botaoApagar" class="btn btn-primary">Apagar</button>
				</div>
				</div>
			</div>
			</div>
			<!--Fim Modal Deletar-->
        </div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<script src="js/index.js"></script>
	
    </body>
</html>