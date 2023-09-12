const { colors } = require('tailwindcss/defaultTheme')

module.exports = {
	purge: false,
	theme: {
		extend: {
			container: {
				center: true,
			},
			fontFamily: {
				lato: ['Lato', 'sans-serif'],
				roboto: ['Roboto\\ Slab', 'serif'],
			},
			colors: {
				default: 'var(--color-default-color)',
				'default-reverse': 'var(--color-default-color-reverse)',
				'muted-light': 'var(--color-muted-light)',
				muted: 'var(--color-muted)',
				'muted-dark': 'var(--color-muted-dark)',
				footer: 'var(--color-footer)',
				page: 'var(--bg-page)',
				submenu: 'var(--bg-header-submenu)',
				separator: 'var(--separator)',
				'separator-reversed': 'var(--separator-reversed)',
				'menu-heading': 'var(--menu-heading-title)',
				'menu-subheading': 'var(--menu-subheading-title)',
				'nav-item': 'var(--bg-nav-item)',
				'submenu-menu': 'var(--bg-header-submenu-menu)',
				data: 'var(--data-background-color)',
				card: 'var(--bg-card)',
				wysiwyg: 'var(--wysiywg-text-in-gray)',
				fade: 'var(--bg-fade)',
				teal: {
					...colors.teal,
					500: '#2ad2c9',
				},
				white: {
					pure: '#ffffff',
					'50-new': 'var(--background-light)',
					'100-new': 'var(--background-color)',
					'200-new': '#FFFFFF',
					'300-new': '#c9c9c9',
				},
				gray: {
					...colors.gray,
					'50-new': '#ededed',
					'100-new': '#d3d3d3',
					'150-new': 'var(--background-accent)',
					150: '#5e5e5e',
					'200-new': '#d1d1d1',
					'250-new': '#efefef',
					200: '#efefef',
					400: '#acacac',
					'400-new': '#acacac',
					500: '#707371',
					'500-new': 'var(--color-preelement-color)',
					'600-new': 'var(--color-intro-color)',
					'700-new': 'var(--color-headline-color)',
					'800-new': '#3e3e3e',
					'900-new': 'var(--secondary-background-color)',
				},
				red: {
					...colors.red,
					'200-new': '#d22630',
					'400-new': '#cf252f',
					500: '#d22630',
					'600-new': '#d4282e',
					'700-new': 'var(--color-accent-color)',
				},
				black: {
					...colors.black,
					'400-new': 'var(--color-container-color)',
					'500-new': 'var(--container-background-color)',
					'600-new': 'var(--color-bold-color)',
					'700-new': '#000000',
				},
				orange: {
					...colors.orange,
					500: '#f29400',
					'500-new': '#f29400',
				},
				green: {
					500: '#7ab51d',
				},
				teal: {
					500: '#2ad2c9',
				},
			},
			fontSize: {
				'xxs': '0.8125rem', 
				'8xl': '6rem', 
			},
			inset: {
				2: '0.5rem',
				4: '1rem',
			},
			spacing: {
				7: '1.75rem',
				9: '2.25rem',
				14: '3.5rem',
				18: '4.5rem',
				36: '9rem',
				72: '18rem',
			},
			borderWidth: {
				20: '20px',
			},
			boxShadow: {
				big: '0px 0px 15px 3px rgba(0,0,0,0.12)',
			},
		},
	},
	variants: {
		margin: ['responsive', 'last', 'hover', 'focus'],
	},
	plugins: [],
}
