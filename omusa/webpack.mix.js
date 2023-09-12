const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')
require('laravel-mix-polyfill')
require('laravel-mix-purgecss')

const homedir = require('os').homedir()
const { tld } = require(homedir + '/.config/valet/config.json')
const siteName = require('path').resolve(__dirname, '../../../').split('/').pop()
const domain = siteName + '.' + tld

mix
	.setPublicPath('./')
	.js('resources/js/app.js', 'assets/js')
	.sass('resources/sass/app.sass', 'assets/css')
	.polyfill({
		enabled: true,
		useBuiltIns: 'usage',
		targets: 'defaults',
	})
	.options({
		processCssUrls: false,
		postCss: [tailwindcss('./tailwind.config.js')],
		autoprefixer: { remove: false },
		cssNano: { discardComments: true },
	})
	.purgeCss({
		enabled: mix.inProduction(),
		content: ['**/*.php', 'resources/**/*.{js,sass}'],
	})
	.browserSync({
		open: 'external',
		host: domain,
		proxy: 'https://' + domain,
		https: {
			key: homedir + '/.config/valet/Certificates/' + domain + '.key',
			cert: homedir + '/.config/valet/Certificates/' + domain + '.crt',
		},
		files: ['**/*.{php,js,sass}'],
	})
	.disableSuccessNotifications()
	.version()
