<?php
    /**
	* Template Name: Pray Template
    */

	$thumbnail_image = get_the_post_thumbnail_url();
    $template_intro_side_image = get_field('template_pray_intro_side_image');

	$pray_help_side_image = get_field('template_pray_help_side_image');

    get_header();

?>

    <section class="section-quoted pt-24 md:pt-48">
        <div class="container">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 lg:w-2/5 lg:pl-24 mb-8 md:mb-0">
                    <div class="headline text-default mx-auto md:mx-0">
                        <?php the_field('template_pray_intro_title'); ?>
                    </div>

                    <div class="text-default leading-7 mb-6">
                        <?php the_field('template_pray_intro_description'); ?>
                    </div>

					<?php
						if ( get_field('template_pray_intro_button') ) :
						$intro_button = get_field('template_pray_intro_button');
					?>
						<div class="open-lightbox">
							<a href="<?= $intro_button['url']; ?>" target="<?= esc_attr( $intro_button['target'] ? $intro_button['target'] : '_self' ); ?>" class="text-lg text-center text-white-pure leading-none font-black px-8 py-4 bg-green-500 cursor-pointer inline-block"><?= $intro_button['title']; ?></a>
						</div>
					<?php endif; ?>
                </div>

                <div class="md:w-1/2 lg:w-3/5 flex justify-center relative">
                    <img src="<?= esc_url( $template_intro_side_image['url'] ); ?>" alt="<?= esc_attr( $template_intro_side_image['alt'] ); ?>">
                </div>
            </div>
        </div>
    </section>

    <section class="pb-20">
		<div class="container bg-black-500-new shadow-2xl border-b-4 border-red-500">
			<div class="text-white-pure px-6 md:px-12 lg:px-24 pt-10 lg:pt-16 pb-32 bg-red-500">
				< <a href="<?= esc_url( get_permalink( get_page_by_title( 'Pray' ) ) ); ?>" class="text-xs font-bold underline" >BACK TO PRAY PAGE</span></a>	
			</div>

			<div class="px-6 md:px-12 lg:px-24 -mt-32 pt-3">

				<!-- Post Copy -->
				<div class="shadow-2xl">
					<div class="relative">
						<img src="<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?> thumbnail" class="w-full" />
					</div>

					<div class="px-6 sm:px-12 lg:px-24 py-16 md:py-20">

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

				<!-- Pray -->
				<div class="sm:px-6 md:px-12d lg:px-24 pb-12 md:pb-20 pt-12">
					<div class=" px-6 md:px-16 py-6 md:py-12 border-t-8 border-red-200-new rounded-md shadow-lg">
						<div class="text-3xl text-center text-default font-roboto font-light leading-none mb-6">
							<?php the_field('template_pray_pray_title'); ?>
						</div>

						<div class="text-default lg:leading-9 has-red-links has-wysiwyg mb-6">
							<?php the_field('template_pray_pray_description'); ?>
						</div>

						<div class="flex flex-col md:flex-row items-center justify-center">
							<div class="w-full md:w-auto mb-4 md:mb-0 md:mr-4 pray-country-afghanistan">
								<div class="hidden cookie-post"><?= get_the_ID(); ?></div>
								<a href="<?= add_query_arg('post_action', 'like'); ?>" class="country-text text-white-pure text-center text-lg font-black leading-none px-6 py-4 bg-green-500 block md:inline-block">
									<?php the_field('template_pray_pray_country_button'); ?>
								</a>
							</div>

							<div class="w-full md:w-auto text-default font-roboto font-light leading-none flex justify-center items-center px-6 py-4 bg-gray-150-new">
								<img src="<?= bloginfo('template_url'); ?>/assets/images/praying-hands-black.png" alt="Pray" class="inline-block w-4 mr-2">
								<strong class="pr-1"><?= ip_get_like_count('likes');?></strong> People Have Prayed
							</div>
						</div>
					</div>
				</div>
				<!-- Pray -->

				<div class="text-xs text-red-500 font-bold sm:px-12 lg:px-24 py-6 md:py-12 border-t border-separator">
					< <a href="<?= esc_url( get_permalink( get_page_by_title( 'Pray' ) ) ); ?>" class="underline">BACK TO PRAY PAGE</a>
				</div>
			</div>
		</div>
	</section>

	<section id="pray-for" class="bg-gray-150-new relative">
		<div class="hidden md:block w-1/2 h-full absolute top-0 left-0 bg-cover bg-no-repeat bg-right-top" style="background-image: url('<?= $pray_help_side_image['url']; ?>');"></div>

		<div class="container px-6">	
			<div class="flex justify-end py-16 text-default">
				<div class="w-full md:w-1/2">
					<div class="font-roboto font-light leading-none text-4xl mb-6">
						<?php the_field('template_pray_help_title'); ?>
					</div>

					<div class="leading-7 mb-10">
						<?php the_field('template_pray_help_description'); ?>
					</div>

					<?php
						if ( get_field('template_pray_help_button') ) :

						$help_button = get_field('template_pray_help_button');
						$help_button_target = $help_button['target'] ? $help_button['target'] : '_self';
					
					?>
						<div>
							<a href="<?= esc_url( $help_button['url'] ); ?>" target="<?= esc_attr( $help_button_target ); ?>" class="text-center text-white-pure text-lg font-black px-8 py-3 bg-red-500">
								<?= $help_button['title']; ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer();
