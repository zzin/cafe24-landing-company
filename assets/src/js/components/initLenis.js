import Lenis from '@studio-freight/lenis';

const InitLenis = () => {
	const lenis = new Lenis({
		duration: 1.2,
		easing: (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t)),
		smoothTouch: false,
		touchMultiplier: 2,
	});
	function raf(time) {
		lenis.raf(time);
		requestAnimationFrame(raf);
	}
	requestAnimationFrame(raf);
};
export default InitLenis;
