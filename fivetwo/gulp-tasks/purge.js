module.exports = function ( src, dest, purgecss, sass ) {
    
    return function ( callback ) {

        src( './assets/css/app.css' )
            .pipe(purgecss({
                content: [
                    './*.php',
                    './src/js/**/*.js',
                    './block/**/*.php',
                    './inc/**/*.php',
                    './partials/**/*.php',
                    './functions/**/*.php',
                    './woocommerce/**/*.php',
                    './node_modules/slick-carousel/slick/*.scss',
                    './node_modules/foundation-sites/scss/**/*.scss'
                ],
                fontFace: false,
                keyframes: true,
                variables: true
            }))
            .pipe( sass({ outputStyle: 'compressed' }).on('error', sass.logError) )
            .pipe( dest( './assets/css' ) );
        
        callback();
        
    }
}