// CSS Styling

module.exports = function (
	src,
	dest,
	sass,
	gulpif,
	sourcemaps,
	config,
	postcss,
	purgecss,
	cssnano,
	env,
	serve
) {
	const plugins = [
		cssnano({
			preset: [
				'default',
				{
					discardComments: {
						removeAll: false,
					},
				},
			],
		}),
		...(env === 'production'
			? [
					purgecss({
						content: [
							'./*.php',
							'./src/**/*.js',
							'./**/*.php',
							'./node_modules/slick-carousel/slick/*.scss',
							'./node_modules/foundation-sites/scss/**/*.scss',
							'./node_modules/@fortawesome/fontawesome-free/scss/*.scss',
						],
						defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || [],
						safelist: {
							deep: [/ffz/],
						},
					}),
			  ]
			: []),
	]

	return function (callback) {
		src('./src/scss/app.scss')
			.pipe(gulpif(env === 'dev', sourcemaps.init()))
			.pipe(
				sass({
					includePaths: config.styling,
					outputStyle: gulpif(env === 'dev', 'expanded', 'compressed'),
				}).on('error', sass.logError)
			)
			.pipe(postcss(plugins))
			.pipe(gulpif(env === 'dev', sourcemaps.write()))
			.pipe(dest('./assets/css/'))
			.pipe(gulpif(env === 'dev', serve.reload({ stream: true })))

		callback()
	}
}
