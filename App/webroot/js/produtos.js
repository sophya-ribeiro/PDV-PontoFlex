const modalCadastrarProduto = document.getElementById("modal-cadastrar-produto");
const modalEditarProduto = document.getElementById("modal-editar-produto");

const inputEditId = document.getElementById("edit-produto-id");
const inputEditNome = document.getElementById("edit-produto-nome");
const inputEditCategoria = document.getElementById("edit-produto-categoria");
const inputEditMarca = document.getElementById("edit-produto-marca");
const inputEditModelo = document.getElementById("edit-produto-modelo");
const inputEditLote = document.getElementById("edit-produto-lote");
const inputEditCodigo = document.getElementById("edit-produto-codigo");
const inputEditPreco = document.getElementById("edit-produto-preco");
const inputEditQuantidade = document.getElementById("edit-produto-quantidade");
const inputEditValidade = document.getElementById("edit-produto-validade");

function editarDadosProduto(id) {
	const linhaTabela = document.querySelector(`tr[data-produto-id="${id}"]`);

	const dadosProduto = {
		id: linhaTabela.cells[0].textContent.trim(),
		categoria: linhaTabela.cells[1].textContent.trim(),
		codigo: linhaTabela.cells[2].textContent.trim(),
		nome: linhaTabela.cells[3].textContent.trim(),
		marca: linhaTabela.cells[4].textContent.trim(),
		modelo: linhaTabela.cells[5].textContent.trim(),
		lote: linhaTabela.cells[6].textContent.trim(),
		quantidadeEstoque: linhaTabela.cells[7].textContent.trim(),
		precoUnitario: linhaTabela.cells[8].textContent.replace("R$", "").trim(),
		dataValidade: linhaTabela.cells[9].textContent.trim()
	};

	inputEditId.value = dadosProduto.id;
	inputEditNome.value = dadosProduto.nome;
	inputEditCategoria.value = dadosProduto.categoria;
	inputEditMarca.value = dadosProduto.marca;
	inputEditModelo.value = dadosProduto.modelo;
	inputEditLote.value = dadosProduto.lote;
	inputEditCodigo.value = dadosProduto.codigo;
	inputEditPreco.value = dadosProduto.precoUnitario;
	inputEditQuantidade.value = dadosProduto.quantidadeEstoque;

	if (dadosProduto.dataValidade != "-") {
		dadosProduto.dataValidade = new Date(dadosProduto.dataValidade).toISOString().split('T')[0];

		inputEditValidade.value = dadosProduto.dataValidade;
	};
}

function limparInputsModal(modalId) {
	setTimeout(() => {
		const inputs = document.querySelectorAll(`#${modalId} input:not([type="submit"])`);

		inputs.forEach(input => {
			input.value = null;
		});

		document.querySelector(`#${modalId} select`).selectedIndex = 0;
	}, 500);
}

modalCadastrarProduto.addEventListener('hide.bs.modal', (event) => {
	limparInputsModal(event.target.id);
})

modalEditarProduto.addEventListener('hide.bs.modal', (event) => {
	limparInputsModal(event.target.id);
})