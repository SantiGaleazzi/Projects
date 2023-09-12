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
	],
	theme: {
		extend: {
			container: {
				center: true,
				screens: {
					sm: '640px',
					md: '768px',
					lg: '1024px',
				},
			},
			fontFamily: {
				inter: ['Inter', 'sans-serif'],
				helvetica: ['Helvetica', 'sans-serif'],
				'helvetica-neue': ['HelveticaNeueLTStd', 'sans-serif'],
			},
			fontSize: {
				42: '2.625rem',
			},
			colors: {
				blue: {
					500: '#003c5b',
					900: '#00293e',
				},
				red: {
					500: '#ce202f',
				},
				gold: {
					500: '#f3b120',
				},
				gray: {
					100: '#e6e6e6',
					200: '#b5b5b5',
					500: '#919191',
					900: '#555555',
				},
				turquoise: {
					500: '#00b4b4',
				},
				denim: {
					500: '#40a3d0',
				},
				orange: {
					500: '#fc9b18',
				},
				midnight: {
					500: '#1b002a',
				},
			},
			backgroundImage: {
				'topograph-pattern': "url('../images/Topograph-slice-60.svg')",
				'topograph-pattern-normal': "url('../images/Topograph-slice.svg')",
			},
		},
	},
	plugins: [require('@tailwindcss/line-clamp')],
}
