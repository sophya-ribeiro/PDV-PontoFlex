function openModalWithHash() {
	const hash = window.location.hash;

	if (!window.location.hash.startsWith("#modal")) {
		return;
	}

	if (!document.querySelector(hash)) {
		return;
	}

	const bsModal = new bootstrap.Modal(hash);

	bsModal.show();
}

function hideToasts() {
	const toasts = document.querySelectorAll(".toast");

	toasts.forEach((toast) => {
		const bsToast = new bootstrap.Toast(toast);

		setTimeout(() => {
			bsToast.hide();
		}, 5000);
	});
}

function verificarSubmissaoDeFormularios() {
	const forms = document.querySelectorAll("form");

	forms.forEach((form) => {
		form.addEventListener("submit", () => {
			document.querySelector("#loading-geral").classList.remove("d-none");
			document.querySelector("#loading-geral").classList.add("d-flex");
		});
	});
}

function brlStringToFloat(brlString) {
	return parseFloat(brlString.replace("R$", "").trim().replaceAll(".", "").replace(",", "."));
}

function floatToBrlString(numeroFloat) {
	numeroFloat = parseFloat(numeroFloat);

	return parseFloat(numeroFloat).toLocaleString("pt-br", {
		style: "currency",
		currency: "BRL",
		minimumIntegerDigits: 2,
	});
}

window.onload = () => {
	openModalWithHash();

	hideToasts();
	verificarSubmissaoDeFormularios();
};
