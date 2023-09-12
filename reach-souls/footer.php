		<footer class="px-5 py-14 md:py-16">
			<div class="container">
				<div class="flex flex-col lg:flex-row gap-8 mb-11">
					<div class="flex flex-col items-center lg:items-start gap-y-6 lg:gap-y-11">
						<a href="<?= get_home_url(); ?>">
							<img src="<?php the_field('settings_footer_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>">
						</a>

						<div class="text-center lg:text-left has-links">
							<?php the_field('settings_footer_contact_details', 'option'); ?>
						</div>
					</div>

					<div class="flex-1 flex justify-center">
						<ul id="footer-menu" class="w-full max-w-2xl flex flex-col md:flex-row flex-wrap text-center md:text-left items-center md:items-start md:justify-between gap-y-4">
							<?php
								wp_nav_menu( array(
									'theme_location'  => 'footer_menu',
									'menu'            => '',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => '',
									'menu_id'         => '',
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '%3$s',
									'depth'           => 0,
									'walker'          => new themeslug_walker_nav_menu_header
								));
							?>
						</ul>
					</div>

					<div class="flex-none">
						<div class="text-center mb-5 md:mb-8">
							<?php
								if ( get_field('settings_footer_donation_type', 'option') === 'link' ) :

									$donation_link = get_field('settings_footer_donation_link', 'option');
							?>

								<a class="button" href="<?= $donation_link['url']; ?>" target="<?= esc_attr( $donation_link['target'] ?: '_self' ); ?>">
									<?= $donation_link['title']; ?>
								</a>

							<?php else : ?>

								<?php the_field('settings_footer_donation_flexformz', 'option'); ?>

							<?php endif; ?>
						</div>

						<?php if ( have_rows('settings_footer_non_profit_logos', 'option') ) : ?>
							<div class="flex flex-wrap justify-center gap-4">
								<?php
									while ( have_rows('settings_footer_non_profit_logos', 'option') ) : the_row();
										$non_profit_logo = get_sub_field('non_profit_logo');
								?>
									<div class="flex-none">
										<?php if ( get_sub_field('non_profit_url',) ) : ?>

											<a href="<?php the_sub_field('non_profit_url'); ?>">
												<figure>
													<img src="<?= $non_profit_logo['url']; ?>" alt="<?= $non_profit_logo['alt']; ?>">
												</figure>
											</a>

										<?php else : ?>

											<img src="<?= $non_profit_logo['url']; ?>" alt="<?= $non_profit_logo['alt']; ?>">

										<?php endif; ?>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="flex flex-col md:flex-row lg:flex-row gap-5 items-center justify-between">
					<?php if ( have_rows('settings_footer_social_networks', 'option') ) : ?>
						<div class="flex gap-5 items-center">
							<?php while ( have_rows('settings_footer_social_networks', 'option') ) : the_row(); ?>
								<div>
									<a href="<?php the_sub_field('network_url'); ?>" target="_blank" rel="noopener nofollow">
										<i class="fa-brands <?php the_sub_field('network_icon'); ?>"></i>	
									</a>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<div class="text-center text-sm text-gray-200 has-links">
						<?php the_field('settings_footer_copyright', 'option'); ?>
					</div>
				</div>
			</div>
		</footer>

        <?php wp_footer(); ?>
        
    </body>
</html>
