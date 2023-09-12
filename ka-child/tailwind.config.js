// const { colors } = require('tailwindcss/colors')

// Webpack has a problem when we provide wildcards in the root directory so please add all files you want to track in the content
module.exports = {
	prefix: 'tw-',
	content: [
		'./404.php',
		'./header.php',
		'./footer.php',
		'./functions.php',
		'./single-country.php',
		'./taxonomy-region.php',
		'./partials/**/*.php',
		'./templates/**/*.php',
		'./resources/**/*.{js,sass}',
	],
	theme: {
		extend: {
			container: {
				center: true,
			},
			fontFamily: {
				sans: ['Noto\\ Sans', 'sans-serif'],
			},
			fontSize: {
				12: '0.75rem',
				42: '2.625rem',
			},
			colors: {
				default: '#404040',
				beige: {
					100: '#EEEDE8',
					200: '#EDE8D5',
					500: '#DEDBD2',
					800: '#EEEDE8',
				},
				blue: {
					500: '#4F6579',
					800: '#4C657B',
					900: '#435464',
				},
				orange: {
					500: '#DF7D38',
					800: '#E87722',
				},
				gray: {
					100: '#9CA4AD',
				},
				green: {
					500: '#78BE20',
				},
			},
		},
	},
	plugins: [],
}
