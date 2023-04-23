import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/all';
gsap.registerPlugin(ScrollTrigger);

// https://www.youtube.com/watch?v=31Ef-4Didmo&t=92s
// https://scrolling-marquee-gsap.webflow.io/
const InitMarquee = () => {
	const init = () => {
		const marquee = document.querySelector('[data-component="marquee"]');
		if (!marquee) {
			return;
		}
		const duration = parseInt(marquee.getAttribute('duration'), 10) || 5;
		const marqueeContent = marquee.querySelector('*');
		if (!marqueeContent) {
			return;
		}
		const marqueContentClone = marqueeContent.cloneNode(true);
		marquee.append(marqueContentClone);

		let tween;
		const playMarquee = () => {
			const progress = tween ? tween.progress() : 0;
			// tween && tween.progress(0).kill();
			if (tween) {
				tween.progress(0).kill();
			}
			const width = parseInt(
				getComputedStyle(marqueeContent).getPropertyValue('width'),
				10
			);
			const gap = parseInt(
				getComputedStyle(marqueeContent).getPropertyValue('column-gap'),
				10
			);
			const distanceToTranslate = -1 * (gap + width);

			tween = gsap.fromTo(
				marquee.children,
				{ x: 0 },
				{ x: distanceToTranslate, duration, ease: 'none', repeat: -1 }
			);
			tween.progress(progress);
		};
		playMarquee();

		function debounce(func) {
			let timer;
			return function (event) {
				if (timer) clearTimeout(timer);
				timer = setTimeout(
					() => {
						func();
					},
					500,
					event
				);
			};
		}

		window.addEventListener('resize', debounce(playMarquee));
	};

	document.addEventListener('DOMContentLoaded', init);
};
export default InitMarquee;
