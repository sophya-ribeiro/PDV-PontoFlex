<?php

use Cake\Core\Configure;
use Cake\I18n\DateTime;

?>

<?= $this->Html->css('caixas') ?>

<div class="container-lateral">
	<div class="container-lateral-nav">
		<div class="container-titulo">
			<ion-icon name="cube" class="cube-icon"></ion-icon>
			<h1 class="titulo-secao m-0">Caixa</h1>
		</div>

		<nav>
			<h2 class="subt-secao">Vendas</h2>

			<ul class="secao-navegacao m-0 p-0">
				<li><a class="itens-nav">Vendas recentes</a></li>
				<li><a class="itens-nav">Registrar venda</a></li>
			</ul>

			<?php if ($caixaAberto) :
				$dataAberturaCaixa = (new DateTime($caixaAberto->instante_abertura))->format('d/m/Y - H:i');
			?>
				<?= $this->Form->create(null, [
					'url' => [
						'controller' => 'Caixas',
						'action' => 'fecharCaixa'
					],
					'type' => 'post'
				]); ?>

				<button type="submit" class="botao-caixa-aberto">Fechar caixa</button>

				<p class="texto-abertura">Aberto em <?= $dataAberturaCaixa ?></p>
				<?= $this->Form->end() ?>
			<?php else : ?>
				<?= $this->Form->create(null, [
					'url' => [
						'controller' => 'Caixas',
						'action' => 'abrirCaixa'
					],
					'type' => 'post'
				]); ?>

				<button type="submit" class="botao-caixa-fechado">Abrir caixa</button>

				<?= $this->Form->end() ?>
			<?php endif; ?>
		</nav>
	</div>

	<?= $this->element('default/footer'); ?>
</div>

<section class="container-central">

	<div class="container-venda">

		<div class="container-venda-titulo">
			<h1 class="venda-titulo p-0 m-0">Venda #45 <span class="venda-status">Concluída</span></h1>

			<p class="venda-texto p-0 m-0">R$ 248.729,47 - Cartão | Crédito</p>
			<p class="venda-texto p-0 m-0">12/10/2024</p>
			<a>
				<ion-icon name="ellipsis-horizontal-sharp" class="ellipsis-icon"></ion-icon>
			</a>
		</div>


		<div class="container-venda-itens rounded">
			<table class="table rounded overflow-hidden table-borderless">
				<thead class="border-1 border-top-0 border-end-0 border-start-0 border-dark-subtle">
					<tr>
						<th class="col-3">Item</th>
						<th class="col-2">Marca</th>
						<th>Modelo</th>
						<th>Qtd.</th>
						<th>Preço unitário</th>
						<th>Preço total</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td class="tabela-texto">Carro Sedan</td>
						<td class="tabela-texto">Hyundai</td>
						<td class="tabela-texto">HB20s</td>
						<td class="tabela-texto">100</td>
						<td class="tabela-texto">R$ 234,00</td>
						<td class="tabela-texto">R$ 23400,00</td>
					</tr>

					<tr>
						<td class="tabela-texto">Carro Sedan</td>
						<td class="tabela-texto">Hyundai</td>
						<td class="tabela-texto">HB20s</td>
						<td class="tabela-texto">100</td>
						<td class="tabela-texto">R$ 234,00</td>
						<td class="tabela-texto">R$ 23400,00</td>
					</tr>
				</tbody>
			</table>

		</div>

	</div>

	<div class="container-venda">

		<div class="container-venda-titulo">
			<h1 class="venda-titulo p-0 m-0">Venda #44 <span class="venda-status">Concluída</span></h1>

			<p class="venda-texto p-0 m-0">R$ 248.729,47 - Cartão | Crédito</p>
			<p class="venda-texto p-0 m-0">12/10/2024</p>
			<a>
				<ion-icon name="ellipsis-horizontal-sharp" class="ellipsis-icon"></ion-icon>
			</a>
		</div>


		<div class="container-venda-itens rounded">
			<table class="table rounded overflow-hidden table-borderless">
				<thead class="border-1 border-top-0 border-end-0 border-start-0 border-dark-subtle">
					<tr>
						<th class="col-3">Item</th>
						<th class="col-2">Marca</th>
						<th>Modelo</th>
						<th>Qtd.</th>
						<th>Preço unitário</th>
						<th>Preço total</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td class="tabela-texto">Carro Sedan</td>
						<td class="tabela-texto">Hyundai</td>
						<td class="tabela-texto">HB20s</td>
						<td class="tabela-texto">100</td>
						<td class="tabela-texto">R$ 234,00</td>
						<td class="tabela-texto">R$ 23400,00</td>
					</tr>

					<tr>
						<td class="tabela-texto">Carro Sedan</td>
						<td class="tabela-texto">Hyundai</td>
						<td class="tabela-texto">HB20s</td>
						<td class="tabela-texto">100</td>
						<td class="tabela-texto">R$ 234,00</td>
						<td class="tabela-texto">R$ 23400,00</td>
					</tr>
				</tbody>
			</table>

		</div>

	</div>

	<div class="container-venda">

		<div class="container-venda-titulo">
			<h1 class="venda-titulo p-0 m-0">Venda #43 <span class="venda-status">Concluída</span></h1>

			<p class="venda-texto p-0 m-0">R$ 248.729,47 - Cartão | Crédito</p>
			<p class="venda-texto p-0 m-0">12/10/2024</p>
			<a>
				<ion-icon name="ellipsis-horizontal-sharp" class="ellipsis-icon"></ion-icon>
			</a>
		</div>


		<div class="container-venda-itens rounded">
			<table class="table rounded overflow-hidden table-borderless">
				<thead class="border-1 border-top-0 border-end-0 border-start-0 border-dark-subtle">
					<tr>
						<th class="col-3">Item</th>
						<th class="col-2">Marca</th>
						<th>Modelo</th>
						<th>Qtd.</th>
						<th>Preço unitário</th>
						<th>Preço total</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td class="tabela-texto">Carro Sedan</td>
						<td class="tabela-texto">Hyundai</td>
						<td class="tabela-texto">HB20s</td>
						<td class="tabela-texto">100</td>
						<td class="tabela-texto">R$ 234,00</td>
						<td class="tabela-texto">R$ 23400,00</td>
					</tr>

					<tr>
						<td class="tabela-texto">Carro Sedan</td>
						<td class="tabela-texto">Hyundai</td>
						<td class="tabela-texto">HB20s</td>
						<td class="tabela-texto">100</td>
						<td class="tabela-texto">R$ 234,00</td>
						<td class="tabela-texto">R$ 23400,00</td>
					</tr>
				</tbody>
			</table>

		</div>

	</div>

</section>