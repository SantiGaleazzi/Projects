<?php
	
	$logo_footer = get_field('logo_footer','options');
	$organizations = get_field('organizations','options');
	$donation_link = get_field('footer_donation_button', 'options');
	$donation_link_target = $donation_link['target'] ? $donation_link['target'] : '_self';
	
?> 
	<?php if ( !is_page_template( array('templates/template-donation.php', 'templates/rd-form.php' ) ) ) : ?>

		<?php if ( !is_page_template( array('templates/template-no-header.php', 'templates/virtuos-form.php', 'templates/rd-form.php', 'templates/virtuous-embed-lp.php') ) ) : ?>
			<section id="newsletter-form" class="w-full bg-red-500 py-6 px-4 form-subscribe">
				<div class="container">
					<div class="flex items-center flex-col lg:flex-row justify-between">
						<div class="flex-none text-center lg:text-left md:mb-6 lg:mb-0">
							<h1 class="text-2xl font-roboto text-white-pure m-0"><?php the_field('settings_newsletter_title', 'option'); ?></h1>
							<div class="text-sm font-lato text-white-pure"><?php the_field('settings_newsletter_subtitle', 'option'); ?></div>
						</div>

						<div class="w-full lg:w-auto flex-1 lg:flex lg:justify-end lg:pl-12">
							<script src=https://cdn.virtuoussoftware.com/virtuous.embed.min.js data-vform="C5CD0214-06CE-4140-B797-83663CF6CCCF" data-orgId="674" data-isGiving="false" data-dependencies="[]"></script>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<footer class="bg-footer px-4 py-12 lg:py-20">
			<div class="container flex flex-wrap flex-col lg:flex-row justify-between">
				<div class="flex-1 flex flex-col md:flex-row justify-between mb-10 lg:pr-10 xl:pr-32">
					<div class="text-center md:text-left sm:mb-10 lg:mb-0">
						<div class="mb-6 md:mb-10">
							<a href="<?= get_home_url(); ?>" class="inline-block">
								<?php if ( $logo_footer ) : ?>
									<img src="<?= esc_url($logo_footer['url']); ?>" alt="<?= esc_attr($logo_footer['alt']); ?>">
								<?php endif; ?>
							</a>
						</div>
						
						<div class="text-xs text-gray-50-new">
							<div class="font-semibold">
								<?php the_field('footer_organization_name', 'options'); ?>
							</div>

							<div>
								<?php the_field('footer_address', 'options'); ?>
							</div>
							
							<?php if ( have_rows('footer_extra_links_repeater', 'options') ) : $counter = 0;?>
								<div class="flex flex-wrap justify-center md:justify-start">
									<?php
										while( have_rows('footer_extra_links_repeater', 'options') ): the_row();

										$link = get_sub_field('link');
										$link_target = $link['target'] ? $link['target'] : '_self';

									?>

										<a href="<?= $link['url']; ?>" targe="<?= esc_url($link_target); ?>" class="text-red-500 underline <?= $counter == 0 ? 'mr-3' : '' ; ?>"><?= $link['title']; ?></a>
									<?php
										$counter++;
										endwhile;
									?>
								</div>
							<?php endif; ?>
							
							<div>
								&copy; <?= date('Y'); ?> <?php the_field('copyright','options'); ?>
							</div>
						</div>
					</div>

					<div class="flex flex-col sm:flex-row justify-center lg:justify-between">
						<ul class="menu-footer text-sm text-gray-50-new flex flex-col sm:flex-row justify-between">
							<?php
								$defaults = array(
									'theme_location'  => 'footer_menu',
									'menu'            => '',
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
									'items_wrap' => '%3$s',
									'depth'           => 0,
									'walker'        => new themeslug_walker_nav_menu_header
								);
								wp_nav_menu($defaults);
							?>
						</ul>

						<div class="flex flex-col sm:flex-col justify-center sm:justify-start">
							<ul class="stories-menu text-sm text-gray-50-new flex flex-col sm:flex-row justify-between">
								<?php
									$defaults = array(
										'theme_location'  => 'footer_stories',
										'menu'            => '',
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
										'items_wrap' => '%3$s',
										'depth'           => 0,
										'walker'        => new themeslug_walker_nav_menu_header
									);
									wp_nav_menu($defaults);
								?>
							</ul>

							<div class="mt-8">
								<div class="text-xs text-center sm:text-left text-gray-50-new font-bold mb-4 uppercase">
									Partners
								</div>
								<?php if ( have_rows('partners_list_repeater', 'options') ): ?>
									<?php
										while ( have_rows('partners_list_repeater', 'options') ) : the_row();
											$partner_logo = get_sub_field('logo'); 
											$partner_name = get_sub_field('name');
											$partner_link = get_sub_field('link');
									?>
											<div class="flex items-center justify-center sm:justify-start mt-5">
												<?php
													if ( $partner_link ) :
													$partner_link_target = $partner_link['target'] ? $partner_link['target'] : '_self';
												?>
													<a href="<?= $partner_link['url']; ?>" target="<?= esc_attr($partner_link_target); ?>" class="inline-block">
														<img src="<?= esc_url($partner_logo['url']); ?>" alt="<?= esc_attr($partner_logo['alt']); ?>" class="inline-block">
														<?php if ( $partner_name ) : ?>
															<div class="text-sm text-gray-50-new ml-3 inline-block">
																<?= $partner_name; ?>
															</div>
														<?php endif; ?>
													</a>
												<?php else : ?>
													<div>
														<img src="<?= esc_url($partner_logo['url']); ?>" alt="<?= esc_attr($partner_logo['alt']); ?>" class="inline-block">
														<?php if ( $partner_name ) : ?>
															<div class="text-sm text-gray-50-new ml-3 inline-block">
																<?= $partner_name; ?>
															</div>
														<?php endif; ?>
													</div>
												<?php endif; ?>
											</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="flex flex-col sm:flex-row lg:flex-col">
					<div class="sm: lg:flex-none flex-1 lg:w-64 flex flex-col justify-between sm:pr-8 lg:pr-0 mb-8 sm:mb-0 lg:mb-8">
						<?php if ( is_page_template( array('templates/template-no-header.php', 'templates/virtuos-form.php', 'templates/rd-form.php', 'templates/virtuous-embed-lp.php') ) ) : ?>
							<div class="w-full flex imte-center mb-3">
								<div class="text-center">
									<div class=" leading-none text-white-pure" style="font-size: 10px;">
										Mode:
									</div>
									<div class="switch-color text-xs text-white-pure font-black">
										Light
									</div>
								</div>
										
								<!-- Theme Switcher -->
								<?php get_template_part('partials/theme-switcher'); ?>
								<!-- Theme Switcher -->
							</div>
						<?php endif; ?>

						<div class="flex-none mb-5">
							<a href="<?= $donation_link['url']; ?>" target="<?= esc_url($donation_link_target); ?>" class="w-full text-center text-xl leading-none text-white-pure font-black px-10 py-3 bg-red-500  inline-block"><?= $donation_link['title']; ?></a>
						</div>

						<div class="flex-1 flex flex-col sm:flex-row items-center">
							<div class="w-full font-semibold border-b border-gray-400 mb-4 md:mb-0">

								<form role="search" action="<?php echo site_url('/'); ?>" method="get" id="search_footer">
									<div class="relative">
										<input id="q" type="text" name="s" placeholder="SEARCH" value="<?php the_search_query() ?>"  class="w-full text-xs font-semibold pr-6 py-2 bg-transparent text-gray-400 placeholder-gray-400">
										<div class="absolute top-0 right-0 mt-1">
											<i class="fas fa-search text-sm text-gray-400"></i>
										</div>
									</div>
								</form>
							</div>

							<?php if ( have_rows('social_networks_repeater', 'options') ) : ?>
								<div class="flex items-center">
									<?php
										while( have_rows('social_networks_repeater', 'options') ): the_row();
									?>
										<div class="pl-4">
											<a href="<?php the_sub_field('url'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Social Media"><i class="fab <?php the_sub_field('network');?> text-2xl text-gray-400"></i></a>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<div class="lg:w-64 flex flex-wrap items-center justify-center">
						<?php if ( have_rows('organizations','options') ) : ?>
							<?php while ( have_rows('organizations','options') ) : the_row(); 
									$image = get_sub_field('image');
							?>
								<div class="mr-4 mb-4">
									<img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" class="logo-organization">
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</footer>

	<?php endif; ?>

		<!-- Church Ligtbox Section -->
		<?php get_template_part('partials/for-churches/church-lightbox'); ?>
    	<!-- Church Ligtbox Section -->

		<!-- Quiz Lightbox -->
		<?php get_template_part('partials/lightboxes/quiz'); ?>
		<!-- Quiz Lightbox -->

        <?php wp_footer(); ?>
        
    </body>
</html>
