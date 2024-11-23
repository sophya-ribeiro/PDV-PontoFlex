const vendaProdutosTable = document.querySelector("#venda-produtos-table");
const vendaProdutosTbody = document.querySelector("#venda-produtos-tbody");
const mensagemTabelaSemProdutos = document.querySelector("#tr-tabela-sem-produtos");

const parcelamentoContainer = document.querySelector("#container-parcelamento");
const radiosPagamento = document.querySelectorAll('input[name="forma_pagamento"');
const pValorTotal = document.querySelector("#valor-total");
const inputValorDesconto = document.querySelector("#valor-desconto");

function atualizarValoresParcelamento() {
	const valorTotal = brlStringToFloat(pValorTotal.textContent);

	const parcelas = {
		"1x": valorTotal / 1,
		"2x": valorTotal / 2,
		"3x": valorTotal / 3,
		"5x": valorTotal / 5,
		"10x": valorTotal / 10,
	};

	for (const key in parcelas) {
		const spanParcela = document.querySelector(`#parcela-${key}-valor`);

		spanParcela.textContent = parcelas[key].toFixed(2).replace(".", ",");
	}
}

function exibirParcelamentoContainer() {
	atualizarValoresParcelamento();

	parcelamentoContainer.classList.remove("d-none");
}

function ocultarParcelamentoContainer() {
	document.querySelector('input[name="quantidade_parcelas"][value="1"]').checked = true;

	parcelamentoContainer.classList.add("d-none");
}

function getTotalVendaSemDesconto() {
	const precosTotaisTd = document.querySelectorAll(".tabela-texto-preco-total");

	let valorTotal = 0;

	precosTotaisTd.forEach((precoTotalTd) => {
		valorTotal += brlStringToFloat(precoTotalTd.textContent);
	});

	return valorTotal;
}

function atualizarValorTotalVenda() {
	let valorDesconto = inputValorDesconto.value || 0;

	pValorTotal.textContent = floatToBrlString(getTotalVendaSemDesconto() - valorDesconto);

	atualizarValoresParcelamento();
}

function atualizarValorTotalProduto(produtoId) {
	const produtoTr = document.querySelector(`#venda-produto-tr-${produtoId}`);

	const inputQuantidade = produtoTr.querySelector(".input-qtd");
	const tdPrecoUnitario = produtoTr.querySelector(".tabela-texto-preco");
	const tdPrecoTotal = produtoTr.querySelector(".tabela-texto-preco-total");

	const precoTotal = brlStringToFloat(tdPrecoUnitario.textContent) * parseInt(inputQuantidade.value);

	tdPrecoTotal.textContent = floatToBrlString(precoTotal);

	atualizarValorTotalVenda();
}

function removerProdutoDaVenda(produtoId) {
	const produtoTr = document.querySelector(`#venda-produto-tr-${produtoId}`);

	produtoTr.remove();

	if (vendaProdutosTable.rows.length === 2) {
		mensagemTabelaSemProdutos.classList.remove("d-none");
	}

	atualizarValorTotalVenda();
}

radiosPagamento.forEach((radio) => {
	radio.addEventListener("change", () => {
		if (radio.value == "credito") {
			return exibirParcelamentoContainer();
		}

		ocultarParcelamentoContainer();
	});
});

inputValorDesconto.addEventListener("input", (event) => {
	const valorTotalVenda = getTotalVendaSemDesconto();

	if (valorTotalVenda == 0) {
		inputValorDesconto.value = null;
	}

	const descontoAtual = parseFloat(event.target.value) || 0;

	if (valorTotalVenda - descontoAtual < 0) {
		inputValorDesconto.value = valorTotalVenda;
	}

	atualizarValorTotalVenda();
});
