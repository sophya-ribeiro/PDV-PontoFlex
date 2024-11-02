<?= $this->Html->css('produtos') ?>

<div class="container-lateral">
	<div class="container-lateral-nav">
		<div class="container-titulo">
			<ion-icon name="cube" class="cube-icon"></ion-icon>
			<h1 class="titulo-secao m-0">Estoque</h1>
		</div>

		<nav>
			<h2 class="subt-secao">Produtos</h2>

			<ul class="secao-navegacao m-0 p-0">
				<li><a class="itens-nav" href="#">Produtos cadastrados</a></li>
				<li>
					<a class="itens-nav" data-bs-toggle="modal" data-bs-target="#modalCadastrarProduto">
						Cadastrar produto
					</a>
				</li>
			</ul>

			<h2 class="subt-secao pt-4">Categorias</h2>

			<ul class="secao-navegacao m-0 p-0">
				<li><a class="itens-nav" href="#">Categorias cadastradas</a></li>
				<li><a class="itens-nav" href="#">Cadastrar categoria</a></li>
			</ul>
		</nav>
	</div>


	<footer>
		<a class="" href="#">Termos e condições</a>
		<a class="" href="#">Suporte</a>

		<div>
			© 2024 PontoFlex. <br>
			Todos direitos reservados
		</div>
	</footer>
</div>

<section class="container-central">

	<div class="busca m-0">

		<div class="busca-botao">
			<input class="form-control border rounded-pill busca-input" type="text" id="example-search-input" value=""
				placeholder="Buscar produto...">
			<ion-icon name="search" class="search-icon"></ion-icon>
		</div>


		<div class="filtro">
			<ion-icon name="filter" class="filter-icon"></ion-icon>
			<h1 class="texto-filtro m-0">Filtrar por:</h1>
			<div class="dropdown">
				<button class="btn btn-light dropdown-toggle rounded btn-secondary px-4 py-2" type="button"
					data-bs-toggle="dropdown" aria-expanded="false">
					Mais recentes
				</button>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item dropdown-item--primeiro" href="#">Mais antigos</a></li>
					<li><a class="dropdown-item" href="#">Maior quantidade</a></li>
					<li><a class="dropdown-item" href="#">Menor quantidade</a></li>
					<li><a class="dropdown-item" href="#">Maior preço</a></li>
					<li><a class="dropdown-item dropdown-item--ultimo" href="#">Menor preço</a></li>
				</ul>
			</div>
		</div>

	</div>

	<div class="div-tabela rounded">
		<table class="table rounded overflow-hidden table-striped table-borderless">
			<thead class="border-1 border-top-0 border-end-0 border-start-0 border-dark-subtle">
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Lote</th>
					<th>Qtd.</th>
					<th>Preço</th>
					<th>Validade</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($produtos as $produto) : ?>
					<tr>
						<td class="d-none"><?= $produto->id ?></td>
						<td class="tabela-texto py-3"><?= $produto->codigo ?></td>
						<td class="tabela-texto py-3"><?= $produto->nome ?></td>
						<td class="tabela-texto py-3"><?= $produto->marca ?></td>
						<td class="tabela-texto py-3"><?= $produto->modelo ?></td>
						<td class="tabela-texto py-3"><?= $produto->lote ?></td>
						<td class="tabela-texto py-3"><?= $produto->quantidade_estoque ?></td>
						<td class="tabela-texto py-3">R$ <?= $produto->preco_unitario ?></td>
						<td class="tabela-texto py-3"><?= $produto->data_validade ?? "-" ?></td>
						<td class="py-3">
							<a href="#"><ion-icon name="create" class="create-icon"></ion-icon></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<nav aria-label="Navegação de página exemplo">
			<ul class="pagination justify-content-center">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Anterior</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">Próximo</a>
				</li>
			</ul>
		</nav>
	</div>
</section>

<div class="modal fade" id="modalCadastrarProduto" tabindex="-1" aria-labelledby="modalCadastrarProduto"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">

		<div class="modal-content border-0">
			<div class="modal-header text-white">
				<h1 class="modal-title p-1" id="modalCadastrarProduto">Novo produto</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<?= $this->Form->create(null, [
					'url' => [
						'controller' => 'Produtos',
						'action' => 'add'
					],
					'type' => 'post'
				]); ?>

				<div class="mb-3 div-form">
					<div class="w-nome">
						<label for="produto-nome" class="col-form-label">Nome <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="produto-nome" placeholder="Digite o nome do produto" name="nome" required>
					</div>

					<div class="w-categoria">
						<label for="produto-nome" class="col-form-label">Categoria <span class="form-span">*</span></label>

						<?= $this->Form->input('categoria_id', [
							'class' => 'form-select',
							'type' => 'select',
							'options' => $categorias
						]) ?>
					</div>

				</div>

				<div class="mb-3 div-form">
					<div class="w-marca">
						<label for="produto-marca" class="col-form-label">Marca <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="produto-marca" placeholder="Digite a marca do produto" name="marca" required>
					</div>

					<div class="w-modelo">
						<label for="produto-modelo" class="col-form-label">Modelo <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="produto-modelo" placeholder="Digite o modelo do produto" name="modelo" required>
					</div>

					<div class="w-lote">
						<label for="produto-lote" class="col-form-label">Lote <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="produto-lote" placeholder="Lote" name="lote" required>
					</div>
				</div>

				<div class="mb-3 div-form">

					<div>
						<label for="produto-codigo" class="col-form-label">Código <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="produto-codigo" placeholder="1234567890ABC" name="codigo" required>
					</div>

					<div>
						<label for="produto-preco" class="col-form-label">Preço <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="produto-preco" placeholder="R$00,00" name="preco_unitario" required>
					</div>

					<div>
						<label for="produto-lote" class="col-form-label">Quantidade <span class="form-span">*</span></label>
						<input type="number" class="form-control" id="produto-quantidade" placeholder="0" name="quantidade_estoque" required>
					</div>

					<div>
						<label for="produto-lote" class="col-form-label">Validade</label>
						<input type="date" class="form-control" id="produto-validade" name="data_validade" placeholder="Lote">
						<p class="validade-texto">Deixe vazio caso não tenha.</p>
					</div>

				</div>


				<div class="modal-footer border-0 p-0 pt-3">
					<?= $this->Form->input('submit', [
						'class' => 'btn btn-primary rounded botao-cadastrar border-0 py-2 px-',
						'type' => 'submit',
						'value' => 'Cadastrar produto'
					]) ?>
				</div>
				<?= $this->Form->end(); ?>

			</div>
		</div>
	</div>
</div>