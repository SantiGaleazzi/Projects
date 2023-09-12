// Uncache
module.exports = function ( src, dest, wpRev ) {

  return function ( callback ) {
    
    src( './functions.php' )
      .pipe(wpRev({
        css: './assets/css/app.css',
        cssHandle: 'custom-style',
        js: './assets/js/app.min.js',
        jsHandle: 'custom-js'
      }))
      .pipe( dest( './' ) );
    
    callback();

  };

};
