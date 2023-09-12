<?php
	/**
	* Template Name: Full Width Template
	*/

	get_header();
?>

<div class="pt-24 md:pt-56 pb-24">
	<div class="container px-6 lg:px-0 relative">
		<div class="bg-black-500-new bottom-shadow">
			<div class="text-black-600-new text-sm">
				<?php 
					if ($post->post_parent) {
					    $ancestors = get_post_ancestors($post->ID);
					    $root = count($ancestors) - 1;
				        $parent = $ancestors[$root];
					} else {
					    $parent = $post->ID;
					}
					 
					$children = get_pages('child_of='.$parent);
					$child_pages = array(1);
					 
					foreach($children as $child) {
					    array_push($child_pages,$child->ID);
					}
					$all_pages = implode(",",$child_pages);
					 
					if ( count( $children ) != 0 ) {
						echo '<ul class="submenu-navigation flex flex-wrap justify-center md:justify-between">'.
					    	wp_list_pages( 'title_li=&sort_column=menu_order&echo=0&include=' . $all_pages )
					    .'</ul>';
					}
				?>
			</div>

			<div>
				<div class="text-4xl md:text-5xl text-white-200-new text-center leading-none font-roboto font-light py-6 px-2 bg-red-500">
					<?php the_title();?>
				</div>

				<div class="relative pb-12">
					<div class="lg:w-4/5 px-4 md:px-12 py-12 mx-auto text-default">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div>
					
					<div>
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
												<div class="text-center mb-10">
													<img src="<?= $profile_image['url']; ?>" alt="<?= $profile_image['alt']; ?>" class="inline-block" />
												</div>

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

						<div class="px-8 md:px-12 lg:px-16 xl:px-24">
							<div class="text-red-500 text-3xl text-center font-roboto font-light mb-12 md:mb-16">
								<?php the_field('leadership_board_title') ?>
							</div>
							
								
							<div class="flex flex-wrap justify-center">
								<?php if( have_rows('leadership_sub_profiles_repeater') ): ?>
									<?php while( have_rows('leadership_sub_profiles_repeater') ): the_row(); ?>
										<div class="w-1/2 sm:w-1/3 lg:w-1/5 text-default mb-10">
											<div class="font-bold mb-1">
												<?php the_sub_field('name'); ?>
											</div>

											<div class="mb-1">
												<?php the_sub_field('city'); ?>
											</div>

											<div class="italic">
												<?php the_sub_field('position'); ?>
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
									<?php while( have_rows('leadership_sub_profiles_global_repeater') ): the_row(); ?>
										<div class="w-1/2 sm:w-1/3 lg:w-1/5 text-default mb-10">
											<div class="font-bold mb-1">
												<?php the_sub_field('name'); ?>
											</div>

											<div class="mb-1">
												<?php the_sub_field('city'); ?>
											</div>

											<div class="italic">
												<?php the_sub_field('position'); ?>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>

						<div class="max-w-4xl px-4 mx-auto">
							<?php
								if(have_rows('certifications')){
									while(have_rows('certifications')){
									   	the_row(); 
									   	$item = get_sub_field('item');    	            
									   	?> 
									            <?php
									                if( have_rows('item') ):
									                    while ( have_rows('item') ) : the_row(); 
									                        $logo = get_sub_field('logo'); 
									                        $name = get_sub_field('name'); 
									                        $copy = get_sub_field('copy');?>
									                                <?php
																		if($logo ){ ?>		
																			<div class="text-black-600-new pb-20">		
																				<div class="text-left w-full inline-block align-middle">
																					<div>
																						<div class="font-26 text-red-200-new pb-10 px-10 font-semibold text-center"><?=$name?></div>
																					</div>
																					<div class="flex flex-col lg:flex-row justify-center lg:justify-between">					
																						<div class="inline-block align-middle max-150 mx-auto lg:mx-0 mb-2 lg:mb-0">
																							<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" widh="150">
																						</div>
																					<div class="pl-0 lg:pl-10 w-full lg:max-w-2xl text-base text-center md:text-left leading-loose font-normal"><?=$copy?></div>	
																					</div>
																				</div>	
																			</div>
																			<?php
																		}
																	?>						
									                            <?php
									                    endwhile;
									                endif;
									            ?>
									    <?php
									}
								}
							?>
						</div>

						<div class="max-w-4xl mx-auto px-4 md:px-16">
							<div class="flex flex-wrap justify-between px-10 anual-reports">
								<?php
									if(have_rows('anual_reports')){
										while(have_rows('anual_reports')){
										   	the_row(); 
										   	$item = get_sub_field('item');    	            
										   	?> 
										            <?php
										                if( have_rows('item') ):
										                    while ( have_rows('item') ) : the_row(); 
										                    	$link = get_sub_field('link');
										                        $year = get_sub_field('year'); 
										                        $copy = get_sub_field('copy');?>
										                                <?php
																			if($year ){ ?>		
																					<a href="<?php echo esc_url( $link ); ?>" rel="nofollow" target="_blank">
																						<div class="w-40 text-left">
																						<div class="text-red-200-new font-32 font-normal"><span class="underline"><?=$year?></span><span>></span></div>
																						<div class="text-base font-normal text-black-600-new"><?=$copy?></div>
																					</div>	
																					</a>
																			<?php
																			}
																		?>						
										                            <?php
										                    endwhile;
										                endif;
										            ?>
										    <?php
										}
									}
								?>
							</div>
							
							<div class="text-base text-black-600-new pt-16 text-left font-normal">
								<?php the_field('anual_reports_subtitle'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
