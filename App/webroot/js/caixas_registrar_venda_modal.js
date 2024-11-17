const modalAdicionarProduto = document.getElementById("modal-adicionar-produto");
const bsModalAdicionarProduto = new bootstrap.Modal("#modal-adicionar-produto");

const inputBuscaProduto = document.querySelector("#input-busca-produto");
const mensagemPesquisarProduto = document.querySelector("#mensagem-pesquisar-produto");
const mensagemProdutoNaoEncontrado = document.querySelector("#mensagem-produto-nao-encontrado");
const mensagemErroBuscaProduto = document.querySelector("#mensagem-erro-busca-produto");
const loadingProdutos = document.querySelector("#loading-produtos");
const resultadosProdutos = document.querySelector("#resultados-produtos");

function exibirLoadingProdutos() {
	mensagemPesquisarProduto.classList.add("d-none");
	mensagemProdutoNaoEncontrado.classList.add("d-none");
	mensagemErroBuscaProduto.classList.add("d-none");

	loadingProdutos.classList.remove("d-none");
}

async function buscarProdutos(busca) {
	const url = "/produtos/buscar-produtos/?busca=" + String(busca).trim();

	try {
		const response = await fetch(url);

		if (!response.ok) {
			throw new Error(`Response status: ${response.status}`);
		}

		const json = await response.json();

		return json;
	} catch (error) {
		console.error(error.message);

		mensagemErroBuscaProduto.classList.remove("d-none");

		return error;
	}
}

function removerProdutosNaoSelecionados() {
	const listasProdutos = document.querySelectorAll(".lista-produto");

	listasProdutos.forEach((lista) => {
		const checkbox = lista.querySelector(".checkbox-produto");

		if (checkbox && !checkbox.checked) {
			lista.remove();
		}
	});
}

function exibirProdutosEncontrados(produtos = []) {
	loadingProdutos.classList.add("d-none");

	if (produtos.length == 0) {
		removerProdutosNaoSelecionados();
		return mensagemProdutoNaoEncontrado.classList.remove("d-none");
	}

	removerProdutosNaoSelecionados();

	let countProdutosEncontrados = 0;

	produtos.forEach((produto) => {
		const listaProdutoJaExistente = document.querySelector(`.lista-produto[data-produto-id="${produto.id}"]`);
		const vendaProdutoTrJaExistente = document.querySelector(`#venda-produto-tr-${produto.id}`);

		if (listaProdutoJaExistente || vendaProdutoTrJaExistente) {
			return;
		}

		countProdutosEncontrados++;

		resultadosProdutos.insertAdjacentHTML(
			"beforeend",
			/* HTML */ `
				<ul class="lista-produto py-3" data-produto-id="${produto.id}">
					<li class="lista-item-icone">
						<div class="categoria rounded-circle" style="background-color: ${produto.categoria.cor};"></div>
					</li>
					<li class="lista-item lista-item-produto-nome">${produto.nome}</li>
					<li class="lista-item lista-item-produto-marca">${produto.marca}</li>
					<li class="lista-item lista-item-produto-modelo">${produto.modelo}</li>
					<li class="lista-item">${produto.lote}</li>
					<li class="lista-item-qtd lista-item-produto-estoque">${produto.quantidade_estoque}</li>
					<li class="lista-item lista-item-produto-preco">${floatToBrlString(produto.preco_unitario)}</li>
					<li>
						<div class="form-check">
							<input
								class="form-check-input checkbox-produto"
								type="checkbox"
								id="checkbox-produto-${produto.id}"
							/>
							<label class="form-check-label" for="checkbox-produto-${produto.id}"></label>
						</div>
					</li>
				</ul>
			`
		);
	});

	if (countProdutosEncontrados == 0) {
		mensagemProdutoNaoEncontrado.classList.remove("d-none");
	}
}

function adicionarProdutosNaVenda() {
	const listasProdutos = document.querySelectorAll(".lista-produto");

	let quantidadeProdutosAdicionados = 0;

	listasProdutos.forEach((lista) => {
		const checkbox = lista.querySelector(".checkbox-produto");

		if (checkbox && checkbox.checked) {
			quantidadeProdutosAdicionados++;

			const produto = {
				id: lista.getAttribute("data-produto-id"),
				nome: lista.querySelector(".lista-item-produto-nome").textContent,
				marca: lista.querySelector(".lista-item-produto-marca").textContent,
				modelo: lista.querySelector(".lista-item-produto-modelo").textContent,
				estoque: lista.querySelector(".lista-item-produto-estoque").textContent,
				preco: lista.querySelector(".lista-item-produto-preco").textContent,
			};

			vendaProdutosTbody.insertAdjacentHTML(
				"beforeend",
				/* HTML */ `<tr id="venda-produto-tr-${produto.id}">
					<td class="d-none">
						<input type="number" value="${produto.id}" name="produtos[${produto.id}][id]" />
					</td>
					<td class="tabela-texto py-2">${produto.nome} - ${produto.modelo}</td>
					<td class="tabela-texto py-2">${produto.marca}</td>
					<td class="tabela-texto py-2">
						<input
							class="input-qtd border"
							type="number"
							min="1"
							max="${produto.estoque}"
							value="1"
							oninput="atualizarValorTotalProduto(${produto.id})"
							name="produtos[${produto.id}][quantidade]"
						/>
						</td>
					 </td>
					<td class="tabela-texto tabela-texto-preco py-2">${produto.preco}</td>
					<td class="tabela-texto tabela-texto-preco-total py-2">${produto.preco}</td>
					<td class="py-2">
						<button type="button" class="p-0 bg-transparent border-0" onclick="removerProdutoDaVenda(${produto.id})">
							<ion-icon name="trash" class="trash-icon"></ion-icon>
						</button>
					</td>
				</tr>`
			);
		}
	});

	if (quantidadeProdutosAdicionados > 0) {
		mensagemTabelaSemProdutos.classList.add("d-none");
		bsModalAdicionarProduto.hide();
	}

	atualizarValorTotalVenda();
}

inputBuscaProduto.addEventListener("keyup", async ({ key }) => {
	if (key !== "Enter") {
		return;
	}

	exibirLoadingProdutos();

	const produtos = await buscarProdutos(inputBuscaProduto.value);

	exibirProdutosEncontrados(produtos);
});

modalAdicionarProduto.addEventListener("hide.bs.modal", () => {
	mensagemPesquisarProduto.classList.remove("d-none");
	mensagemProdutoNaoEncontrado.classList.add("d-none");
	mensagemErroBuscaProduto.classList.add("d-none");
	loadingProdutos.classList.add("d-none");

	inputBuscaProduto.value = "";
	resultadosProdutos.innerHTML = "";
});
