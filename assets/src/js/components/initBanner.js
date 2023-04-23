import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/all';
gsap.registerPlugin(ScrollTrigger);

const InitBanner = () => {
	const init = () => {
		const figureBanner = document.querySelector('.figure-banner');
		if (figureBanner) {
			const tl = gsap.timeline();
			tl.to(figureBanner, {
				duration: 2,
				clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)',
				scrollTrigger: {
					trigger: figureBanner,
					start: 'top 90%',
					end: 'top 50%',
					scrub: 1.2,
				},
			});
		}
	};
	document.addEventListener('DOMContentLoaded', () => {
		init();
	});
};
export default InitBanner;
