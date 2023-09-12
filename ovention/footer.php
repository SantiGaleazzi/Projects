<?php

	$footer_buy_now = get_field('footer_buttons_buy_now', 'option');
	$footer_recipe = get_field('footer_buttons_recipe', 'option');

?>	
			<footer class="tw-px-6 tw-bg-gray-800">
				<div class="tw-container">
					<div class="tw-py-14 md:tw-py-16 tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-justify-between">
						<div class="tw-flex-none tw-mb-10 md:tw-mb-0">
							<a href="<?= get_home_url(); ?>">
								<img src="<?php the_field('footer_logo', 'option'); ?>" alt="Ovention Logo">
							</a>
						</div>

						<div class="tw-flex tw-flex-col sm:tw-flex-row tw-items-center tw-gap-y-6">
							<?php if ( $footer_buy_now ) : ?>
								<div class="tw-flex-none sm:tw-mr-6">
									<a class="tw-text-white hover:tw-text-white tw-font-semibold tw-px-10 tw-py-6 tw-bg-orange-900 tw-rounded-2xl tw-inline-flex tw-items-center tw-group" href="<?= $footer_buy_now['url']; ?>" target="<?= esc_attr( $footer_buy_now['target'] ?: '_self' ); ?>">
										<?= $footer_buy_now['title']; ?> <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
									</a>
								</div>
							<?php endif; ?>

							<?php if ( $footer_recipe ) : ?>
								<div class="tw-flex-none">
									<div class="tw-text-white hover:tw-text-white  tw-font-semibold tw-px-10 tw-py-6 tw-bg-orange-500 tw-rounded-2xl tw-inline-flex tw-items-center tw-cursor-pointer tw-group find-rep-btn">
										<?= $footer_recipe['title']; ?> <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<div class="tw-py-10 md:tw-py-16 tw-flex tw-flex-col-reverse lg:tw-flex-row tw-border-y-2 tw-border-x-0 tw-border-solid tw-border-beige-400">
						<div class="tw-flex tw-flex-col sm:tw-flex-row lg:tw-flex-col tw-items-center lg:tw-items-start tw-justify-between lg:tw-justify-start tw-mt-10 lg:tw-mt-0 md:tw-mr-10">
							<div class="tw-text-white has-wysiwyg-14 tw-mb-5 sm:mb-0 lg:tw-mb-24">
								<?php the_field('footer_address', 'option'); ?>
							</div>

							<?php if ( get_field('footer_klc_logo', 'option') ) : ?>
								<div>
									<a href="<?php the_field('footer_klc_url', 'option'); ?>">
										<img src="<?php the_field('footer_klc_logo', 'option'); ?>" alt="KLC Logo">
									</a>
								</div>
							<?php endif; ?>
						</div>

						<div class="tw-flex-1">
							<ul class="footer-menu">
								<?php
									$defaults = array(
										'theme_location'  => 'footer_menu',
										'menu'            => '',
										'container'       => '',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 'navigation',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '%3$s',
										'depth'           => 0,
										'walker'          => new themeslug_walker_nav_menu_header
									);
									wp_nav_menu($defaults);
								?>
							</ul>
						</div>
					</div>

					<div class="tw-py-12">
						<div class="tw-flex tw-flex-col xl:tw-flex-row tw-items-center tw-justify-between">
							<?php if ( have_rows('footer_social_media', 'option') ) : ?>
								<div class="tw-flex-none tw-flex tw-items-center tw-mb-4 xl:tw-mb-0">
									<?php while ( have_rows('footer_social_media', 'option') ) : the_row(); ?>
										<div class="tw-mr-7 last:tw-mr-0">
											<a class="tw-text-white hover:tw-text-white" href="<?php the_sub_field('network_url'); ?>" target="_blank">
												<i class="<?= the_sub_field('network_icon'); ?>"></i>
											</a>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif ?>

							<div class="tw-text-white tw-flex tw-flex-col lg:tw-flex-row tw-items-center tw-leading-none">
								<div class="text-center lg:tw-text-left has-wysiwyg-14 tw-mb-5 lg:tw-mb-0 md:tw-mr-3">
									<?php the_field('footer_copyrights', 'option'); ?>
								</div>

								<?php if ( have_rows('footer_extra_links', 'option') ) : ?>
									<div class="tw-flex-none tw-flex tw-flex-wrap tw-items-center tw-justify-center tw-divide-x tw-divide-solid tw-divide-beige-400 tw-gap-x-2">
										<?php
										
											while ( have_rows('footer_extra_links', 'option') ) : the_row();

											$link = get_sub_field('link');
											
										?>
											<div class="tw-flex-none tw-mb-5 md:tw-mb-0 tw-pl-2 first:tw-pl-0">
												<a class="tw-text-[14px] tw-leading-[12px] tw-text-orange-400 hover:tw-text-orange-400 tw-font-bold tw-underline" href="<?= $link['url']; ?>" target="<?= esc_attr( $link['target'] ?: '_self' ); ?>">
													<?= $link['title']; ?>
												</a>
											</div>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</footer>

			<!-- Demo Request Lightbox -->
			<div class="demo-lightbox">
				<div class="demo-lightbox__form">
					<div class="demo-lightbox__close">
						<a href="#">
							<i class="fas fa-times"></i>
						</a>
					</div>

					<div class="demo-lightbox-container">
						<div class="demo-lightbox-container__title">
							<h1>
								<?php the_field('demo_form_title', 'option'); ?>
							</h1>
						</div>

						<div class="demo-lightbox-container__description">
							<p>
								<?php the_field('demo_form_description', 'options'); ?>
							</p>
						</div>

						<div class="demo-lightbox-container__form">
							<script type="text/javascript" src="//ma.oventionovens.com/form/generate.js?id=22"></script>
						</div>
					</div>
				</div>
				<div class="show-for-small-only scroll-down">
					<p>
						Scroll down to discover more
					</p>
				</div>
			</div>
			<!-- Demo Request Lightbox -->

			<!-- Find a Representative Lightbox -->
			<div class="find-rep-lightbox">
				<div class="find-rep-lightbox__form">
					<div class="find-rep-lightbox__close">
						<a href="#">
							<i class="fas fa-times"></i>
						</a>
					</div>

					<div class="find-rep-lightbox-container">
						<div class="find-rep-lightbox-container__title">
							<h1>
								<?php the_field('find_rep_title', 'option'); ?>
							</h1>
						</div>

						<div class="find-rep-lightbox-container__form">
							<p>
								<?php the_field('find_rep_description', 'options'); ?>
							</p>
						</div>
					</div>
				</div>
			</div>

			<!-- 
			<div class="max-w-sticky" style="display: none;">
				<div class="container-notification" >
					<div class="notification-block">
						<div class="non-eu notification-text">
							<p class="text-notification">Our Site Uses Cookies to Provide the Most Relevant Experience.</p>
							<p class="text-notification">By continuing to use this site, you agree to our use of cookies. <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Find out more here</a></p>
						</div>

						<div class="region-eu notification-text">
							<p class="text-notification">Can We Use Your Data to Better Tailor Your Web Experience? </p>
							<p class="text-notification">We (and our partners) will collect data and use cookies for website and ad personalization, as well as analytics and measurement in an effort to provide the most relevant content. <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Find out more here</a></p>
						</div>
					</div>

					<div class="notification-block">
						<div class="accept-cookie non-eu">
							I accept cookies from this site
						</div>
						<div class="region-eu eu-buttons">
							<div class="accept-eu-cookie eu-button">Yes</div>
							<div class="no-accept-eu-cookie eu-button">No</div>
						</div>
					</div>
				</div>
			</div>
			 -->
			<!-- Find a Representative Lightbox -->

			<?php get_template_part('partials/lightboxes/request-demo'); ?>

			<?php get_template_part('partials/lightboxes/contact'); ?>

			<?php get_template_part('partials/lightboxes/quiz'); ?>

			<?php get_template_part('partials/lightboxes/search'); ?>

			<?php get_template_part('partials/woocommerce/store-button'); ?>

			<script type="text/javascript">
				var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
			</script>

			<!-- <script src="//code.tidio.co/vlrgztcyelatixyu0e3fdf0fmcw2ptav.js" async></script> -->

			<?php wp_footer(); ?>

		</body>
</html>
