<?php

	$home_help_link = get_field('home_help_title');
    $home_help_target = isset($home_help_link['target']) ? $home_help_link['target'] : '_self';

?>

<section class="section-quoted pt-10 sm:pt-32 md:pt-48 lg:pt-56 pb-40 lg:pb-32">
	<div class="container">
		<div class="max-w-4xl mx-auto">
			<div class="headline text-default mx-auto">
				<?php the_field('home_quote_title'); ?>
			</div>

			<div class="lg:w-3/5 text-default sm:text-xl text-center lg:mx-auto mb-6">
				<?php the_field('home_quote_description'); ?>
			</div>

			<div class="w-full text-center">
				<a href="<?= $home_help_link['url']; ?>" target="<?= esc_attr( $home_help_target ); ?>" class="text-white-pure text-lg font-lato font-black leading-none px-6 py-4 md:px-8 bg-orange-500 inline-block"><?= $home_help_link['title']; ?></a>
			</div>
		</div>
	</div>
</section>