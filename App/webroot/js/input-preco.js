const inputsPreco = document.querySelectorAll(".input-preco");

inputsPreco.forEach((input) => {
	input.addEventListener('input', () => {
		let value = input.value;

		value = value.replace(/[^0-9.,]/g, '');

		// Impedir ponto após a vírgula
		if (/,.*\./.test(value)) {
			value = value.replace(/\./g, '');
		}

		// Impedir ponto antes da vírgula
		value = value.replace(/\.,/g, '');

		// Impedir ponto ou vírgula no início
		if (/^[.,]/.test(value)) {
			value = value.substring(1);
		}

		// Limitar a dois dígitos após a vírgula
		if (/,(\d{3,})/.test(value)) {
			value = value.replace(/,(\d{2})\d+/, ',$1');
		}

		// Impedir dois pontos ou duas vírgulas consecutivas
		value = value.replace(/\.{2,}/g, '.');
		value = value.replace(/,{2,}/g, ',');

		// Pontos somente a cada três números
		const parts = value.split(',');
		if (parts[0]) {
			parts[0] = parts[0].replace(/\./g, '');
			parts[0] = parts[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
		}

		value = parts.join(',');

		input.value = value;
	});
});