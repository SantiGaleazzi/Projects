'use strict'

// Environment and Configuration files
const env = process.env.NODE_ENV || 'dev'
const configJS = require('./config-js.json')
const configPartials = require('./config-partials.json')
const configSCSS = require('./config-sass.json')

// Gulp Dependencies
const gulpif = require('gulp-if')
const cssnano = require('cssnano')
const babel = require('gulp-babel')
const wpRev = require('gulp-wp-rev')
const uglify = require('gulp-uglify')
const concat = require('gulp-concat')
const postcss = require('gulp-postcss')
const sourcemaps = require('gulp-sourcemaps')
const sass = require('gulp-sass')(require('sass'))
const purgecss = require('@fullhuman/postcss-purgecss')
const { src, dest, task, series, watch } = require('gulp')

// Additional Plugins
const browsersync = require('browser-sync').create()

// Tasks
task('fonts', require('./gulp-tasks/fonts')(src, dest))
task('uncache', require('./gulp-tasks/un-cache')(src, dest, wpRev))
task('serve', require('./gulp-tasks/serve')(watch, browsersync, series))
task('js', require('./gulp-tasks/scripts')(src, dest, gulpif, babel, concat, uglify, configJS, env, browsersync))
task('partials', require('./gulp-tasks/partials')(src, dest, gulpif, babel, uglify, configPartials, env, browsersync))
task(
	'styles',
	require('./gulp-tasks/sass')(
		src,
		dest,
		sass,
		gulpif,
		sourcemaps,
		configSCSS,
		postcss,
		purgecss,
		cssnano,
		env,
		browsersync
	)
)

// Development Main Task Runner
task('default', series('styles', 'js', 'partials', 'fonts', 'serve'))

// Production Main Task Runner
task('production', series('styles', 'js', 'partials', 'uncache'))
