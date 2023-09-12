<?php get_header(); ?>

    <section class="text-center md:text-left px-5 py-16 md:py-56 relative">
		<div class="w-full h-64 top-0 left-0 absolute bg-repeat bg-topograph-pattern">
			<div class="absolute inset-0 bg-gradient-to-t from-white via-white/90"></div>
		</div>

        <div class="container relative z-10">
			<div class="flex flex-col md:flex-row items-center justify-center gap-y-16 md:gap-x-20 lg:gap-x-32">
				<div>
					<figure>
						<img src="<?php bloginfo('template_url'); ?>/assets/images/not-found.svg" alt="">
					</figure>
				</div>

				<div>
					<h4 class="mb-4">
						Page Not Found
					</h4>

					<p class="mb-5">
						Sorry, the page you are looking for does not exist.
					</p>

					<a class="button blue" href="<?= get_home_url(); ?>" >Return to Homepage</a>
				</div>
			</div>
        </div>

		<div class="h-32 absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-100"></div>
    </section>

<?php get_footer();
