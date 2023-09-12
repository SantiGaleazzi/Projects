<?php

	$gallery = get_field('country_gallery');

	get_header(); 
	
?>

	<?php get_template_part('partials/breadcrumbs'); ?>

	<section class="tw-px-5 tw-py-6 tw-bg-beige-500">
		<div class="tw-container">
			<div class="text-center tw-text-42 tw-text-blue-900 tw-font-extrabold">
				<?php the_title(); ?>
			</div>
		</div>
	</section>

	<?php if ( $gallery ) : ?>
		<section id="country-main" class="splide tw-bg-blue-800" aria-label="<?php the_title(); ?> gallery">
			<div class="tw-container tw-max-w-6xl">
				<div class="splide__track">
					<ul class="splide__list">
						<?php foreach ( $gallery as $image ) : ?>
							<li class="splide__slide">
								<div class="splide__slide__container">
									<img class="tw-w-full tw-h-full tw-object-contain" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</section>

		<section id="country-thumbnails" class="splide tw-px-10 tw-bg-blue-900" aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
			<div class="tw-container tw-max-w-4xl tw-relative">
				<div class="splide__track">
					<ul class="splide__list">
						<?php foreach ( $gallery as $image ) : ?>
							<li class="splide__slide tw-w-1/2 md:tw-w-1/5">
								<img class="tw-h-28 tw-object-cover" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="splide__arrows"></div>
			</div>
		</section>
	<?php endif; ?>

	<section class="tw-px-5 tw-py-16">
		<div class="tw-container tw-max-w-xl">
			<div class="has-wysiwyg tw-mb-10">
				<?php the_content(); ?>
			</div>

			<?php if ( get_the_post_thumbnail_url() ) : ?>
				<div>
					<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				</div>
			<?php endif; ?>
			
			<?php if ( get_field('country_files_pdf') ) : ?>
				<div class="tw-flex tw-flex-col sm:tw-flex-row tw-items-center tw-justify-between tw-pt-10 tw-border-t tw-border-beige-100 tw-mt-10">
					<div class="tw-w-full sm:tw-w-1/2">
						<div class="tw-text-center sm:tw-text-left tw-text-3xl tw-text-blue-900 tw-mb-6 sm:tw-mb-0">
							<?php the_field('country_files_name'); ?>
						</div>
					</div>

					<?php
						if ( get_field('country_files_pdf') ) :

							$post_meta = get_post_meta( get_field('country_files_pdf')['ID'], '_cloudinary' );
							$file_url = $post_meta[0]['_cloudinary_url'] ? $post_meta[0]['_cloudinary_url'] : wp_get_attachment_url( get_field('country_files_pdf')['ID'] );

					?>
						<div class="tw-flex-none">
							<a class="tw-text-center tw-text-white tw-font-bold tw-leading-none hover:tw-no-underline tw-px-7 tw-py-5 tw-bg-green-500 tw-inline-block" href="<?= $file_url; ?>">Download PDF</a>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="tw-px-5 tw-bg-blue-800">
		<div class="tw-container tw-max-w-5xl">
			<div class="tw-flex tw-flex-col-reverse md:tw-flex-row tw-items-center tw-justify-between">
				<div class="tw-text-center md:tw-text-left tw-w-full md:tw-w-1/2 tw-py-10 md:tw-py-0">
					<div class="tw-text-white tw-text-4xl tw-font-extrabold tw-mb-6">
						<?php the_field('country_support_title'); ?>
					</div>

					<?php if ( get_field('country_support_form_option') === 'ffz' ) : ?>

						<div class="has-wysiwyg tw-mb-6">
							<?php the_field('country_support_flexform'); ?>
						</div>

					<?php else: ?>

						<?php
							if ( get_field('country_support_button') ) :
								$donation_link = get_field('country_support_button');
						?>
							<div class="tw-mb-6">
								<a class="tw-text-center tw-text-white tw-font-bold tw-leading-none hover:tw-no-underline tw-px-7 tw-py-5 tw-bg-green-500 tw-inline-block" href="<?= $donation_link['url']; ?>" target="<?= esc_attr( $donation_link['target'] ?: '_self' ); ?>"><?= $donation_link['title']; ?></a>
							</div>
						<?php endif; ?>

					<?php endif; ?>

					<?php
						
						if ( get_field('country_support_link') ) :

							$link = get_field('country_support_link');
							
					?>
						<div>
							<a class="tw-text-green-500 hover:tw-no-underline" href="<?= $link['url']; ?>" target="<?= esc_attr( $link['blank'] ?: '_self' ); ?>"><?= $link['title']; ?></a>
						</div>
					<?php  endif; ?>
				</div>

				<div class="tw-w-full md:tw-w-1/2">
					<img class="tw-h-72 tw-object-cover tw-object-top tw-mx-auto" src="<?php the_field('country_support_side_image'); ?>" alt="<?php the_title(); ?>">
				</div>
			</div>
		</div>
	</section>

	<section class="tw-px-5 tw-py-16">
		<div class="tw-container tw-max-w-5xl">
			<div class="tw-text-center tw-text-blue-900 tw-text-3xl tw-mb-8">
				Ministry in Action
			</div>

			<?php

				$post_terms = wp_get_post_terms( get_the_ID(), 'country-taxonomy', array( 'fields' => 'ids' ) );
				$country_term_slug = kai_get_post_first_term_in_list( get_the_ID(), 'country-taxonomy' , 'slug' ) ?: '';
				
				$country_posts = new WP_Query( array(
					'post_type' => 'post',
					'posts_per_page' => 3,
					'orderby' => 'date',
					'order' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'country-taxonomy',
							'field' => 'term_id',
							'terms' => $post_terms
						)
					)
				));

			?>

			<?php if ( $country_posts->have_posts() ) : ?>
				<div class="tw-grid sm:tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-10">
					<?php while ( $country_posts->have_posts() ) : $country_posts->the_post(); ?>
						<a class="tw-block hover:tw-no-underline" href="<?php the_permalink(); ?>">
							<div class="tw-mb-4">
								<img class="tw-w-full tw-h-48 tw-object-cover tw-shadow-lg" src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							</div>

							<div class="tw-text-xs tw-font-medium tw-text-orange-800 tw-mb-2">
								<?= kai_get_post_first_term_in_list( get_the_ID(), 'category' ); ?>
							</div>

							<div class="tw-text-blue-800 tw-text-xl tw-font-bold">
								<?php the_title(); ?>
							</div>
						</a>
					<?php endwhile; ?>
				</div>
			

				<?php if ( $country_posts->found_posts > 3 ) : ?>
					<div class="tw-text-right tw-mt-8">
						<a class="tw-text-orange-500 tw-font-bold hover:tw-no-underline" href="/country-taxonomy/<?= $country_term_slug; ?>">More Highlights »</a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>

	<section class="tw-px-5 tw-py-16 tw-bg-green-500">
		<div class="tw-container tw-max-w-5xl">
			<div class="tw-flex tw-flex-col lg:tw-flex-row tw-gap-y-6 lg:tw-gap-y-0 md:tw-gap-x-16 tw-items-center">
				<div class="tw-flex-none">
					<div class="tw-text-center md:tw-text-left tw-text-white tw-text-3xl">
						<?php the_field('country_get_involved_title'); ?>
					</div>
				</div>

				<div class="tw-w-full tw-text-center md:tw-text-left tw-flex tw-flex-col md:tw-flex-row tw-gap-6">
					<div class="tw-flex-none">
						<div class="tw-text-white tw-text-lg tw-font-extrabold tw-leading-none tw-uppercase tw-mb-4">
							<?php the_field('country_get_involved_gift_title'); ?> <?php the_title(); ?>
						</div>

						<?php
							if ( get_field('country_get_involved_donate_link') ) :
								$donate_link = get_field('country_get_involved_donate_link');
						?>
							<div>
								<a class="tw-text-blue-800 tw-font-bold tw-leading-none hover:tw-no-underline tw-px-6 tw-py-5 tw-bg-white tw-inline-block" href="<?= $donate_link['url']; ?>" target="<?= esc_attr( $donate_link['target'] ?: '_self' ); ?>"><?= $donate_link['title']; ?></a>
							</div>
						<?php endif; ?>
					</div>

					<?php if ( have_rows('contry_get_involved_projects') ) : ?>
						<div class="tw-w-full tw-pt-6 md:tw-pt-0 md:tw-pl-6 tw-border-t md:tw-border-t-0 md:tw-border-l tw-border-white">
							<div class="tw-text-white tw-text-lg tw-font-extrabold tw-leading-none tw-uppercase tw-mb-4">
								<?php the_field('country_get_involved_projects_title'); ?> <?php the_title(); ?>
							</div>

							<div class="tw-flex tw-flex-col sm:tw-flex-row tw-gap-4">
								<?php
									while ( have_rows('contry_get_involved_projects') ) : the_row();
									$project_link = get_sub_field('project_link');
								?>
									<div class="sm:tw-w-1/2">
										<a class="<?= strlen( $project_link['title'] ) > 15 ? 'tw-text-sm' : ''; ?> tw-text-center tw-text-blue-800 tw-font-bold tw-leading-none hover:tw-no-underline tw-px-6 tw-py-5 tw-bg-white tw-inline-block sm:tw-block" href="<?= $project_link['url']; ?>" target="<?= esc_attr( $project_link['target'] ?: '_self' ); ?>"><?= $project_link['title']; ?></a>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer();
