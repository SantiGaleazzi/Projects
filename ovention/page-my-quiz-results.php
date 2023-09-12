<?php

    $my_results_banner = get_field('my_results_banner');

    $ovens_in_list = array();
    $has_multiple_ovens = 'this is the right oven for you:';

    if ( isset( $_GET['ovens'] ) ) {

        $ovens_in_list = $_GET['ovens'];
        $ovens_in_list = explode( ',', $ovens_in_list );

    }

    if ( count( $ovens_in_list ) > 1 ) {

        $has_multiple_ovens = 'these are the right ovens for you:';

    }

	get_header();
    
?>

	<section class="tw-text-center tw-text-white tw-px-6 tw-py-32 lg:tw-py-64 tw-bg-cover tw-bg-center tw-bg-no-repeat tw-relative" style="background-image: url('<?= $my_results_banner['url']; ?>');">
		<div class="tw-container tw-max-w-6xl tw-relative tw-z-30">
			<div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
				<div class="tw-text-[40px] lg:tw-text-[60px] tw-font-bold tw-leading-none tw-mb-8 lg:tw-mb-12">
					Your Ovention Quiz Results
				</div>
			</div>
		</div>
		<div class="tw-w-full md:tw-w-3/5 tw-h-full tw-absolute tw-bg-cover tw-bg-left-top tw-bg-no-repeat tw-top-0 tw-right-0 tw-z-20" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/orange-flare.png');"></div>
		<div class="tw-bg-gray-800/80 tw-absolute tw-inset-0 tw-z-10"></div>
	</section>

    <section class="intro-oven cloud-pattern quiz-oven-results">
        <div class="row">
            <div class="quiz-oven-results__title text-center">
                Based on your quiz results, <?= $has_multiple_ovens; ?>
            </div>
        </div>

        <?php if ( have_rows('ovens_results_repeater') ) : ?>
            <?php
                while ( have_rows('ovens_results_repeater') ) : the_row();

                $oven_image = get_sub_field('image');
                $oven_link =  get_sub_field('oven_link');

					if ( in_array( get_sub_field('oven_type'), $ovens_in_list ) ) :
			?>
						<div class="row">
							<div class="oven-result">
								<div class="oven-result__info">
									<div class="oven-image">
										<img src="<?= $oven_image['url']; ?>" alt="<?= $oven_image['alt']; ?>">
									</div>

									<div class="oven-info">
										<div class="oven-name">
											<?php the_sub_field('title'); ?>
										</div>

										<div class="oven-description">
											<?php the_sub_field('description'); ?>
										</div>

										<div class="oven-link">
											<a href="<?= $oven_link['url']; ?>" target="<?= esc_attr( $oven_link['target'] ?: '_self' ); ?>">
												<?= $oven_link['title']; ?>
											</a>
										</div>
									</div>
								</div>

								<div class="oven-result__files">
									<div class="files-title">
										Learn More
									</div>
									
									<?php if ( have_rows('learn_more_files') ) : ?>
										<?php while ( have_rows('learn_more_files') ) : the_row(); ?>
											<?php if ( get_sub_field('is_file') == 'yes' ) : ?>
												<div class="file-download">
													<a href="<?php the_sub_field('file'); ?>" download>
														<i class="fas fa-cloud-download-alt"></i>
														<?php the_sub_field('file_name'); ?>
													</a>
												</div>
											<?php
												else :

												$link = get_sub_field('link');
											?>
												<div class="file-download">
													<a href="<?= $link['url']; ?>" target="<?= esc_attr( $link['target'] ?: '_self' ); ?>">
														<i class="fas fa-cloud-download-alt"></i> <?= $link['title']; ?>
													</a>
												</div>
											<?php endif; ?>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
            <?php endif; ?>
    </section>

<?php get_footer();
