// Uncache
module.exports = function (src, dest, wpRev) {
	return function (callback) {
		src('./functions/enqueue-files.php')
			.pipe(
				wpRev({
					css: './assets/css/app.css',
					cssHandle: 'custom-style',
					js: './assets/js/app.js',
					jsHandle: 'custom-js',
					js: './assets/js/cases.js',
					jsHandle: 'cases',
					js: './assets/js/push-down.js',
					jsHandle: 'homepage',
					js: './assets/js/work-state.js',
					jsHandle: 'work-state',
					js: './assets/js/research.js',
					jsHandle: 'research',
					js: './assets/js/experts.js',
					jsHandle: 'experts',
					js: './assets/js/taxonomy.js',
					jsHandle: 'taxonomy',
					js: './assets/js/issues.js',
					jsHandle: 'issues',
					js: './assets/js/charts.js',
					jsHandle: 'theme-charts',

				})
			)
			.pipe(dest('./functions'))

		callback()
	}
}
