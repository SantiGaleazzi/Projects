<?php

/**
 * A replacement for the default wp_trim_excerpt(). 
 *
 * Generates an excerpt from the_content, if needed.
 *
 * It is similar (identical) to the default to allow filters other than our own to work, 
 * with the exception that it uses our default my_trim_words() function.
 *
 * @param string $text Optional. The excerpt. If set to empty, an excerpt is generated.
 * @return string The excerpt.
 */
function my_trim_excerpt($text = '') {
  $raw_excerpt = $text;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = strip_shortcodes( $text );
 
    $text = apply_filters( 'the_content', $text );
    $text = str_replace(']]>', ']]&gt;', $text);
 
    $excerpt_length = apply_filters( 'excerpt_length', 10 );
    $excerpt_more = apply_filters( 'excerpt_more', ' ' . '&hellip;' );
 
    // Use our own version of wp_trim_words().
    $text = my_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}
 
 
/**
 * A replacement for the default wp_trim_words(). 
 * 
 * Trims text to a certain number of words.
 *
 * It is similar (identical) to the default to allow filters other than our own to work,  
 * with the exception that it lets certain allowed HTML to pass through.  
 *
 * @param string $text Text to trim.
 * @param int $num_words Number of words. Default 55.
 * @param string $more Optional. What to append if $text needs to be trimmed. Default '&hellip;'.
 * @return string Trimmed text.
 */
function my_trim_words( $text, $num_words = 55, $more = null ) {
  if ( null === $more )
    $more = __( '&hellip;' );
  $original_text = $text;
  
  // Allowed HTML tags
  $allowed_tags = '<p>,<a>,<em>,<img>,<ul>,<li>';
  $text = strip_tags($text, $allowed_tags);
 
  /* translators: If your word count is based on single characters (East Asian characters),
     enter 'characters'. Otherwise, enter 'words'. Do not translate into your own language. */
  if ( 'characters' == _x( 'words', 'word count: words or characters?' ) && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
    $text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );
    preg_match_all( '/./u', $text, $words_array );
    $words_array = array_slice( $words_array[0], 0, $num_words + 1 );
    $sep = '';
  } else {
    $words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
    $sep = ' ';
  }
  if ( count( $words_array ) > $num_words ) {
    array_pop( $words_array );
    $text = implode( $sep, $words_array );
    $text = $text . $more;
  } else {
    $text = implode( $sep, $words_array );
  }
  return apply_filters( 'wp_trim_words', $text, $num_words, $more, $original_text );
}
 
 
/**
 * Remove the default trimming filter and replace it with our own.
 */
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'my_trim_excerpt' );
 
 
/**
 * Custom excerpt length.
 */
function my_excerpt_length() {
  return 20;
}
add_filter( 'excerpt_length', 'my_excerpt_length' );
 
 
/**
 * Custom excerpt more...
 */
function my_excerpt_more() {
    if( get_post_type() != 'ffz-gift-catalog'){
        return " <strong>[...]</strong>";
    }
}
add_filter( 'excerpt_more', 'my_excerpt_more' );
