const listarOrcamentos = async () => {
	const dados = await fetch("./listar_dados.php");
	const resposta = await dados.json();
	//console.log(resposta);

	if(!resposta['status']){
		document.querySelector("#mensagemAlerta").innerHTML = resposta['msg'];
	}else{
		const conteudo = document.querySelector(".tabela_orcamentos");
		if(conteudo){
			conteudo.innerHTML = resposta['dados'];
		}
	}
}

listarOrcamentos(1);

//Cadastrar registros no banco

const cadForm = document.querySelector('#form-cadastro');

//Somente acessa o formulário quando existe o seletor '#form-cadastro'
if (cadForm){
	cadForm.addEventListener("submit", async(e) => {
		console.log("clicou no botao");
		e.preventDefault();
		const dadosFormulario = new FormData(cadForm);
		const dados = await fetch("cadastrar_dados.php", {
			method: "POST",
			body: dadosFormulario
		});
		const resposta = await dados.json();
		//console.log(resposta);
		
		//Acessa quando não cadastrar com sucesso
		if(!resposta['status']){
			document.getElementById("mensagemAlertaErro").innerHTML = resposta['msg'];

		}else{
			document.getElementById("mensagemAlerta").innerHTML = resposta['msg'];
			cadForm.reset();
			listarOrcamentos(1);
		}
	})
	
}



//Editar no Banco de dados

async function editarDados(id) {

    const dados = await fetch('visualizar.php?id=' + id);
    const resposta = await dados.json();
	
    if (!resposta['status']) {
        //document.getElementById("msgAlerta").innerHTML = resposta['msg'];
		console.log("Erro!!!!");
    } else {
        document.getElementById("editCliente").value = resposta['dados'].nome_cliente;
        document.getElementById("editVendedor").value = resposta['dados'].nome_vendedor;
        document.getElementById("editDescricao").value = resposta['dados'].descricao;
        document.getElementById("editValor").value = resposta['dados'].valor;
		document.getElementById("editData").value = resposta['dados'].data;
		document.getElementById("editHorario").value = resposta['dados'].horario;
    }

	const editarForm = document.querySelector('#form-editar');
	if (editarForm) {
	editarForm.addEventListener("submit", async (e) => {
		e.preventDefault();
		const dadosForm = new FormData(editarForm);

		document.getElementById("botao-editar").value = "Salvando...";

		const dados = await fetch("editar_dados.php?id=" + id, {
			method: "POST",
			body: dadosForm
		});

		const resposta = await dados.json();

	   if (!resposta['status']) {
			document.getElementById("alertaErroEdicao").innerHTML = resposta['msg'];
		} else {
			document.getElementById("alertaErroEdicao").innerHTML = resposta['msg'];
			listarOrcamentos(1);
		}

		document.getElementById("botao-editar").value = "Salvar";
	});
}
}





//apagar dados no banco de dados
function apagarDados(id){
	document.getElementById("spanDeletar").innerHTML = id;
	const apagarButton = document.getElementById("botaoApagar");
	if(apagarButton){
		apagarButton.addEventListener("click", async(e) => {
			e.preventDefault();
			document.getElementById("botaoApagar").value = "Apagando...";

			const dados = await fetch("apagar_dados.php?id="+id, {
				method:"POST"
			});

			const resposta = await dados.json();

			if (!resposta['status']) {
				document.getElementById("alertaErroApagar").innerHTML = resposta['msg'];
			} else {
				document.getElementById("alertaErroApagar").innerHTML = resposta['msg'];
				listarOrcamentos(1);
			}
			document.getElementById("botao-editar").value = "Apagar";
		});
	}

}

