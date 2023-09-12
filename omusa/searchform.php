<form  role="search" action="<?php echo site_url('/'); ?>" method="get" id="search" class="w-full md:w-auto mr-3 md:mr-0">
	<input id="search-field" type="text" name="s" placeholder="Search" class="searcher bg-white-pure placeholder-gray-400" value="<?php the_search_query() ?>" />
</form>