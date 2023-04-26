import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/all';
gsap.registerPlugin(ScrollTrigger);

const InitAnimation = () => {
	const resize = () => {
		console.log('resize');
	};
	const fadeUp = (el) => {
		const title = el.querySelector('.title');
		const desc = el.querySelector('.description');
		// if (title.dataset.delay) {
		// 	title.style.transitionDelay = title.dataset.delay;
		// }
		// if (desc.dataset.delay) {
		// 	desc.style.transitionDelay = desc.dataset.delay;
		// }
		// ScrollTrigger.create({
		// 	trigger: el,
		// 	start: 'top 90%',
		// 	end: '+=2000',
		// 	toggleActions: 'play none none none',
		// 	toggleClass: { targets: title, className: title.dataset.class },
		// 	markers: true,
		// });
		// ScrollTrigger.create({
		// 	trigger: el,
		// 	start: 'top 90%',
		// 	// end: 'bottom top',
		// 	toggleActions: 'play none none none',
		// 	toggleClass: { targets: desc, className: desc.dataset.class },
		// });

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: el,
				start: 'top 90%',
				end: 'bottom top',
				//  onEnter, onLeave, onEnterBack,onLeaveBack
				toggleActions: 'play pause resume reset',
				// toggleClass: 'fade-up',
				// markers: true,
				// invalidateOnRefresh: true,
			},
		});
		tl.addLabel('title')
			.from(title, {
				yPercent: 100,
				autoAlpha: 0,
				duration: 0.85,
				ease: 'power1.out',
			})
			.addLabel('desc')
			.from(
				desc,
				{
					yPercent: 100,
					autoAlpha: 0,
					duration: 0.75,
					ease: 'power1.out',
				},
				'<50%'
			);

		const scrollRefresh = () => {
			ScrollTrigger.refresh();
		};
		setTimeout(() => {
			scrollRefresh();
		}, 2000);

		function debounce(func) {
			let timer;
			return function (event) {
				if (timer) clearTimeout(timer);
				timer = setTimeout(
					() => {
						func();
					},
					2000,
					event
				);
			};
		}
		window.addEventListener('resize', debounce(scrollRefresh));
	};
	const titleWraps = gsap.utils.toArray('.title--wrap');
	// const titles = gsap.utils.toArray('.title--wrap .title');
	// const descriptions = gsap.utils.toArray('.title--wrap .description');
	// console.log(titles, descriptions);
	Array.from(titleWraps).forEach((el) => {
		fadeUp(el);
	});
};
export default InitAnimation;
