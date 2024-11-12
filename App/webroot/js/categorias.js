const modalCadastrarCategoria = document.querySelector("#modal-cadastrar-categoria");
const modalEditarCategoria = document.querySelector("#modal-editar-categoria");

const labels = document.querySelectorAll('.color-picker-label');
const radioButtons = document.querySelectorAll('.color-picker-input');

const inputCategoriaNome = document.querySelector("#categoria-nome");
const inputEditarCategoriaId = document.querySelector("#editar-categoria-id");
const inputEditarCategoriaNome = document.querySelector("#editar-categoria-nome");

function removerSelecoesInputCor() {
	labels.forEach(label => label.classList.remove('selected'));
	radioButtons.forEach(radio => radio.checked = false)
}

function editarDadosCategoria(id) {
	removerSelecoesInputCor();

	const categoriaDiv = document.querySelector(`div[data-categoria-id="${id}"]`);

	const categoriaNome = categoriaDiv.getAttribute("data-categoria-nome");
	const categoriaCor = categoriaDiv.getAttribute("data-categoria-cor");

	const radioButton = document.querySelector(`input[data-editar-radio-cor="${categoriaCor}"]`);
	const radioButtonLabel = document.querySelector(`label[data-editar-radio-label-cor="${categoriaCor}"]`);

	radioButtonLabel.classList.add("selected");

	inputEditarCategoriaId.value = id;
	radioButton.checked = true;
	inputEditarCategoriaNome.value = categoriaNome;
}

labels.forEach(label => {
	label.addEventListener('click', function () {
		labels.forEach(l => l.classList.remove('selected')); // Remove borda de todos

		label.classList.add('selected'); // Adiciona borda no selecionado
	});
});

modalCadastrarCategoria.addEventListener('hide.bs.modal', event => {
	inputCategoriaNome.value = null;
	removerSelecoesInputCor();
});

modalEditarCategoria.addEventListener('hide.bs.modal', event => {
	inputEditarCategoriaId.value = null;
	inputEditarCategoriaNome.value = null;
	removerSelecoesInputCor();
});