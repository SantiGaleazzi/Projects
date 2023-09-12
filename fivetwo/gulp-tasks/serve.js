// Browsersync
module.exports = function ( watch, serve, series ) {
  
  return function ( callback ) {
    
    serve.init( { proxy: 'http://fivetwo-pantheon.test/' } );

    watch( './src/js/**/*.js', series( 'js' ) );
    watch( './src/scss/**/*.scss', series( 'styles' ) );
    watch( './**/*.php' ).on( 'change', serve.reload );

    callback();

  };
  
};
