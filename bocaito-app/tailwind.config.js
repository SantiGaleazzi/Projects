module.exports = {
	content: ['./pages/**/*.{js,jsx}', './components/**/*.{js,jsx}', './layouts/**/*.{js,jsx}'],
	darkMode: 'class',
	theme: {
		extend: {
			container: {
				center: true,
			},
			fontFamily: {
				sans: ['Inter', 'sans-serif'],
				jakarta: ['PlusJakartaSans', 'sans-serif'],
			},
			colors: {
				accent: '#0560fd',
				black: '#1a1d1f',
			},
		},
	},
	plugins: [],
}
