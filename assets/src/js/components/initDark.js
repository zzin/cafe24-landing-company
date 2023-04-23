const InitDark = () => {
	const checkbox = document.getElementById('toggleTheme');
	const html = document.querySelector('html');
	if (
		localStorage.getItem('theme') === 'dark' ||
		(!('theme' in localStorage) &&
			window.matchMedia('(prefers-color-scheme: dark)').matches)
	) {
		checkbox.checked = true;
	} else {
		checkbox.checked = false;
	}
	const toggleMode = document.querySelector('.toggle-mode');
	setTimeout(() => {
		toggleMode.classList.remove('opacity-0');
	}, 700);

	const toggleDarkMode = (event) => {
		event.stopPropagation();
		if (checkbox.checked) {
			html.classList.add('dark');
			localStorage.theme = 'dark';
		} else {
			html.classList.remove('dark');
			localStorage.theme = 'light';
		}
	};
	checkbox.addEventListener('click', toggleDarkMode);
};

export default InitDark;
