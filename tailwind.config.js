/** @type {import('tailwindcss').Config} */
module.exports = {
	darkMode: 'class',
	content: [
		'./*.{php,scss,js}',
		'./assets/**/*.{php,scss,js}',
		'./inc/**/*.{php,scss,js}',
		'./template-parts/**/*.{php,scss,js}',
	],
	theme: {
		fontFamily: {
			sans: ['Pretendard', 'ui-sans-serif'],
		},
		extend: {
			colors: {
				primary: '#b50b2d',
				siteGray: '#F6F6F8',
				siteFont: '#4F4F4F',
			},
		},
	},
	plugins: [require('@tailwindcss/forms')],
};
