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
		'./single-coursenote.php',
		'./single-sfwd-courses.php',
		'./single-sfwd-topic.php',
		'./single-sfwd-quiz.php',
		'./footer.php',
		'./archive.php',
		'./archive-coaches.php',
		'./archive-students.php',
		'./template-fonts-testing.php',
		'./front-page.php',
		'./partials/**/*.php',
		'./functions/*.php',
		'./templates/**/*.php',
		'./page-login.php',
		'./page-get-help.php',
		'./page-facilitator-get-help.php',
		'./page-my-notes.php',
		'./page-group-management.php',
		'./resources/**/*.{js,sass}',
	],
	theme: {
		extend: {
			container: {
				center: true,
			},
			fontFamily: {
				'noto-sans-cond': ['NotoSansCondensend', 'sans-serif'],
				'noto-cond-bold': ['NotoSansCondensendBold', 'sans-serif'],
				'noto-cond-bold-italic': ['NotoSansCondensendItalic', 'sans-serif'],
				'noto-extra-cond-bold': ['NotoExtraCondensendBold', 'sans-serif'],
				'noto-sans-regular': ['NotoSansRegular', 'sans-serif'],
				'noto-sans-medium': ['NotoSansMedium', 'sans-serif'],
				'noto-sans-bold': ['NotoSansBold', 'sans-serif'],
				'noto-extra-cond-black-italic': ['NotoExtraCondBlackItalic', 'sans-serif'],
				'lodrina-black': ['LodrinaSolidBlack', 'sans-serif'],
				'helvetica-neue': ['HelveticaNeue', 'sans-serif'],
				'helvetica-neue-bold': ['HelveticaNeueBold', 'sans-serif'],
			},
			fontSize: {
				xxs: '0.6875rem',
				'2xbase': '1.0625rem',
				'2xxl': '1.3125rem',
				'3xxl': '2rem',
				'4xxl': '2.75rem',
				'6xxl': '4rem',
				'7xxl': '5.25rem',
			},
			colors: {
				blue: {
					300: '#80A5D4',
					400: '#4387C3',
					500: '#194C75',
					600: '#214C72',
					700: '#4c87be',
				},
				teal: {
					100: '#9ad2d9',
					300: '#90d4da',
					400: '#53C3CD',
					600: '#1C7A80',
				},
				purple: {
					400: '#512462',
					500: '#4C295F',
					800: '#291332',
				},
				yellow: {
					50: '#fcc86d',
					100: '#FCF7E6',
					150: '#FDF7E4',
					200: '#fdf5da',
					500: '#FAB216',
					700: '#ab7400',
				},
				gray: {
					100: '#e6e6e6',
					200: '#999999',
					250: '#f8f8f8',
					300: '#cccccc',
					350: '#cec9bb',
					400: '#b3b3b3',
					500: '#4d4d4d',
					700: '#1a1a1a',
				},
				orange: {
					300: '#f4896a',
					500: '#ee5235',
				},
				red: {
					500: '#FA1616',
				},
				lms: {
					tangerine: {
						300: '#F4896A',
						500: '#EE5235',
						700: '#9C280F',
					},
					mustard: {
						100: '#FDF7E4',
						300: '#FCC86D',
						500: '#FAB216',
						700: '#AB7400',
					},
					gummy: {
						300: '#90D4DA',
						500: '#53C3CD',
						700: '#1C7A80',
					},
					blueberry: {
						300: '#80A5D4',
						500: '#4387C3',
						700: '#194C75',
					},
					eggplant: {
						300: '#7B5C84',
						500: '#512462',
						700: '#291332',
					},
				},
			},
		},
	},
	plugins: [],
}
