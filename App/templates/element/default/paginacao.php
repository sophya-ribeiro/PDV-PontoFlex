<?php
if (!isset($parametrosPaginacao)) return;

if (!isset($queryParams)) {
	$queryParams = [];
}
?>

<nav aria-label="Navegação de página">
	<ul class="pagination justify-content-center">
		<li class="page-item <?= $parametrosPaginacao['hasPrevPage'] ? '' : 'disabled' ?>">
			<a class="page-link"
				href="<?= $this->Url->build(['?' => ['page' => $parametrosPaginacao['currentPage'] - 1] + $queryParams]) ?>"
				tabindex="<?= $parametrosPaginacao['hasPrevPage'] ? 0 : -1 ?>">
				Anterior
			</a>
		</li>

		<?php for ($i = 1; $i <= $parametrosPaginacao['pageCount']; $i++) : ?>
			<li class="page-item <?= $parametrosPaginacao['currentPage'] == $i ? 'active' : '' ?>"><a class="page-link" href="<?= $this->Url->build(['?' => ['page' => $i] + $queryParams]) ?>"><?= $i ?></a></li>
		<?php endfor; ?>

		<li class="page-item <?= $parametrosPaginacao['hasNextPage'] ? '' : 'disabled' ?>">
			<a class="page-link"
				href="<?= $this->Url->build(['?' => ['page' => $parametrosPaginacao['currentPage'] + 1] + $queryParams]) ?>"
				tabindex="<?= $parametrosPaginacao['hasNextPage'] ? 0 : -1 ?>">
				Próximo
			</a>
		</li>
	</ul>
</nav>