<?php

	/***************************
	*Google Optimize
	****************************/
	add_action('wp_head', 'add_googleoptimize');
	function add_googleoptimize() { ?>
	  <script src="https://www.googleoptimize.com/optimize.js?id=OPT-5KZM6MZ"></script>
	<?php
	}