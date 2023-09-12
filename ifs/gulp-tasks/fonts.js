module.exports = function (src, dest) {
	return function (callback) {
		src('./node_modules/@fortawesome/fontawesome-free/webfonts/*').pipe(dest('./assets/fonts'))

		callback()
	}
}
