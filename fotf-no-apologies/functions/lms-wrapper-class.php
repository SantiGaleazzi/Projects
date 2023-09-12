<?php

	/**
	 * `add_filter( 'learndash_wrapper_class', 'lms_wrapper_class_change', 10, 2 );`
	 * 
	 * The first parameter is the name of the filter we want to hook into. The second parameter is the
	 * name of the function we want to run when the filter is called. The third parameter is the priority
	 * of the function. The fourth parameter is the number of arguments the function accepts
	 * 
	 * @param string wrapper_class The class that LearnDash uses for the wrapper.
	 * @param post_id The post ID of the current page.
	 * 
	 * @return string The wrapper class is being returned with the theme class added to it.
	 */
	add_filter( 'learndash_wrapper_class', 'lms_wrapper_class_change', 10, 2 );
	function lms_wrapper_class_change( string $wrapper_class, $post_id ) : string {

		return $wrapper_class . ' ' . get_field('lms_lesson_theme', $post_id );

	}
