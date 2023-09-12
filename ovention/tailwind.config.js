/** @type {import('tailwindcss').Config} */

module.exports = {
	prefix: 'tw-',
	content: [
		'./404.php',
		'./header.php',
		'./search.php',
		'./footer.php',
		'./blocks/*.php',
		'./category.php',
		'./archive.php',
		'./archive-oven.php',
		'./archive-videos.php',
		'./partials/**/*.php',
		'./single.php',
		'./single-oven.php',
		'./functions/*.php',
		'./templates/**/*.php',
		'./taxonomy-category-videos.php',
		'./page-customer-care.php',
		'./page-my-quiz-results.php',
		'/.page-warranty-information-registration.php',
		'./src/**/*.{js,sass,scss}',
	],
	theme: {
		extend: {
			container: {
				center: true,
			},
			fontFamily: {
				sans: ['Montserrat', 'sans-serif'],
			},
			colors: {
				hatco: '#C02732',
				beige: {
					400: '#CFCEC9',
					500: '#D5D4CF',
				},
				orange: {
					400: '#FBAE43',
					500: '#FF8A2C',
					600: '#FF8A2C',
					900: '#DA6339',
				},
				gray: {
					100: '#F4F4F4',
					800: '#3F4449',
					900: '#404041',
				},
			},
		},
	},
	plugins: [],
	corePlugins: {
		preflight: true,
	},
}
