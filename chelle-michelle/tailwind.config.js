// const { colors } = require('tailwindcss/colors')

// Webpack has a problem when we provide wildcards in the root directory so please add all files you want to track in the content
module.exports = {
	content: [
		'./404.php',
		'./page.php',
		'./inc/*.php',
		'./index.php',
		'./header.php',
		'./single.php',
		'./footer.php',
		'./archive.php',
		'./front-page.php',
		'./partials/**/*.php',
		'./functions/*.php',
		'./templates/**/*.php',
		'./resources/**/*.{js,sass}',
		'./page-contact.php',
		'./archive-portfolio.php',
		'./single-portfolio.php',
		'./taxonomy-work-type.php',
	],
	darkMode: 'class',
	theme: {
		extend: {
			container: {
				center: true,
			},
			fontFamily: {
				sans: ['Inter', 'sans-serif'],
			},
			spacing: {
				100: '28rem',
				full: '100%',
			},
		},
	},
	plugins: [],
}
