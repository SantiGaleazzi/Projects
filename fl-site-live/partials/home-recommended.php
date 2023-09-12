<?php
$recommended_title = get_field('recommended_title');
$recommended_videos = get_field('recommended_videos');
if ($recommended_videos) :
?>
	<div class="py-12 pb-20">
		<div class="container">
			<h1 class="text-white text-center font-roboto-condensed font-black text-4xl text-left uppercase"><?php the_field('recommended_title'); ?></h1>
			<div class="w-full pt-7 flex flex-wrap justify-center xxl:justify-between">
				<?php
				foreach ($recommended_videos as $post):
					setup_postdata($post);
					get_template_part('partials/post', 'item');
				endforeach;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
<?php endif;