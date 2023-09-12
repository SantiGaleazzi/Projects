const { colors } = require('tailwindcss/defaultTheme')

module.exports = {
  purge: false,
  theme: {
    extend: {
      container: {
        center: true
      },
    	fontFamily: {
        'pt-serif' : ['PT Serif', 'serif'],
        'roboto' : ['Roboto', 'sans-serif'],
	      'roboto-condensed' : ['Roboto Condensed', 'sans-serif'],
      },
      colors: {
          'nav' : '#191919',
          'gold' : '#9a733d',
          'gold-light' : '#b9975b',
      		yellow: {
	          '300' : '#daa04e',
	          '400' : '#9a733d',
            '500' : '#ac8951'
	        },
      		blue: {
	          '300' : '#79a5ba',
	          '800' : '#111111'
	        },
          gray: {
            '300' : '#999999',
            '400' : '#4e4e4e',
            '450' : '#353535',
            '600' : '#646464',
            '800' : '#222222',
            '850' : '#323232',
            '900' : '#111111'
          },
          red: {
            '500' : '#c30813'
          }
      },
      fontSize: {
      		'1xxl' : '1.3125rem',
	        '2xxl' : '1.75rem',
          '3xxl' : '3rem',
          '4xxl' : '3.25rem',
          '5xxl' : '3.5rem',
          '5xxxl': '3.75rem',
          '7xl'  : '7.5rem'
	    },
      padding: {
          '7' : '1.3rem',
          '14' : '3.75rem',
      },
      screens: {
        'xxl' : '1395px'
      },
      maxWidth: {
        '45' : '45.5rem',
      },
      flexGrow: {
        '2' : '2',
        '3' : '3'
      },
      translate : {
        '200' : '200%'
      }
    }
  },
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    translate: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    borderRadius: ['responsive', 'hover', 'focus', 'group-hover'],
    borderColor: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    flexGrow: ['responsive', 'hover', 'focus'],
    opacity: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    visibility: ['responsive', 'hover', 'focus', 'group-hover'],
    scale: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    backgroundPosition: ['responsive', 'hover', 'focus', 'group-hover'],
  },
  plugins: []
}
