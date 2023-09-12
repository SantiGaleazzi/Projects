<?php
 /*
  * Template name: Find your Leaders Template
  */
?>
<div class="hidden"> 
    <?php 
    	$banner_title = get_field('banner_title');
    	$banner_subtitle = get_field('banner_subtitle');
    	$copy = get_field('copy');
    	$form = get_field('form');
        get_header('try-access');
    ?>
</div>
<section class="w-full try-access-p">
    <div class="curve-header-leaders">
        <div class="grid-container">
	        <div class="pt-16 pb-6">
	        	<img src="<?= $banner_title['url']; ?>" alt="<?= $banner_title['alt']; ?>" class="mx-auto">
	        </div>
	        <div class="text-center text-white font-bebas sub-banner-lms pb-16 leading-none">
	        	<?php the_field('banner_subtitle'); ?>
	        </div>
        </div>
    </div>
	<div class="w-full relative pb-5">
		<div class="flex-container-lms grid-container">
	    	<div class="text-left w-full">
	    		<div class="copy-try-access copy-find-your-leaders"><?php the_field('copy'); ?></div>
	    	</div>
	    </div>
	    <div class="grid-container">
	    		<div class="bg-gray-200 rounded try-access-form relative">
		    		<div class="vrt-form-styles px-4 lg:px-0">
						<script 
						    src="https://cdn.virtuoussoftware.com/virtuous.embed.min.js" 
						    data-vform="859AB08C-104B-412B-B39D-9F8BCDC7BA12" 
						    data-orgId="1145" 
						    data-isGiving="false"
						    data-dependencies="[]">
						</script>
					</div>
		    	</div>
	    	</div>
	</div>
</section>

<div class="hidden-footer">
	<?php get_footer(); ?>
</div>
