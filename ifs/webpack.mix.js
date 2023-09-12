const mix = require('laravel-mix');

mix.setPublicPath('./')
    .js('src/js/charts.js', 'assets/js/charts.js')
    .version();