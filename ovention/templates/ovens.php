<?php

	/*
	* Template Name: Ovens
	*/

	$oven = get_field('oven');

	get_header();

?>
	
	<?php get_template_part('partials/general-banner'); ?>

	<section class="tw-text-center tw-px-6 tw-py-16">
		<div class="tw-container">
			<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
		</div>
	</section>

	<section class="tw-px-6 tw-py-24 tw-bg-gradient-to-tr tw-from-orange-900 tw-to-orange-600">
		<div class="tw-container">
			<div class="tw-flex tw-flex-col md:tw-flex-row">
				<div class="tw-w-full md:tw-w-3/5 tw-text-white has-wysiwyg md:tw-pr-6 tw-mb-12 md:tw-mb-0">
					<?php the_content(); ?>
				</div>

				<div class="tw-w-full md:tw-w-2/5 md:tw-pl-6">
					<div class="tw-text-white tw-bg-gray-800 tw-rounded-2xl tw-shadow-2xl md:-tw-mt-48">
						<div>
							<div class="js-has-vimeo-player tw-border-8 tw-border-solid tw-border-white tw-shadow-xl tw-relative" data-video-id="<?php the_field('template_ovens_vimeo_id'); ?>">
								<img class="tw-w-full tw-object-cover" src="https://vumbnail.com/<?php the_field('template_ovens_vimeo_id'); ?>.jpg" alt="<?php the_title(); ?>">
							</div>

							<div class="tw-px-8 tw-py-20 md:tw-px-12">
								<div class="tw-text-center tw-text-[34px] tw-font-bold tw-leading-none tw-mb-10">
									Request a Demo
								</div>
	
								<div class="tw-text-center tw-font-medium tw-mb-">
									See it in action! Request an onsite demo from an Ovention representative
								</div>
	
								<div class="has-mautic-form has-dark-bg">
									<script type="text/javascript" src="//ma.oventionovens.com/form/generate.js?id=13"></script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="tw-px-6 tw-py-16 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-text-center tw-text-orange-600 tw-text-[32px] tw-font-bold tw-leading-none tw-mb-12">
				<?= $oven['oven_links_title']; ?>
			</div>

			<div class="tw-flex tw-flex-wrap">
				<?php foreach ( $oven['oven_links'] as $data ) : ?>
					<div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-flex tw-flex-col tw-p-3 tw-group">
						<a class="tw-h-full tw-flex tw-flex-col tw-p-8 tw-bg-white tw-border-2 tw-border-solid tw-border-gray-200 hover:tw-border-orange-500 tw-rounded-2xl tw-transition-all tw-duration-150 tw-ease-in-out" href="<?= $data['link_type'] === 'download' ? $data['attachment']['url'] : $data['video_link']; ?>" target="_blank">
							<div class="tw-flex-auto tw-mb-8">
								<i class="fa-solid <?= $data['link_type'] === 'download' ? 'fa-cloud-arrow-down': 'fa-video'; ?> tw-text-4xl tw-text-orange-500 tw-transition-transform tw-duration-100 tw-ease-in-out group-hover:tw-translate-y-1"></i>
							</div>

							<div>
								<div class="tw-text-gray-900 hover:tw-text-gray-900 tw-font-semibold">
									<?= $data['text_link']; ?>
								</div>

								<div class="tw-text-[14px] tw-text-gray-400 tw-font-medium">
									<?= $data['link_type'] === 'download' ? 'File': 'Watch'; ?>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ( $oven['oven_ribbons'] != null ) : ?>
		<div class="oven-ribbons hide-for-small show-for-medium">
			<div class="oven-ribbons__close"><i class="fas fa-times-circle"></i></div>
			<?php

				$rows = $oven['oven_ribbons'];

				if ( $rows ) :

					foreach( $rows as $row ) :

					$ribbon_image = $row['ribbon_image'];
				
			?>
					<img src="<?= $ribbon_image['url'] ?>" alt="<?= $ribbon_image['alt'] ?>">
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
