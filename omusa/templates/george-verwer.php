<?php

	/**
	 * Template Name: George
	 */

	// Only if the comment is granted by OM and the user
    // key 5.1 -> Allow request to be shown on partener prayer wall
    // Key 8 -> Show in Pray Wall
    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array(
            'mode' => 'all',
            array(
                'key' => '5.1',
                'value' => 'allow'
            ),
            array(
                'key' => 'is_starred',
                'value' => true
            )
        )
    );

    $george_wall = GFAPI::get_entries(14, $search_criteria);

	get_header();

?>

	<section class="section-quoted px-5 pt-32 md:pt-56 lg:pt-64 bg-red-500 overflow-hidden">
		<div class="container md:pb-24 relative">
			<div class="flex flex-col md:flex-row justify-between">
				<div class="w-full md:w-1/2  xl:pr-20">
					<div class="headline white-arrows mx-auto">
						<span class="text-left text-white-pure"><?php the_field('george_intro_title'); ?></span>
					</div>

					<div class="text-white-pure mb-10 md:mb-0 md:pr-10">
						<?php the_field('george_intro_description'); ?>
					</div>
				</div>

				<div class="w-full md:w-1/2">
					<div class="w-auto md:w-4/5 lg:w-3/4 xl:w-1/2 md:absolute md:bottom-0 md:right-0 lg:right-0 md:-mr-32 xl:mr-0">
						<img src="<?php the_field('george_intro_side_image'); ?>" alt="George Verwer">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="text-center text-default px-5 py-12 bg-card">
		<div class="container">
			<div class="text-4xl font-roboto font-light leading-none mb-5">
				<?php the_field('george_legacy_title'); ?>
			</div>

			<div class="sm:max-w-sm md:px-5 mx-auto mb-5">
				<?php the_field('george_legacy_description'); ?>
			</div>

			<?php
				if ( get_field('george_legacy_button') ) :
					$george_link = get_field('george_legacy_button');
			?>
				<div>
					<a href="<?= $george_link['url']; ?>" target="<?= esc_attr( $george_link['target'] ?: '_self' ); ?>" class="button text-xl lg:px-10 bg-red-500">
						<?= $george_link['title']; ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="js-george-video text-default px-5 pt-12">
		<div class="container">
			<div class="flex flex-col md:flex-row mb-12">
				<div class="w-full md:w-2/5 mb-10 md:mb-0">
					<div class="text-3xl font-roboto font-bold">
						<?php the_field('george_story_name'); ?>
					</div>

					<div class="text-sm mb-8">
						<?php the_field('george_story_locations'); ?>
					</div>

					<div class="md:pr-6 lg:w-3/4 pb-8 border-b">
						<?php the_field('george_story_initial_description'); ?>
					</div>
				</div>

				<div class="w-full md:w-3/5">
					<div class="has-video">
						<?php the_field('george_story_video'); ?>
					</div>
				</div>
			</div>

			<div class="js-extra-description has-wysiwyg relative">
				<?php the_field('george_story_long_description'); ?>

				<div class="js-story-accordion">
					<button type="button" class="text-white-pure font-lato font-black leading-none px-12 py-4 bg-orange-500 inline-block">
						Read More
					</button>
				</div>
			</div>
		</div>
	</section>
	
	<?php if ( count($george_wall) > 0 ) :  ?>
		<section class="pt-12">
			<div class="container">
				<div class="text-3xl lg:text-4xl text-red-500 text-center font-roboto font-light leading-none mb-12">
					Messages of Remembrance
				</div>
			</div>
		</section>
       
		<section class="pb-10 relative">
			<div class="w-full testimonials">
				<div class="container">
					<div class="lg:w-4/5 xl:w-3/5 swiper-container pb-4 lg:pb-6">
						<div class="swiper-wrapper">

							<?php
                                foreach ( $george_wall as $pray ) :
                            ?>

								<div class="testimonial swiper-slide px-16 lg:px-20 mb-0 pray-in-wall">
									<div class="w-fll relative">
										<div class="testimonial-box w-full h-full absolute top-0 z-10"></div>
										<div class="flex flex-col justify-between p-6 lg:p-10 bg-page border-t-4 border-red-500 rounded-md shadow-lg ">
											<div class="text-default mb-8">
												<?= $pray['4']; ?>
											</div>
											
                                            <?php if( !empty($pray['10.3']) || !empty($pray['10.6']) ) : ?>
                                                <div class="text-default font-roboto font-bold leading-snug mb-6">
                                                    <?= $pray['10.3']; ?>
                                                    <?= $pray['10.6']; ?>
                                                </div>
                                            <?php endif; ?>
											
                                            <?php
												if ( $pray['12'] ) :

												$string = str_replace( '\\/', '/', $pray['12'] );

												$pictures = json_decode( $string, true );

											?>
												<div class="grid grid-cols-4 gap-x-1">
													<?php foreach ( $pictures as $picture ) : ?>

														<div class="h-20 bg-cover bg-center bg-no-repeat cursor-pointer remembrance-image" style="background-image: url('<?= $picture; ?>');"></div>

													<?php endforeach; ?>
												</div>
											 <?php endif; ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section id="request-prayer" class="px-6">
		<div class="container pt-16">
			<div class="pt-6 px-8 pb-6 sm:pb-32 md:pb-8 lg:py-12 bg-red-500 rounded-md shadow-2xl">
				<div class="w-full lg:w-4/5 flex justify-end mx-auto">
					<div class="md:w-2/6">
						<div class="text-3xl text-white-pure font-roboto font-bold leading-snug mb-6">
							<?php the_field('george_form_title'); ?>
						</div>

						<div class="text-white-pure mb-3">
							<?php the_field('george_form_description'); ?>
						</div>

						<div class="text-white-pure text-xs">
							<?php the_field('george_form_note'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="py-12 sm:pt-0 sm:pb-64 md:pb-56 lg:pb-32">
		<div class="container">
			<div class="w-full lg:w-4/5 md:pl-8 lg:pl-0 sm:-mt-24 md:-mt-48 mx-auto">
				<div class="md:w-4/6 has-form">
					<div class="w-full sm:absolute top-0 left-0 md:-mt-40 lg:-mt-32 xl:-mt-24 px-6 md:pr-16 lg:pr-20 md:pl-0 z-10">
						<?php the_field('george_form_gravityforms'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="george-lightbox w-full h-full px-4 lg:px-8 py-10 inset-0 fixed flex items-center justify-center z-50">
	    <div class="close-ligtbox close-george-lighbox w-full h-full bg-lightbox absolute z-50"></div>

	    <div class="w-auto max-w-3xl flex justify-center items-center rounded relative z-50">
	        <div class="close-ligtbox close-george-lighbox w-8 h-8 flex items-center justify-center bg-black-700-new rounded-full absolute top-0 right-0 -mt-4 -mr-4 cursor-pointer z-10">
	            <i class="fas fa-times text-white-pure"></i>
	        </div>
	        <img src="" alt="" class="border-t-8 border-red-500">
	    </div>
	</section>

<?php get_footer();
