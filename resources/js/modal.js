document.addEventListener('DOMContentLoaded', function () {
	const modal = document.getElementById('modal-create-product');
	const openModalButtons = document.querySelectorAll('[data-modal-open]');
	const closeModalButtons = document.querySelectorAll('[data-modal-dismiss]');

	openModalButtons.forEach(button => {
		 button.addEventListener('click', () => {
			  modal.classList.remove('hidden');
		 });
	});

	closeModalButtons.forEach(button => {
		 button.addEventListener('click', () => {
			  modal.classList.add('hidden');
		 });
	});
});