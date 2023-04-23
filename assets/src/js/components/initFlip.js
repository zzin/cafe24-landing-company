import gsap from 'gsap';
import { Flip } from 'gsap/all';
gsap.registerPlugin(Flip);
const InitFlip = () => {
	const items = gsap.utils.toArray('.portfolio--wrap .item'),
		details = document.querySelector('.detail'),
		detailContent = details.querySelector('.content'),
		detailImage = details.querySelector('img'),
		detailTitle = details.querySelector('.title'),
		detailSecondary = details.querySelector('.secondary'),
		detailDescription = details.querySelector('.description');
	let activeItem;
	gsap.set(detailContent, { yPercent: -100 });

	const showDetails = (item) => {
		if (activeItem) {
			return hideDetails();
		}
		const onLoad = () => {
			Flip.fit(details, item, { scale: true, fitChild: detailImage });
			const state = Flip.getState(details);

			gsap.set(details, { clearProps: true });
			gsap.set(details, {
				xPercent: -50,
				top: '50%',
				yPercent: -50,
				visibility: 'visible',
				overflow: 'hidden',
			});
			Flip.from(state, {
				duration: 0.5,
				ease: 'power2.inOut',
				scale: true,
				onComplete: () => gsap.set(details, { overflow: 'auto' }),
			}).to(detailContent, { yPercent: 0 }, 0.2);
			detailImage.removeEventListener('load', onLoad);
			document.addEventListener('click', hideDetails);
		};

		console.log(item);
		const data = item.dataset;
		detailImage.addEventListener('load', onLoad);
		detailImage.src = item.querySelector('img').src;
		detailTitle.innerText = data.title;
		detailSecondary.innerText = data.secondary;
		detailDescription.innerText = data.description;

		gsap
			.to(items, {
				opacity: 0.3,
				stagger: { amout: 0.7, from: items.indexOf(item), grid: 'auto' },
			})
			.kill(item);
		gsap.to('.portfolio', { backgroundColor: '#f00', duration: 1, delay: 0.3 });
		activeItem = item;
	};
	const hideDetails = () => {
		document.removeEventListener('click', hideDetails);
		gsap.set(details, { overflow: 'hidden' });

		const state = Flip.getState(details);
		Flip.fit(details, activeItem, { scale: true, fitChild: detailImage });

		const tl = gsap.timeline();
		tl.set(details, { overflow: 'hidden' })
			.to(detailContent, { yPercent: -100 })
			.to(items, {
				opacity: 1,
				stagger: { amount: 0.7, from: items.indexOf(activeItem), grid: 'auto' },
			})
			.to('.portfolio', { backgroundColor: '#00F' }, '<');
		Flip.from(state, {
			scale: true,
			duration: 0.5,
			delay: 0.2,
			onInterrupt: () => tl.kill(),
		}).set(details, { visibility: 'hidden' });
		activeItem = null;
	};
	gsap.utils
		.toArray('.item')
		.forEach((item) => item.addEventListener('click', () => showDetails(item)));
};
export default InitFlip;
