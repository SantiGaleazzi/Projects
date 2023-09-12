<div class="container search__container">
    <form role="search" action="<?php echo site_url('/'); ?>" method="get" class="searchbox" id="search">
        <input type="text" placeholder="Search" name="s" class="searchbox-input" onkeyup="buttonUp();" value="<?php the_search_query() ?>">
        <input type="submit" class="searchbox-submit" value="">
        <span class="searchbox-icon">
        </span>
    </form>
</div>
