// Javascript

module.exports = function (src, dest, gulpif, babel, uglify, config, env, serve) {
	return function (callback) {
		src(config.scripts)
			.pipe(babel())
			.pipe(gulpif(env === 'production', uglify()))
			.pipe(dest('./assets/js'))
			.pipe(gulpif(env === 'dev', serve.reload({ stream: true })))

		callback()
	}
}
