<?php
		
	$max_page = $wp_query->max_num_pages;

	!$paged && $max_page >= 1 ? $current_page = 1 : $current_page = $paged;
?>

	<div class="search-pagination">
		<?php pagination('« Prev', 'Next »'); ?>
	</div>
