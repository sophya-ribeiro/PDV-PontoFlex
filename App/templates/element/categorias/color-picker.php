<?php
if (isset($inputPrefix)) {
	$inputPrefix .= '-';
} else {
	$inputPrefix = '';
}

$cores = [
	"#dd4baf",
	"#bd4bdd",
	"#774bdd",
	"#3e4cd2",
	"#3e80d2",
	"#218a99",
	"#1a9f49",
	"#899a16",
	"#c96516",
	"#db351b",
];
?>

<div class="w-100 d-flex justify-content-between">
	<?php foreach ($cores as $index => $cor): ?>
		<input
			data-<?= $inputPrefix ?>radio-cor="<?= $cor ?>"
			<?= $index === 0 ? 'required' : '' ?>
			type="radio"
			name="cor"
			id="<?= $inputPrefix ?>color<?= $index + 1 ?>"
			class="color-picker-input"
			value="<?= $cor ?>">
		<label
			data-<?= $inputPrefix ?>radio-label-cor="<?= $cor ?>"
			for="<?= $inputPrefix ?>color<?= $index + 1 ?>"
			class="color-picker-label"
			style="background-color: <?= $cor ?>;"></label>
	<?php endforeach; ?>
</div>