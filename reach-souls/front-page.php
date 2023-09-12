<?php get_header(); ?>

    <section id="intro" class="text-center md:text-left px-5 relative">
		<div class="container pt-12 md:pt-28 md:pb-60 relative z-10">
			<div class="flex flex-col gap-12 md:flex-row">
				<div class="w-full md:w-3/4">
					<h1 class="text-5xl md:text-7xl leading-none mb-5">
						<?php the_field('home_intro_title'); ?>
					</h1>

					<div class="md:pr-10 mb-6">
						<?php the_field('home_intro_description'); ?>
					</div>

					<?php
					
						if ( get_field('home_intro_button_type') === 'link' ) :
						
						$intro_donation_link = get_field('home_intro_button_link');

					?>

						<a class="button <?php the_field('home_intro_button_color'); ?>" href="<?= $intro_donation_link['url']; ?>" target="<?= esc_attr( $intro_donation_link['target'] ?: '_self' ); ?>">
							<?= $intro_donation_link['title']; ?>
						</a>

					<?php else : ?>

						<?php the_field('home_intro_flexformz'); ?>

					<?php endif; ?>
				</div>
				
				<?php

					if ( get_field('home_intro_side_image') ) :
						
					$intro_side_image = get_field('home_intro_side_image');

				?>

					<div class="w-full md:w-1/2">
						<div class="md:absolute right-0 md:right-8 bottom-0">
							<figure>
								<img class="mx-auto" src="<?= $intro_side_image['url']; ?>" alt="<?= $intro_side_image['alt']; ?>">
							</figure>
						</div>
					</div>

				<?php endif; ?>
			</div>
			
			<div class="absolute left-0 right-0 bottom-0 z-10">
				<div class="translate-y-1/2 relative">
					<div class="sm:w-max text-white text-2xl sm:text-3xl font-helvetica-neue leading-none px-6 md:px-12 py-5 bg-blue-500 rounded-tl-xl rounded-tr-xl">
						<?php the_field('home_doing_more_title'); ?>
					</div>

					<div class="flex flex-col gap-5 md:flex-row items-center px-6 sm:px-12 py-[35px] bg-white sm:rounded-tr-xl rounded-br-xl rounded-bl-xl shadow-xl">
						<div class="w-full md:w-3/5">
							<?php the_field('home_doing_more_description'); ?>
						</div>

						<div class="flex-none">
							<?php
					
								if ( get_field('home_doing_more_button_type') === 'link' ) :
								
								$doing_more_donation_link = get_field('home_doing_more_button_link');

							?>
								<a class="button <?php the_field('home_doing_more_button_color'); ?>" href="<?= $doing_more_donation_link['url']; ?>" target="<?= esc_attr( $doing_more_donation_link['target'] ?: '_self' ); ?>">
									<?= $doing_more_donation_link['title']; ?>
								</a>

							<?php else : ?>

								<?php the_field('home_doing_more_flexformz'); ?>

							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="w-full h-3/5 sm:h-3/4 md:h-full absolute left-0 bottom-0 md:inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('<?php the_field('home_intro_background'); ?>');">
			<div class="block md:hidden absolute -top-1 left-0 right-0 bottom-0 bg-gradient-to-b from-white"></div>
		</div>
	</section>

	<section id="how-we-do" class="px-5 pt-64 md:pb-16 relative">
		<div class="w-full h-56 top-0 left-0 absolute bg-repeat bg-topograph-pattern">
			<div class="absolute inset-0 bg-gradient-to-t from-white via-white/90"></div>
		</div>

		<div class="container relative z-10">
			<div class="flex flex-col md:flex-row">
				<div class="w-full md:max-w-md md:pr-12">
					<div class="text-gold-500 text-center md:text-right font-helvetica-neue font-light">
						<div class="text-9xl">
							<?php the_field('home_how_we_do_amount'); ?>
						</div>

						<div class="text-7xl">
							<?php the_field('home_how_we_do_amount_text'); ?>
						</div>
					</div>
				</div>

				<div class="w-full md:max-w-lg">
					<div class="flex flex-col-reverse md:relative">
						<div class="flex-none w-44 h-80 relative md:absolute md:-top-6 md:-left-20 mx-auto">
							<div class="flex-none flex items-center justify-center w-44 h-44 absolute top-0">
								<div class="flex-none w-44 h-44 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
									<div class="animate-ping rounded-full bg-gold-500/5 border border-gold-500/10 absolute inset-0"></div>
								</div>
								<div class="flex-none w-28 h-28 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
									<div class="animate-ping rounded-full bg-gold-500/5 border border-gold-500/10 absolute inset-0"></div>
								</div>
								<div class="flex-none w-12 h-12 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
									<div class="animate-ping rounded-full bg-gold-500/10 border border-gold-500/30 absolute inset-0"></div>
								</div>
								<div class="flex-none w-2 h-2 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
									<div class="w-2 h-2 rounded-full bg-blue-500"></div>
								</div>
							</div>
							<div class="signal-center"></div>
						</div>

						<div class="text-center md:text-left pt-12 md:pl-12 relative z-10">
							<h4 class="mb-5">
								<?php the_field('home_how_we_do_title'); ?>
							</h4>
		
							<div class="mb-7">
								<?php the_field('home_how_we_do_description'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="eternal-impact" class="px-5 pt-16 pb-16 bg-blue-500 relative">
		<div class="container relative">
			<div class="w-80 md:w-[450px] lg:absolute lg:top-1/2 lg:right-0 mx-auto lg:-translate-y-1/2">
				<img src="<?php bloginfo('template_url'); ?>/assets/images/world.svg" alt="World">
			</div>
			
			<div class="w-full lg:w-3/5 lg:pr-12">
				<div class="text-center lg:text-left mt-10 lg:mt-0 mb-10">
					<h4 class="text-white text-3xl font-helvetica-neue leading-none">
						<?php the_field('home_impact_title'); ?>
					</h4>

					<div class="has-white-content mb-7">
						<?php the_field('home_impact_description'); ?>
					</div>

					<?php
					
						if ( get_field('home_impact_button_type') === 'link' ) :
						
						$impact_donation_link = get_field('home_impact_button_link');

					?>

						<a class="button <?php the_field('home_impact_button_color'); ?>" href="<?= $impact_donation_link['url']; ?>" target="<?= esc_attr( $impact_donation_link['target'] ?: '_self' ); ?>">
							<?= $impact_donation_link['title']; ?>
						</a>

					<?php else : ?>

						<?php the_field('home_impact_flexformz'); ?>

					<?php endif; ?>
				</div>
				
				<?php if ( have_rows('home_impact_mission_list') ) : ?>
					<div class="flex flex-wrap gap-4 justify-center">
						<?php
							while ( have_rows('home_impact_mission_list') ) : the_row();
							$icon = get_sub_field('icon');
						?>
							<div class="group">
								
								<div class="text-center p-5 bg-white/10 group-hover:bg-white border border-white/50 rounded-lg transition-all duration-150 ease-in-out">
									<div class="text-white group-hover:text-blue-500 mb-3 inline-block mx-auto">
										<?php if ( pathinfo( $icon['url'], PATHINFO_EXTENSION ) === 'svg' ) :
										
											$ch = curl_init();

											curl_setopt($ch, CURLOPT_URL, $icon['url']);

											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

											$output = curl_exec($ch);

											curl_close($ch);

											echo $output;
												
										?>

										<?php else : ?>

											<img class="mx-auto" src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>">
											
										<?php endif; ?>
									</div>

									<div class="text-gold-500 text-4xl font-bold has-counter" data-counter="<?php the_sub_field('amount'); ?>">
										0
									</div>

									<div class="text-white text-sm group-hover:text-blue-500 transition-all duration-150 ease-in-out">
										<?php the_sub_field('mission'); ?>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="w-full h-16 md:h-32 absolute -bottom-14 md:-bottom-32 left-0 right-0">
			<div class="poligon-small-down"></div>
			<div class="poligon-big-down"></div>
		</div>
	</section>

	<section id="gospel-efforts" class="px-5 pt-24 pb-48 md:py-52 relative">
		<div class="w-full h-64 top-0 left-0 absolute bg-repeat bg-topograph-pattern">
			<div class="absolute inset-0 bg-gradient-to-t from-white via-white/90"></div>
		</div>

		<div class="container relative z-10">
			<div class="flex gap-8 flex-col-reverse md:flex-row items-center justify-center">
				<div class="w-full md:max-w-lg text-center md:text-left">
					<h4 class="text-3xl font-helvetica-neue leading-none">
						<?php the_field('home_efforts_title'); ?>
					</h4>

					<div class="mb-10">
						<?php the_field('home_efforts_description'); ?>
					</div>

					<?php
					
						if ( get_field('home_efforts_button_type') === 'link' ) :
						
						$efforts_donation_link = get_field('home_efforts_button_link');

					?>

						<a class="button <?php the_field('home_efforts_button_color'); ?>" href="<?= $efforts_donation_link['url']; ?>" target="<?= esc_attr( $efforts_donation_link['target'] ?: '_self' ); ?>">
							<?= $efforts_donation_link['title']; ?>
						</a>

					<?php else : ?>

						<?php the_field('home_efforts_flexformz'); ?>

					<?php endif; ?>
				</div>

				<div class="w-full md:max-w-md">
					<figure>
						<img class="mx-auto" src="<?= get_field('home_efforts_side_image')['url']; ?>" alt="<?= get_field('home_efforts_side_image')['alt']; ?>">
					</figure>
				</div>
			</div>
		</div>
	</section>

	<section id="hope" class="px-5 pt-16 md:pt-0 bg-blue-500 relative">
		<div class="w-full h-16 md:h-32 absolute -top-14 md:-top-32 left-0 right-0">
			<div class="poligon-small-up"></div>
			<div class="poligon-big-up"></div>
			<div class="absolute -top-12 md:-top-4 left-0 right-0 z-30">
				<img class="mx-auto" src="<?php bloginfo('template_url'); ?>/assets/images/golden-cross.svg" alt="Cross">
			</div>
		</div>

		<div class="container relative z-10">
			<div class="text-center md:max-w-3xl mx-auto">
				<h2 class="text-white font-light">
					<?php the_field('home_hope_title'); ?>
				</h2>

				<div class="has-white-content mb-7">
					<?php the_field('home_hope_description'); ?>
				</div>
			</div>

			<div class="md:py-48 relative -mt-20 md:mt-0">
				<div class="w-full relative md:absolute md:top-28 translate-y-20 md:translate-y-0">
					<div class="flex gap-y-7 md:gap-x-5 flex-col md:flex-row items-center md:items-center justify-center">
						<?php foreach ( get_field('home_hope_testimonies') as $testimonie ) : ?>
							<article class="story w-full max-w-[352px] shadow-xl">
								<div class="flex flex-col min-h-[480px] rounded-xl overflow-hidden relative bg-cover bg-top bg-no-repeat" style="background-image: url('<?= get_the_post_thumbnail_url( $testimonie->ID ); ?>');">
									<div class="flex-auto h-full relative">
										<div class="excerpt h-3/5 absolute left-0 right-0 bottom-0">
											<div class="p-5 absolute left-0 right-0 bottom-0">
												<p class="copy text-white text-sm line-clamp-5">
													<?= get_the_excerpt( $testimonie->ID ); ?>
												</p>
											</div>
										</div>
									</div>

									<div class="information flex gap-x-4 items-center justify-between px-5 py-4">
										<div class="flex-none author text-xl font-bold leading-none truncate">
											<?= get_the_title( $testimonie->ID ); ?>
										</div>

										<div class="text-white font-medium">
											<?php the_field('testimonies_single_location', $testimonie->ID ); ?>
										</div>
									</div>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="build-for-times" class="px-5 pt-48 pb-16 md:pt-72 md:pb-24 relative">
		<div class="w-full h-64 top-0 left-0 absolute bg-repeat bg-topograph-pattern">
			<div class="absolute inset-0 bg-gradient-to-t from-white via-white/90"></div>
		</div>

		<div class="container">
			<div class="flex gap-14 flex-col md:flex-row items-center justify-center">
				<div class="w-full md:w-1/2">
					<div class="has-video">
						<?php the_field('home_build_for_times_video'); ?>
					</div>
				</div>

				<div class="w-full md:w-1/2 lg:max-w-md text-center md:text-left">
					<h4>
						<?php the_field('home_build_for_time_title'); ?>
					</h4>

					<p>
						<?php the_field('home_build_for_time_description'); ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section id="salvation" class="px-5 py-12 bg-red-500">
		<div class="container">
			<div class="flex flex-col md:flex-row items-center gap-8 lg:gap-14 md:divide-x md:divide-white">
				<div class="flex-none flex gap-y-4 sm:gap-x-6 flex-col sm:flex-row items-center px-8 py-6 md:py-3 bg-white/10 border border-white/50 rounded-xl">
					
					<figure class="text-white">
						<?php

							$salvation_icon = get_field('home_salvation_icon');

							if ( pathinfo( $salvation_icon['url'], PATHINFO_EXTENSION ) === 'svg' ) :
							
								$ch = curl_init();

								curl_setopt($ch, CURLOPT_URL, $salvation_icon['url']);

								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

								$output = curl_exec($ch);

								curl_close($ch);

								echo $output;

							else : ?>

							<img src="<?= $salvation_icon['url']; ?>" alt="<?= $salvation_icon['alt']; ?>">
							
						<?php endif; ?>
							
					</figure>

					<div>
						<div class="text-gold-500 text-4xl font-bold has-counter" data-counter="<?php the_field('home_salvation_amount'); ?>">
							0
						</div>

						<div class="text-white text-sm group-hover:text-blue-500 transition-all duration-150 ease-in-out">
							<?php the_field('home_salvation_mission'); ?>
						</div>
					</div>
				</div>

				<div class="flex-1 flex gap-6 flex-col lg:flex-row items-center justify-between md:pl-8 lg:pl-14">
					<div class="has-white-content text-center lg:text-left max-w-lg lg:py-5">
						<?php the_field('home_salvation_description'); ?>
					</div>

					<?php
					
						if ( get_field('home_salvation_button_type') === 'link' ) :
						
						$salvation_donation_link = get_field('home_salvation_button_link');

					?>

						<a class="button <?php the_field('home_salvation_button_color'); ?>" href="<?= $salvation_donation_link['url']; ?>" target="<?= esc_attr( $salvation_donation_link['target'] ?: '_self' ); ?>">
							<?= $salvation_donation_link['title']; ?>
						</a>

					<?php else : ?>

						<?php the_field('home_salvation_flexformz'); ?>

					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section id="people" class="px-5 py-16 md:py-9 bg-blue-500/95 bg-topograph-pattern-normal">
		<div class="container">
			<div class="flex gap-12 md:gap-16 flex-col-reverse md:flex-row items-center justify-center">
				<div class="text-center">
					<div class="max-w-lg mx-auto">
						<h4 class="text-white">
							<?php the_field('home_people_title'); ?>
						</h4>
	
						<div class="has-white-content md:px-4 mb-7">
							<?php the_field('home_people_description'); ?>
						</div>

						<?php
					
							if ( get_field('home_people_button_type') === 'link' ) :
							
							$people_donation_link = get_field('home_people_button_link');

						?>

							<a class="button <?php the_field('home_people_button_color'); ?>" href="<?= $people_donation_link['url']; ?>" target="<?= esc_attr( $people_donation_link['target'] ?: '_self' ); ?>">
								<?= $people_donation_link['title']; ?>
							</a>

						<?php else : ?>

							<?php the_field('home_people_flexformz'); ?>

						<?php endif; ?>
					</div>
				</div>

				<div class="w-full max-w-[386px] h-[386px]">
					<img class="w-full h-full object-cover object-top rounded-xl" src="<?= get_field('home_people_side_image')['url']; ?>" alt="<?= get_field('home_people_side_image')['alt']; ?>">
				</div>
			</div>
		</div>
	</section>

<?php get_footer();
