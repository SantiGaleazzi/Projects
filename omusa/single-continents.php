<?php

	get_header();

	$is_sensitive = get_field('especial_or_sensitive');

	$thumbnail_image = get_the_post_thumbnail_url();
	$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

	// Support
	$settings_support_give = get_field('settings_support_give', 'options');
	$settings_support_give_target = $settings_support_give['target'] ? $settings_support_give['target'] : '_self';

	// Coach
	$call_a_coach_link = get_field('coach_settings_link', 'option');
    $call_a_coach_target = $call_a_coach_link['target'] ? $call_a_coach_link['target'] : '_self';

?>

	<section class="pt-16 md:pt-40 xl:pt-56 pb-20">
		<div class="container bg-black-500-new shadow-2xl border-b-4 border-red-500">
			<div class="text-white-pure px-6 md:px-12 lg:px-24 pt-10 lg:pt-16 pb-32 bg-red-500">
				< <a href="<?= esc_url( get_permalink( get_page_by_title( 'Where om Works' ) ) ); ?>" class="text-xs font-bold underline" >BACK TO WHERE OM WORKS</span></a>	
			</div>

			<div class="px-6 md:px-12 lg:px-24 -mt-32 pt-3">

				<!-- Post Copy -->
				<div class="shadow-2xl">
					<div class="relative">
						<img src="<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?> thumbnail" class="w-full" />

						<div class="px-6 md:px-12 lg:px-24 -mt-8 sm:-mt-0 sm:-mb-10 relative z-10">
							<div class="flex flex-col xl:flex-row items-center p-4 lg:px-6 lg:py-6 bg-page rounded shadow-xl">
								<div class="text-default leading-none font-roboto mb-4 xl:mb-0 xl:pr-8">
									<?php the_field('coach_title', 'options'); ?>
								</div>
								
								<div class="w-full flex-1 flex flex-col sm:flex-row justify-between">
									<a href="<?= $call_a_coach_link['url']; ?>" target="<?= esc_attr( $call_a_coach_target ); ?>" class="w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-teal-500 inline-block sm:mx-2 sm:mt-0"><?= $call_a_coach_link['title']; ?></a>
									
									<button type="button" class="quiz-lightbox-btn w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-orange-500 inline-block sm:mx-2 mt-3 sm:mt-0">Take the Readiness Quiz</button>
								</div>
							</div>
						</div>
					</div>

					<div class="px-6 sm:px-12 lg:px-24 py-16 md:py-24">
						<div class="text-xs text-orange-500 font-bold uppercase mb-2">
							<?php 
								$term_list = wp_get_post_terms( $post->ID, 'areas', array( 'fields' => 'names' ) );
								$assigned_term = implode(', ', $term_list);
								$url = get_term_link($assigned_term, 'areas');
							?>
							<a href="<?= esc_url( $url ); ?>" class="text-orange-500"><?= $assigned_term; ?></a>		
						</div>
						<h2 class="text-3xl md:text-4xl text-default font-roboto font-light leading-none mb-6">
							<?php the_title(); ?>					
						</h2>

						<div class="text-default has-wysiwyg">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>	
					</div>
				</div>
				<!-- Post Copy -->

				<?php if( have_rows('country_facts_repeater') ) : ?>
					<div class="sm:px-6 md:px-12 lg:px-24 py-8 md:py-12">
						<div class="text-default text-3xl text-center font-roboto font-light mb-6">
							<?php the_field('facts_title'); ?> <strong><?php the_title(); ?></strong>
						</div>

						<div>
							<?php while( have_rows('country_facts_repeater') ) : the_row(); ?>
								<div class="flex flex-col md:flex-row text-default mb-6 md:mb-8">
									<div class="w-32 lg:w-48 font-black">
										<?php the_sub_field('title'); ?>
									</div>

									<div class="flex-1">
										<?php the_sub_field('description'); ?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>

				<!-- How to help -->
				<?php if ( get_field('how_to_help_description') ) : ?>
					<div class="sm:px-6 md:px-12d lg:px-24 py-8 md:py-12  border-t
					 border-separator">
						<div class="text-default text-3xl text-center font-roboto font-light mb-6">
							<?php the_field('how_to_help_title'); ?>
						</div>

						<div class="text-default leading-7 has-red-links has-wysiwyg">
							<?php the_field('how_to_help_description'); ?>
						</div>
					</div>
				<?php endif;?>
				<!-- How to help -->

				<!-- Pray -->
				<div class="sm:px-6 md:px-12d lg:px-24 pb-12 md:pb-20 pt-12">
					<div class=" px-6 md:px-16 py-6 md:py-12 border-t-8 border-red-200-new rounded-md shadow-lg">
						<div class="text-3xl text-center text-default font-roboto font-light leading-none mb-6">
							<?php the_field('pray_for_title'); ?> <?php the_title(); ?>
						</div>

						<div class="text-default lg:leading-9 has-red-links has-wysiwyg mb-6">
							<?php the_field('pray_for_description'); ?>
						</div>

						<div class="flex flex-col md:flex-row items-center justify-center">
							<div class="w-full md:w-auto mb-4 md:mb-0 md:mr-4 pray-country">
								<div class="hidden cookie-post"><?= get_the_ID(); ?></div>
								<a href="<?= add_query_arg('post_action', 'like'); ?>" class="country-text text-white-pure text-center text-lg font-black leading-none px-6 py-4 bg-green-500 block md:inline-block">
									<?php the_field('pray_for_country_button'); ?> <?php the_title(); ?>
								</a>
							</div>

							<div class="w-full md:w-auto text-default font-roboto font-light leading-none flex justify-center items-center px-6 py-4 bg-gray-150-new">
								<img src="<?= bloginfo('template_url'); ?>/assets/images/praying-hands-black.png" alt="Pray" class="inline-block w-4 mr-2">
								<strong class="pr-1"><?= ip_get_like_count('likes');?></strong> <?php the_field('pray_for_prayed_button'); ?>
							</div>
						</div>
					</div>
				</div>
				<!-- Pray -->

				<!-- Support -->
				<div class="sm:px-6 md:px-12d lg:px-24 pb-12 md:pb-20">
					<div class="text-default text-center bg-gray-150-new px-6 md:px-12 lg:px-24 py-12 rounded-md">
						<div class="text-3xl text-center font-roboto font-light mb-6">
							<?php if ( $is_sensitive == 'yes' ) : ?>

								<?php the_field('sensitive_support_title'); ?>

							<?php else : ?>
						
								<?php the_field('settings_support_title', 'options'); ?> <?php the_title(); ?>

							<?php endif; ?>
						</div>

						<div class="text-default has-red-links has-wysiwyg mb-6">
							<?php the_field('settings_support_description','options'); ?>
						</div>

						<div class="text-center">
							<a href="<?= $settings_support_give['url']; ?>" rel="nofollow" target="<?php esc_url( $settings_support_give_target ); ?>" class="text-white-pure text-lg font-black text-center leading-none px-12 py-4 bg-red-500 inline-block">
								<?= $settings_support_give['title']; ?>
							</a>
						</div>
					</div>
				</div>
				<!-- Support -->
				
				<!-- Go To -->
				<div class="sm:px-6 md:px-12d lg:px-24 pb-12 md:pb-20">
					<div class="text-default text-center">
						<div class="text-3xl text-center font-roboto font-light leading-none mb-8">
							<?php if ( $is_sensitive == 'yes' ) : ?>

								<?php the_field('sensitive_go_to_tile'); ?>

							<?php else : ?>
						
								<?php the_field('settings_go_to_title', 'options'); ?> <?php the_title(); ?>

							<?php endif; ?>
						</div>

						<div class="mb-8 has-red-links has-wysiwyg">

							<?php if ( $is_sensitive == 'yes' ) : ?>

								<?php the_field('sensitive_go_to_description'); ?>

							<?php else : ?>
						
								Join our team to support the work in <?php the_title(); ?>. Find a short-term trip or long term opportunity now.

							<?php endif; ?>
						</div>

						<div class="flex flex-col md:flex-row items-center justify-center">
							<div class="w-full md:w-auto mb-3 md:mb-0 md:mr-3">
								<a href="<?= $call_a_coach_link['url']; ?>" target="<?= esc_attr( $call_a_coach_target ); ?>" class="w-full text-center text-white-pure font-black leading-none px-6 py-4 bg-teal-500 inline-block"><?= $call_a_coach_link['title']; ?></a>
							</div>

							<div class="w-full md:w-auto">
								<button type="button" class="quiz-lightbox-btn w-full text-center text-white-pure font-black leading-none px-6 py-4 bg-orange-500 inline-block">Take the Readiness Quiz</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Go To -->

				<div class="text-xs text-red-500 font-bold sm:px-12 lg:px-24 py-6 md:py-12 border-t border-separator">
					< <a href="<?= esc_url( get_permalink( get_page_by_title( 'Where om Works' ) ) ); ?>" class="underline">BACK TO WHERE OM WORKS</a>
				</div>
			</div>
		</div>
	</section>

<?php get_footer();
