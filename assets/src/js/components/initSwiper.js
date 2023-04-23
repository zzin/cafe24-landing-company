import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';
Swiper.use([Navigation, Pagination, Autoplay]);
const InitSwiper = () => {
	const makeTestimonial = (target) => {
		const swiper = new Swiper(target, {
			direction: 'horizontal',
			loop: true,
			slidesPerView: 1,
			centeredSlides: true,
			spaceBetween: 20,
			autoplay: {
				delay: 5000,
			},
			pagination: {
				el: '.swiper-pagination',
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			breakpoints: {
				768: {
					slidesPerView: 2,
				},
				1024: {
					slidesPerView: 3,
				},
			},
		});
	};
	document.addEventListener('DOMContentLoaded', () => {
		const component = document.querySelector(
			'[data-component="swiper-testimonial"]'
		);
		new makeTestimonial(component);
	});
};

export default InitSwiper;
