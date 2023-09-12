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
    <div class="curve-header">
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
		<img  alt="Shapes" src="<?php echo bloginfo('template_url'); ?>/assets/img/shapes-background.png" class="shapes-bg">
		<div class="flex-container-lms grid-container">
	    	<div class="max-w-2xl text-left w-full">
	    		<div class="copy-try-access"><?php the_field('copy'); ?></div>
	    		<div class="pb-10">
						<?php if( have_rows('bullet_point') ): ?>
		                    <div class="w-full list-bullets">
		                        <?php
		                            while( have_rows('bullet_point') ): the_row();

		                            $icon = get_sub_field('icon');
		                            $text = get_sub_field('text');
		                        ?>
		                            <div class="list-bullets-item">
		                                <div class="flex-initial">
		                                    <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>">
		                                </div>

		                                <div class="flex-1 text-base pl-4 text-black">
		                                    <?php the_sub_field('text'); ?>
		                                </div>
		                            </div>
		                        <?php endwhile; ?>
		                    </div>
		                <?php endif; ?>
				</div>
	    	</div>
	    	<div>
	    		<div class="bg-gray-200 rounded try-access-form relative">
		    		<?php the_field('form'); ?>
		    	</div>
		    	<div class="flex-icons relative">
		    		<span class="mr-2">Share Via: </span>
		    		<div class="mx-2">
		    			<a rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank"><img  alt="Facebook" src="<?php echo bloginfo('template_url'); ?>/assets/img/facebook-icon.png" class="inline-block"></a>
		    		</div>
					<div class="mx-2">
						<a rel="nofollow" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank">
							<img  alt="Twitter" src="<?php echo bloginfo('template_url'); ?>/assets/img/twitter-icon.png" class="inline-block"></a>
					</div>
					<div class="mx-2">
						<a rel="nofollow" href="mailto:type%20email%20address%20here?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20<?php bloginfo('name'); ?>&body=<?php the_title('','',true); ?>%20%20%3A%20%20<?php echo get_the_excerpt(); ?>%20%20%2D%20%20%28%20<?php the_permalink(); ?>%20%29" target="_blank"><img  alt="Email" src="<?php echo bloginfo('template_url'); ?>/assets/img/email-icon.png" class="inline-block"></a>
					</div>
		    	</div>
	    	</div>
	    </div>
	</div>
</section>

<div class="hidden-footer">
	<?php get_footer(); ?>
</div>
