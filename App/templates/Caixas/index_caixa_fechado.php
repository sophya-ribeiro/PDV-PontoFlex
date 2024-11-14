<?= $this->Html->css('caixas_caixa_fechado') ?>

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
			<?= $this->Form->create(null, [
				'url' => [
					'controller' => 'Caixas',
					'action' => 'abrirCaixa'
				],
				'type' => 'post'
			]); ?>

			<button type="submit" class="botao-caixa-fechado">Abrir caixa</button>

			<?= $this->Form->end() ?>
		</nav>
	</div>

	<?= $this->element('default/footer'); ?>
</div>

<section class="container-central">
	<div class="div-texto">
		<span class="texto-abertura">Você precisa abrir o seu caixa para registrar uma venda!</span>
	</div>
</section>