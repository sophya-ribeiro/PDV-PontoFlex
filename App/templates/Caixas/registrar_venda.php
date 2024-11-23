<?php

use Cake\I18n\DateTime;

?>

<?= $this->Html->css(['caixas_registrar_venda', 'caixas_container_lateral']) ?>
<?= $this->Html->script(['caixas_registrar_venda', 'caixas_registrar_venda_modal', 'input-preco'], ['defer']) ?>

<div class="container-lateral">
	<div class="container-lateral-nav">
		<div class="container-titulo">
			<ion-icon name="cube" class="cube-icon"></ion-icon>
			<h1 class="titulo-secao m-0">Caixa</h1>
		</div>

		<nav>
			<h2 class="subt-secao">Vendas</h2>

			<ul class="secao-navegacao m-0 p-0">
				<li><a class="itens-nav" href="<?= $this->Url->build(['controller' => 'Caixas', 'action' => 'index']) ?>">Vendas recentes</a></li>
				<li><a class="itens-nav" href="<?= $this->Url->build(['controller' => 'Caixas', 'action' => 'registrarVenda']) ?>">Registrar venda</a></li>
			</ul>

			<?= $this->Form->create(null, [
				'url' => [
					'controller' => 'Caixas',
					'action' => 'fecharCaixa'
				],
				'type' => 'post'
			]); ?>

			<button type="submit" class="botao-caixa-aberto">Fechar caixa</button>
			<?php $dataAberturaCaixa = (new DateTime($caixaAberto->instante_abertura))->format('d/m/Y - H:i'); ?>
			<p class="texto-abertura">Aberto em <?= $dataAberturaCaixa ?></p>
			<?= $this->Form->end() ?>
		</nav>
	</div>

	<?= $this->element('default/footer'); ?>
</div>

<section class="container-central">
	<div class="container-venda">
		<?= $this->Form->create(null, [
			'url' => [
				'controller' => 'Caixas',
				'action' => 'registrarVenda'
			],
			'type' => 'post',
			'onkeydown' => 'return event.key != "Enter";'
		]); ?>

		<div class="div-titulo">
			<h1 class="venda-texto m-0">Nova venda</h1>
			<button type="button" class="botao-adicionar" data-bs-toggle="modal" data-bs-target="#modal-adicionar-produto">
				<ion-icon name="add-circle" class="add-icon"></ion-icon>
				Adicionar produto
			</button>
		</div>
		<div class="div-tabela">
			<table id="venda-produtos-table" class="w-100">
				<thead>
					<tr>
						<th>Item</th>
						<th>Fabricante</th>
						<th>Qtd.</th>
						<th>Preço unitário</th>
						<th>Preço total</th>
						<th></th>
					</tr>
				</thead>

				<tbody id="venda-produtos-tbody">
					<tr id="tr-tabela-sem-produtos">
						<td colspan="5" class="text-center py-4">Ainda não foram adicionados produtos nesta venda.</td>
					</tr>
				</tbody>
			</table>

		</div>

		<div class="container-pagamento">
			<h2 class="titulo-pagamento">Pagamento</h2>
			<h3 class="subtitulo-pagamento">Escolha a forma de pagamento</h3>

			<div class="container-pagamentos">
				<label for="radio-dinheiro">
					<input id="radio-dinheiro" type="radio" name="forma_pagamento" value="dinheiro" checked>
					<div class="pagamento-opcao">Dinheiro</div>
				</label>

				<label for="radio-pix">
					<input id="radio-pix" type="radio" name="forma_pagamento" value="pix">
					<div class="pagamento-opcao">Pix</div>
				</label>

				<label for="radio-cartao-debito">
					<input id="radio-cartao-debito" type="radio" name="forma_pagamento" value="debito">
					<div class="pagamento-opcao">Cartão Débito</div>
				</label>

				<label for="radio-cartao-credito">
					<input id="radio-cartao-credito" type="radio" name="forma_pagamento" value="credito">
					<div class="pagamento-opcao">Cartão Crédito</div>
				</label>
			</div>

			<div id="container-parcelamento" class="container-parcelamento d-none">
				<h4 class="subtitulo-pagamento">Escolha a forma de parcelamento</h4>

				<div class="container-parcelamentos">
					<h5 class="titulo-parcelamento">Parcelas:</h5>
					<label>
						<input type="radio" name="quantidade_parcelas" value="1" checked>
						<div class="parcela-opcao">1x R$<span class="ms-1" id="parcela-1x-valor">00,00</span></div>
					</label>

					<label>
						<input type="radio" name="quantidade_parcelas" value="2">
						<div class="parcela-opcao">2x R$<span class="ms-1" id="parcela-2x-valor">00,00</span></div>
					</label>

					<label>
						<input type="radio" name="quantidade_parcelas" value="3">
						<div class="parcela-opcao">3x R$<span class="ms-1" id="parcela-3x-valor">00,00</span></div>
					</label>

					<label>
						<input type="radio" name="quantidade_parcelas" value="5">
						<div class="parcela-opcao">5x R$<span class="ms-1" id="parcela-5x-valor">00,00</span></div>
					</label>

					<label>
						<input type="radio" name="quantidade_parcelas" value="10">
						<div class="parcela-opcao">10x R$<span class="ms-1" id="parcela-10x-valor">00,00</span></div>
					</label>
				</div>
			</div>
		</div>

		<div class="container-valor">
			<div class="div-valor">
				<p class="m-0 titulo-valor">Desconto:</p>
				<input
					type="numeric"
					id="valor-desconto"
					name="desconto_total"
					class="input-desconto input-preco m-0"
					placeholder="R$ 00,00">
			</div>

			<div class="div-valor">
				<p class="titulo-valor m-0">Valor total:</p>
				<p id="valor-total" class="texto-valortotal m-0">R$ 00,00</p>
			</div>
		</div>


		<div class="container-registrarvenda">
			<input type="submit" class="btn btn-primary rounded botao border-0 py-2 px-4" value="Registrar venda">
		</div>

		<?= $this->Form->end(); ?>
	</div>
</section>


<div class="modal fade" id="modal-adicionar-produto" tabindex="-1" aria-labelledby="modal-adicionar-produto"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">

		<div class="modal-content border-0">
			<div class="modal-header text-white">
				<h1 class="modal-title p-1" id="modalCadastrarProduto">Inclusão de produto</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body px-4">
				<div class="mb-3">
					<div class="busca-botao">
						<input class="form-control border rounded-pill busca-input" type="text"
							id="input-busca-produto" placeholder="Buscar produto...">
						<ion-icon name="search" class="search-icon"></ion-icon>
					</div>
				</div>

				<div class="mb-3">
					<h2 class="texto-resultados">Resultados encontrados:</h2>
					<ul class="lista-titulo pl-0">
						<li class="lista-item-icone"></li>
						<li class="lista-item">Nome</li>
						<li class="lista-item">Marca</li>
						<li class="lista-item">Modelo</li>
						<li class="lista-item">Lote</li>
						<li class="lista-item-qtd">Qtd.</li>
						<li class="lista-item">Preço</li>
						<li class="lista-item-icone"></li>
					</ul>
				</div>

				<div class="d-flex">
					<span id="mensagem-pesquisar-produto" class="w-100 py-4 text-center">Pesquise um produto para adicioná-lo.</span>
					<span id="mensagem-produto-nao-encontrado" class="w-100 py-4 text-center d-none">Nenhum produto encontrado para essa busca.</span>
					<span id="mensagem-erro-busca-produto" class="w-100 py-4 text-center d-none">Ocorreu um arro ao buscar produtos.</span>

					<div id="loading-produtos" class="w-100 py-4 d-flex justify-content-center d-none">
						<div class="spinner-border spinner-border-sm" role="status">
							<span class="visually-hidden">Carregando...</span>
						</div>
					</div>
				</div>

				<div id="resultados-produtos">
				</div>

				<div class="modal-footer border-0 p-0 pt-3">
					<button type="button" class="btn btn-primary rounded botao border-0 py-2 px-4" onclick="adicionarProdutosNaVenda()">
						Adicionar produto
					</button>
				</div>
			</div>
		</div>
	</div>
</div>