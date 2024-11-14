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

window.onload = () => {
	openModalWithHash();

	hideToasts();
}
