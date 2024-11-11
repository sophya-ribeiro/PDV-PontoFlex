function openModalWithHash(hash) {
	if (!document.querySelector(hash)) {
		return;
	}

	const modal = new bootstrap.Modal(hash);

	modal.show();
}

window.onload = () => {
	if (window.location.hash && window.location.hash.startsWith("#modal")) {
		openModalWithHash(window.location.hash);
	}
}
