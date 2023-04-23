import gsap from 'gsap';

const body = document.getElementsByTagName('body')[0];
const siteNavigation = document.getElementById('site-navigation');

const InitNavigation = () => {
	if (!siteNavigation) {
		return;
	}

	const button = siteNavigation.getElementsByTagName('button')[0];

	// Return early if the button doesn't exist.
	if ('undefined' === typeof button) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName('ul')[0];

	// Hide menu toggle button if menu is empty and return early.
	if ('undefined' === typeof menu) {
		button.style.display = 'none';
		return;
	}

	if (!menu.classList.contains('nav-menu')) {
		menu.classList.add('nav-menu');
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	const menuPrimaryContainer = document.querySelector(
		'.menu-primary-container'
	);
	button.addEventListener('click', function () {
		if (document.documentElement.classList.contains('size-mobile')) {
			siteNavigation.classList.toggle('toggled');

			if (button.getAttribute('aria-expanded') === 'true') {
				button.setAttribute('aria-expanded', 'false');
				body.classList.remove('is-mobile-menu');
				// out
				gsap.to(menuPrimaryContainer, {
					duration: 0.4,
					top: '110vh',
					ease: 'power2.inOut',
				});
			} else {
				button.setAttribute('aria-expanded', 'true');
				body.classList.add('is-mobile-menu');
				// in
				gsap.to(menuPrimaryContainer, {
					duration: 0.4,
					top: 0,
					ease: 'power2.inOut',
				});
			}
		}
	});

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener('click', function (event) {
		const isClickInside = siteNavigation.contains(event.target);
		if (!isClickInside) {
			siteNavigation.classList.remove('toggled');
			button.setAttribute('aria-expanded', 'false');
			body.classList.remove('is-mobile-menu');
		}
	});

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName('a');

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll(
		'.menu-item-has-children > a, .page_item_has_children > a'
	);
	// console.log(linksWithChildren);

	// Toggle focus each time a menu link is focused or blurred.
	for (const link of links) {
		link.addEventListener('focus', toggleFocus, true);
		link.addEventListener('blur', toggleFocus, true);
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if (event.type === 'focus' || event.type === 'blur') {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (!self.classList.contains('nav-menu')) {
				// On li elements toggle the class .focus.
				if ('li' === self.tagName.toLowerCase()) {
					self.classList.toggle('focus');
				}
				self = self.parentNode;
			}
		}

		if (event.type === 'touchstart') {
			const menuItem = this.parentNode;
			event.preventDefault();
			for (const link of menuItem.parentNode.children) {
				if (menuItem !== link) {
					link.classList.remove('focus');
				}
			}
			menuItem.classList.toggle('focus');
		}
	}
};
export default InitNavigation;
