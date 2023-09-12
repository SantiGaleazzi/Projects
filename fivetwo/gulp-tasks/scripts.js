// Javascript

module.exports = function ( src, dest, gulpif, concat, uglify, config, env, serve ) {

  return function ( callback ) {
    
    src( config.scripts )
      .pipe( concat( 'app.min.js' ) )
      .pipe( gulpif(env === 'production', uglify()) )
      .pipe( dest( './assets/js') )
      .pipe( gulpif(env === 'dev', serve.reload({ stream: true })) );
    
    callback();
    
  };
  
};
