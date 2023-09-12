<?php

	/**
	 * This PHP function creates a shortcode that outputs the current year.
	 * 
	 * @return The function `shortcode_current_year()` is returning the current year in the format of 'Y'
	 * (e.g. 2021).
	 */
	function shortcode_current_year() {

		return date('Y');
		
	}
	add_shortcode('current_year', 'shortcode_current_year');
