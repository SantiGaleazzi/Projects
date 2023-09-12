		
		<?php get_template_part('partials/newsletter'); ?>

		<footer class="tw-px-5 tw-py-16 tw-bg-blue-900">
			<div class="tw-container tw-max-w-3xl">
				<ul class="footer-menu">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'menu'           => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'     => '%3$s',
							'depth'          => 0,
							'walker'        => new themeslug_walker_nav_menu_header
						));
					?>
				</ul>

				<div class="tw-text-12 tw-flex tw-flex-col md:tw-flex-row tw-items-center md:tw-items-end tw-justify-between tw-mb-8 md:tw-mb-12 tw-gap-8">
					<div class="tw-w-48">
						<div class="tw-text-center md:tw-text-left tw-text-white">
							<?php the_field('settings_footer_rights', 'option'); ?>
						</div>
					</div>

					<div class="tw-flex-none tw-flex tw-flex-col md:tw-flex-row tw-items-center md:tw-items-end">

						<?php if ( get_field('settings_footer_charity_logo', 'option') ) : ?>
							<a class="tw-inline-block" href="<?php the_field('settings_footer_charity_link', 'option'); ?>">
								<img src="<?php the_field('settings_footer_charity_logo', 'option'); ?>" alt="Charity Naviigator">
							</a>
						<?php endif; ?>

						<div class="tw-w-20 md:tw-w-0 md:tw-h-12 tw-my-4 md:tw-my-0 md:tw-mx-8 tw-border-b md:tw-border-b-0 md:tw-border-r tw-border-solid tw-border-white/40"></div>

						<?php if ( have_rows('settings_footer_social_media', 'option') ) : ?>
							<div class="tw-flex tw-items-center tw-gap-x-4">
								<?php
									while ( have_rows('settings_footer_social_media', 'option') ) : the_row();
										$network_icon = get_sub_field('network_icon');
								?>
										<a class="tw-inline-block" href="<?php the_sub_field('network_url'); ?>">
											<img src="<?= $network_icon['url']; ?>" alt="<?= $network_icon['alt']; ?>">
										</a>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="tw-flex-none tw-text-center md:tw-text-right tw-text-white has-wysiwyg">
						<?php the_field('settings_footer_address', 'option'); ?>
					</div>
				</div>

				<div class="tw-text-center tw-text-beige-100 tw-text-xs">
					&copy; <?= date('Y'); ?> <?php bloginfo('name'); ?>
				</div>
			</div>
		</footer>

	</div> <!-- /wrap -->

		<?php wp_footer();?>

		<!--[if lte IE 8 ]>
		<script src="<?php get_bloginfo('template_url'); ?>/js/ie8.js"></script>
		<![endif]-->

		<!--[if lt IE 8 ]>
		<script src="<?php get_bloginfo('template_url'); ?>/js/ie7.js"></script>
		<![endif]-->
		
		<?php if ( preg_match('/staging|dev/', $_SERVER['HTTP_HOST']) ) : ?>
			<script>
				jQuery(function($) {

					$('a[href^="https://secure.kidsalive.org"]').each(function() {
						var href = $(this).attr('href');
						$(this).attr('href', href.replace(/https:\/\/secure.kidsalive.org/, 'http://proto-secure.kidsalive.org'));
					});

					$('form[action^="https://secure.kidsalive.org"]').each(function() {
						var href = $(this).attr('action');
						$(this).attr('action', href.replace(/https:\/\/secure.kidsalive.org/, 'http://proto-secure.kidsalive.org'));
					});
					
				});
			</script>
		<?php endif;?>

		<script>
			jQuery(function($) {
				$('.weatherwidget-io').parent('div').css('width','100%').css('max-width','500px');
			});
		</script>

		<?= get_ad('footer-tags'); ?>
	</body>
</html>
