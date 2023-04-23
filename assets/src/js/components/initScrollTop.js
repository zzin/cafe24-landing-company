import { gsap } from 'gsap';

const InitScrollTop = () => {
	const scrollTop = document.getElementById('scroll-top');
	scrollTop.addEventListener('click', () => {
		gsap.to(window, {
			duration: 0.8,
			scrollTo: {
				y: 0,
			},
			ease: 'power3.out',
		});
	});
};
export default InitScrollTop;
