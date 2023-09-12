const homedir = require('os').homedir()
const { tld } = require(homedir + '/.config/valet/config.json')
const siteName = require('path').resolve(__dirname, '../../../../').split('/').pop()
const domain = siteName + '.' + tld

module.exports = function (watch, serve, series) {
	return function (callback) {
		serve.init({
			open: 'external',
			host: domain,
			proxy: 'https://' + domain,
			https: {
				key: homedir + '/.config/valet/Certificates/' + domain + '.key',
				cert: homedir + '/.config/valet/Certificates/' + domain + '.crt',
			},
			files: ['**/*.{php,js,scss}'],
		})

		watch('./src/js/**/*.js', series('js'))
		watch('./src/jsfilters/**/*.js', series('partials'))
		watch('./src/homepage/**/*.js', series('partials'))
		watch('./src/scss/**/*.scss', series('styles'))
		watch('./**/*.php').on('change', serve.reload)

		callback()
	}
}
