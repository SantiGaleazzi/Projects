<?php get_header(); ?>

<div class="pt-24 md:pt-56">
	<div class="container px-6 lg:px-0 relative">
		<div class="bg-black-500-new shadow-2xl">
			<div class="text-black-600-new text-sm">
				<?php get_template_part('partials/about/navigation'); ?>
			</div>

			<div>
				<div class="text-4xl md:text-5xl text-white-200-new text-center leading-none font-roboto font-light py-6 px-2 bg-red-500">
					<?php the_title();?>
				</div>

				<div class="relative">
					<div class="lg:w-4/5 text-center px-4 md:px-12 py-12 mx-auto text-default has-wysiwyg">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div>

					<div>						

						<div class="px-8 md:px-12 lg:px-16 xl:px-24">
							<div class="text-red-500 text-3xl text-center font-roboto font-light mb-12 md:mb-16">
								<?php the_field('leadership_board_title') ?>
							</div>
							
								
							<div class="flex flex-wrap justify-center">
								<?php if( have_rows('leadership_sub_profiles_repeater') ): ?>
									<?php while( have_rows('leadership_sub_profiles_repeater') ): the_row(); 
											$profile_image_usa = get_sub_field('image_usa');			
										?>
										<div class="sm:w-1/2 lg:w-1/3 px-4 lg:px-10 text-default mb-10 sm:mb-16">
											<?php 
												if($profile_image_usa){
													?>
														<div class="text-center mb-10">
															<img src="<?= $profile_image_usa['url']; ?>" alt="<?= $profile_image_usa['alt']; ?>" class="inline-block" />
														</div>
													<?php
												}	
											?>											
											<div class=" text-center mb-6">
												<div class="font-roboto font-bold text-xl leading-none mb-2">
													<?php the_sub_field('name'); ?>
												</div>
												<div class="font-roboto text-sm leading-none">
													<?php the_sub_field('position'); ?>
												</div>
											</div>
											<div class="text-xs">
												<?php the_sub_field('bio_usa'); ?>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>

						<div class="px-8 md:px-12 lg:px-16 xl:px-24">
							<div class="text-red-500 text-3xl text-center font-roboto font-light mb-12 md:mb-16">
								<?php the_field('leadership_global_board_title') ?>
							</div>

							<div class="flex flex-wrap justify-center">
								<?php if( have_rows('leadership_sub_profiles_global_repeater') ): ?>
									<?php while( have_rows('leadership_sub_profiles_global_repeater') ): the_row(); 
											$profile_image_global = get_sub_field('image_global');
										?>
										<div class="sm:w-1/2 lg:w-1/3 px-4 lg:px-10 text-default mb-10 sm:mb-16">
											<?php 
												if($profile_image_global){
													?>
														<div class="text-center mb-10">
															<img src="<?= $profile_image_global['url']; ?>" alt="<?= $profile_image_global['alt']; ?>" class="inline-block" />
														</div>
													<?php
												}	
											?>
											<div class=" text-center mb-6">
												<div class="font-roboto font-bold text-xl leading-none mb-2">
													<?php the_sub_field('name'); ?>
												</div>
												<div class="font-roboto text-sm leading-none">
													<?php the_sub_field('position'); ?>
												</div>
											</div>
											<div class="text-xs">
												<?php the_sub_field('bio_global'); ?>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>

						<div class="px-8 md:px-8 lg:px-10 xl:px-20">
							<div class="text-red-500 text-3xl text-center font-roboto font-light">
								<?php the_field('leadership_title'); ?>
							</div>

							<div class="flex flex-wrap justify-center pt-16">
								<?php if ( have_rows('leadership_profiles_repeater') ) : ?>
									<?php
										while( have_rows('leadership_profiles_repeater') ) : the_row();

											$profile_image = get_sub_field('image');
									?>
											<div class="sm:w-1/2 lg:w-1/3 px-4 lg:px-10 text-default mb-10 sm:mb-16">
												<?php 
													if($profile_image){
														?>
															<div class="text-center mb-10">
																<img src="<?= $profile_image['url']; ?>" alt="<?= $profile_image['alt']; ?>" class="inline-block" />
															</div>
														<?php
													}	
												?>
												<div class=" text-center mb-6">
													<div class="font-roboto font-bold text-xl leading-none mb-2">
														<?php the_sub_field('name'); ?>
													</div>

													<div class="font-roboto text-sm leading-none">
														<?php the_sub_field('position'); ?>
													</div>
												</div>

												<div class="text-xs">
													<?php the_sub_field('bio'); ?>
												</div>
											</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if( have_rows('founder_member') ): ?>
			<div id="founders" class="w-full bg-gray-50-new pt-12 pb-5">
				<div class="max-w-4xl mx-auto px-5">
					<?php 
						$founders_title = get_field('founders_title');
						if($founders_title ){
							?>
								<h3 class="text-red-500 text-3xl text-center font-roboto font-light mb-5">
									<?php echo($founders_title); ?>
								</h3>
							<?php
						}
					?>
					<?php while( have_rows('founder_member') ): the_row(); 
						$name = get_sub_field('name');	
						$str=preg_replace('/\s+/', '-', $name);		
						$founderSlug = strtolower($str);
						$founder_place = get_sub_field('founder_place');			
						$introduction = get_sub_field('introduction');			
						$full_bio = get_sub_field('full_bio');	
						$founder_photo = get_sub_field('founder_photo');			
					?>
						<div class="w-full flex flex-col-reverse md:flex-row pb-12 md:pb-20 w-full items-center md:items-start justify-between">
							<div class="max-w-founders-copy w-full sm:pr-6 lg:px-0">
								<h4 class="font-roboto text-xl font-bold">
									<?php echo($name); ?>
								</h4>
								<div class="font-roboto text-xxs mb-4">
									<?php echo($founder_place); ?>
								</div>
								<div class="font-lato text-base leading-snug mb-5">
									<?php echo($introduction); ?>
								</div>
								<div id="<?php echo($founderSlug); ?>" class="text-red-200-new text-xs font-lato border-b border-red-200-new pb-3 w-48 cursor-pointer open-founders-lb">
									Read More
								</div>
							</div>
							<div class="max-w-xs w-full lg:pl-8 pb-8 md:pt-0">
								<img src="<?= $founder_photo['url']; ?>" alt="<?= $founder_photo['alt']; ?>"/>
							</div>							
						</div>

						<div data-name="<?php echo($founderSlug); ?>" class="founders-bio-lightbox w-full h-full px-6 py-10 inset-0 fixed flex items-center justify-center z-50 hidden">
						    <div class="close-ligtbox close-founder-lb w-full h-full bg-lightbox absolute z-50"></div>
						    <div class="w-full max-w-2xl p-6 md:px-10 md:py-12 bg-white-pure border-t-8 border-b-8 border-red-500 rounded relative z-50">
						        <div class="close-ligtbox close-founder-lb w-8 h-8 flex items-center justify-center bg-black-700-new rounded-full absolute top-0 right-0 -mt-4 -mr-4 cursor-pointer z-10">
						            <i class="fas fa-times text-white-pure"></i>
						        </div>

						        <div class="h-full overflow-y-auto">
									<div class="w-full flex flex-col md:flex-row pb-1 w-full items-start justify-between">
										<div class="max-w-founders lg:mr-4">
											<h4 class="font-roboto text-xl font-bold">
												<?php echo($name); ?>
											</h4>
											<div class="font-roboto text-xxs mb-4">
												<?php echo($founder_place); ?>
											</div>
											<div class="font-lato w-full max-w-founder-intro text-sm md:text-base leading-snug mb-5">
												<?php echo($introduction); ?>
											</div>
										</div>
										<div class="max-w-founder-photo w-full lg:pl-8 mx-auto md:mx-0 mb-4 md:mb-0">
											<img src="<?= $founder_photo['url']; ?>" alt="<?= $founder_photo['alt']; ?>"/>
										</div>							
									</div>
									<div class="font-lato text-xs founder-full-bio">
										<?php echo($full_bio); ?>
									</div>
						        </div>
						    </div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer();
