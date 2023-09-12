<?php get_header(); ?>

	<section class="tw-text-center tw-text-white tw-px-6 tw-py-32 lg:tw-py-64 tw-bg-cover tw-bg-center tw-bg-no-repeat tw-relative" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/default-banner-background.jpg');">
		<div class="tw-container tw-max-w-6xl tw-relative tw-z-30">
			<div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
				<div class="tw-text-[40px] lg:tw-text-[60px] tw-font-bold tw-leading-none tw-mb-8 lg:tw-mb-12">
					<?php the_title(); ?>
				</div>

				<div class="lg:tw-text-[22px]">
					At Ovention, we stand by the equipment we manufacture, which is why we offer limited warranty protection on our equipment and certain equipment components against defects in materials and workmanship. Read on for our <a href="https://oventionovens.com/terms-of-sale/" style="color: #f78a2c;">warranty information</a>, then complete the warranty registration form for limited warranty protection for your equipment.
				</div>
			</div>
		</div>
		<div class="tw-w-full md:tw-w-3/5 tw-h-full tw-absolute tw-bg-cover tw-bg-left-top tw-bg-no-repeat tw-top-0 tw-right-0 tw-z-20" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/orange-flare.png');"></div>
		<div class="tw-bg-gray-800/80 tw-absolute tw-inset-0 tw-z-10"></div>
	</section>

    <section class="cloud-pattern" style="padding-left: 16px; padding-right: 16px;">

        <div class="row">
            <div class="small-12 white-box">
                <div class="medium-6 columns">
                    <?php the_field('warranty_info_warranty'); ?>
                </div>

                <div class="medium-6 columns">
                    <?php the_field('warranty_info_form'); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();
