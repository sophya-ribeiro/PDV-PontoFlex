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
					<?= $filtro ?>
				</button>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item dropdown-item--primeiro" href="<?= $this->Url->build(['action' => 'index', '?' => ['filtro' => 'Mais recentes']]) ?>">Mais recentes</a></li>
					<li><a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index', '?' => ['filtro' => 'Mais antigos']]) ?>">Mais antigos</a></li>
					<li><a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index', '?' => ['filtro' => 'Maior quantidade']]) ?>">Maior quantidade</a></li>
					<li><a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index', '?' => ['filtro' => 'Menor quantidade']]) ?>">Menor quantidade</a></li>
					<li><a class="dropdown-item" href="<?= $this->Url->build(['action' => 'index', '?' => ['filtro' => 'Maior preço']]) ?>">Maior preço</a></li>
					<li><a class="dropdown-item dropdown-item--ultimo" href="<?= $this->Url->build(['action' => 'index', '?' => ['filtro' => 'Menor preço']]) ?>">Menor preço</a></li>
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
					<tr data-produto-id="<?= $produto->id ?>">
						<td class="d-none"><?= $produto->id ?></td>
						<td class="d-none"><?= $produto->categoria->id ?></td>
						<td class="tabela-texto py-3"><?= $produto->codigo ?></td>
						<td class="tabela-texto py-3"><?= $produto->nome ?></td>
						<td class="tabela-texto py-3"><?= $produto->marca ?></td>
						<td class="tabela-texto py-3"><?= $produto->modelo ?></td>
						<td class="tabela-texto py-3"><?= $produto->lote ?></td>
						<td class="tabela-texto py-3"><?= $produto->quantidade_estoque ?></td>
						<td class="tabela-texto py-3">R$ <?= number_format($produto->preco_unitario, 2, ",", ".") ?></td>
						<td class="tabela-texto py-3"><?= $produto->data_validade ?? "-" ?></td>
						<td class="py-3">
							<a data-bs-toggle="modal" data-bs-target="#modalEditarProduto" onclick="editarDadosProduto(<?= $produto->id ?>)"><ion-icon name="create" class="create-icon"></ion-icon></a>
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

<!-- Início modalCadastrarProtuto -->
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
						<label for="produto-categoria" class="col-form-label">Categoria <span class="form-span">*</span></label>

						<?= $this->Form->input('categoria_id', [
							'id' => 'produto-categoria',
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
						<input type="text" class="form-control" id="produto-preco" placeholder="R$ 00,00" name="preco_unitario" required>
					</div>

					<div>
						<label for="produto-quantidade" class="col-form-label">Quantidade <span class="form-span">*</span></label>
						<input type="number" class="form-control" id="produto-quantidade" placeholder="0" name="quantidade_estoque" required>
					</div>

					<div>
						<label for="produto-validade" class="col-form-label">Validade</label>
						<input type="date" class="form-control" id="produto-validade" name="data_validade" placeholder="Validade">
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
<!-- Fim modalCadastrarProtuto -->


<!-- Início modalEditarProduto -->
<div class="modal fade" id="modalEditarProduto" tabindex="-1" aria-labelledby="modalEditarProduto"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content border-0">
			<div class="modal-header text-white">
				<h1 class="modal-title p-1" id="modalEditarProduto">Editar produto</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<?= $this->Form->create(null, [
					'url' => [
						'controller' => 'Produtos',
						'action' => 'edit'
					],
					'type' => 'post'
				]); ?>

				<input type="hidden" name="id" id="edit-produto-id">

				<div class="mb-3 div-form">
					<div class="w-nome">
						<label for="edit-produto-nome" class="col-form-label">Nome <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="edit-produto-nome" placeholder="Digite o nome do produto" name="nome" required>
					</div>

					<div class="w-categoria">
						<label for="edit-produto-categoria" class="col-form-label">Categoria <span class="form-span">*</span></label>

						<?= $this->Form->input('categoria_id', [
							'id' => 'edit-produto-categoria',
							'class' => 'form-select',
							'type' => 'select',
							'options' => $categorias
						]) ?>
					</div>
				</div>

				<div class="mb-3 div-form">
					<div class="w-marca">
						<label for="edit-produto-marca" class="col-form-label">Marca <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="edit-produto-marca" placeholder="Digite a marca do produto" name="marca" required>
					</div>

					<div class="w-modelo">
						<label for="edit-produto-modelo" class="col-form-label">Modelo <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="edit-produto-modelo" placeholder="Digite o modelo do produto" name="modelo" required>
					</div>

					<div class="w-lote">
						<label for="edit-produto-lote" class="col-form-label">Lote <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="edit-produto-lote" placeholder="Lote" name="lote" required>
					</div>
				</div>

				<div class="mb-3 div-form">
					<div>
						<label for="edit-produto-codigo" class="col-form-label">Código <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="edit-produto-codigo" placeholder="1234567890ABC" name="codigo" required>
					</div>

					<div>
						<label for="edit-produto-preco" class="col-form-label">Preço <span class="form-span">*</span></label>
						<input type="text" class="form-control" id="edit-produto-preco" placeholder="R$ 00,00" name="preco_unitario" required>
					</div>

					<div>
						<label for="edit-produto-quantidade" class="col-form-label">Quantidade <span class="form-span">*</span></label>
						<input type="number" class="form-control" id="edit-produto-quantidade" placeholder="0" name="quantidade_estoque" required>
					</div>

					<div>
						<label for="edit-produto-validade" class="col-form-label">Validade</label>
						<input type="date" class="form-control" id="edit-produto-validade" name="data_validade" placeholder="Validade">
						<p class="validade-texto">Deixe vazio caso não tenha.</p>
					</div>
				</div>

				<div class="modal-footer border-0 p-0 pt-3">
					<?= $this->Form->input('submit', [
						'class' => 'btn btn-primary rounded botao-cadastrar border-0 py-2 px-',
						'type' => 'submit',
						'value' => 'Editar produto'
					]) ?>
				</div>
				<?= $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>
<!-- Fim modalEditarProduto -->

<script>
	const modalEditarProduto = document.getElementById("modalEditarProduto");

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

	modalEditarProduto.addEventListener('hide.bs.modal', event => {
		inputEditId.value = null;
		inputEditCategoria.value = null;
		inputEditNome.value = null;
		inputEditCategoria.value = null;
		inputEditMarca.value = null;
		inputEditModelo.value = null;
		inputEditLote.value = null;
		inputEditCodigo.value = null;
		inputEditPreco.value = null;
		inputEditQuantidade.value = null;
	})
</script>