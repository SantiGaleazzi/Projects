		<footer class="px-5 py-6 bg-zinc-900">
			<div class="container">
				<div class="flex flex-col sm:flex-row items-center justify-between gap-y-4">
					<?php if ( have_rows('footer_settings_social_networks', 'options') ) : ?>
						<div class="flex items-center gap-x-4">
							<?php while ( have_rows('footer_settings_social_networks', 'options') ) : the_row(); ?>
								<div>
									<a href="<?php the_sub_field('url'); ?>" target="_blank" rel="noopener nofollow">
										<i class="fa-brands fa-<?php the_sub_field('network'); ?> text-zinc-400 hover:text-yellow-300 text-xl transition-colors duration-200 ease-in-out"></i>
									</a>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<div>
						<p class="text-white text-sm">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
					</div>
				</div>
			</div>
		</footer>
        <?php wp_footer(); ?>
        
    </body>
</html>
