<form id="search" autocomplete="off" role="search" action="<?= site_url('/'); ?>" method="get">
	<input id="search-field" type="text" name="s" autocomplete="off" placeholder="Search" class="w-full lg:w-40 pl-6 bg-transparent placeholder-white" value="<?php the_search_query(); ?>">
</form>