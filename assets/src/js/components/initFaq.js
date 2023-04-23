const InitFaq = () => {
	const makeMore = (target) => {
		const parentItem = target.closest('.item');
		const answer = parentItem.querySelector('.answer');
		parentItem.style.setProperty(
			'--h',
			parentItem.clientHeight + answer.clientHeight + 'px'
		);
		parentItem.classList.toggle('is-active');
	};
	const faqs = document.querySelectorAll('.faq--ul .btn--more');
	if (faqs) {
		Array.from(faqs).forEach((el) => {
			el.addEventListener('click', (e) => {
				e.preventDefault();
				makeMore(el);
			});
		});
	}
};
export default InitFaq;
