<?php get_header(); ?>

	<section class="px-4 py-12 bg-gray-850">
		<div class="container">
			<div class="flex flex-col md:flex-row">
				<!-- Filters -->
				<div class="w-full md:w-2/5 lg:w-2/6 mb-6 md:mb-0">
					<form id="filters-data" class="md:p-8 bg-gray-850 rounded-lg md:shadow-3xl">
						<input type="hidden" name="action" value="resources_search">

						<div class="flex items-center justify-between mb-5">
							<div class="text-3xl leading-none font-bold">
								Filter by:
							</div>

							<div>
								<button id="reset-resources" type="button" class="w-full text-white font-black leading-none px-4 py-3 bg-gold-light rounded">Clear Filter(s)</button>
							</div>
						</div>

						<div class="flex flex-wrap flex-col sm:flex-row md:flex-col">
							<!-- Topics -->
							<?php
								$term_series_topic = get_terms(
									array(
										'taxonomy' => 'topic',
										'orderby' => 'name'
									)
								);

								if ( $term_series_topic ) :
							?>
								<div class="resources-filter w-full sm:w-1/2 md:w-full relative cursor-pointer sm:pl-2 md:pl-0 mb-6" data-taxonomy="topic">
									<div class="option-selected leading-none px-3 py-2 bg-gray-600 bg-opacity-75 flex items-center rounded-lg relative">
										<div class="option-name flex-1 flex items-center text-gray-300" data-filter-name-singular="Topic" data-filter-name-plural="Topics">
											Topic
										</div>

										<div class="flex-none flex items-center">
											<i class="fas fa-angle-down option-icon text-gold-light"></i>
										</div>
									</div>
									
									<div class="options-available text-white leading-none blurry bg-gray-600 bg-opacity-50 rounded-lg absolute top-0 mt-10 overflow-hidden z-20">
										<div class="filter-option">
											<label for="topic_default" class="flex items-center px-3 py-2 hover:bg-gold-light transition-all duration-200 ease-in-out cursor-pointer">
												<input type="radio" id="topic_default" name="taxonomy_topic" value="topic_default" class="mr-2" checked>
												None
											</label>
											<?php foreach ( $term_series_topic as $topic ) : ?>
												<label for="topic_<?= $topic->term_id; ?>" class="flex items-center px-3 py-2 hover:bg-gold-light transition-all duration-200 ease-in-out cursor-pointer">
													<input type="radio" id="topic_<?= $topic->term_id; ?>" name="taxonomy_<?= $topic->taxonomy; ?>" value="topic_<?= $topic->term_id; ?>" data-slug="<?= $topic->slug; ?>" data-name="<?= $topic->name; ?>" data-term-id="<?= $topic->term_id; ?>" class="mr-2">
													<?= $topic->name; ?>
												</label>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<!-- Topics -->

							<!-- Person -->
							<?php
								$term_series_person = get_terms(
									array(
										'taxonomy' => 'person',
										'orderby' => 'name'
									)
								);

								if ( $term_series_person ) :
							?>
								<div class="resources-filter w-full sm:w-1/2 md:w-full relative cursor-pointer sm:pr-2 md:pr-0 mb-6" data-taxonomy="person">
									<div class="option-selected leading-none px-3 py-2 bg-gray-600 bg-opacity-75 flex items-center rounded-lg relative">
										<div class="option-name flex-1 flex items-center text-gray-300" data-filter-name-singular="Person" data-filter-name-plural="People">
											Person
										</div>

										<div class="flex-none flex items-center">
											<i class="fas fa-angle-down option-icon text-gold-light"></i>
										</div>
									</div>
									
									<div class="options-available text-white leading-none blurry bg-gray-600 bg-opacity-50 rounded-lg absolute top-0 mt-10 overflow-hidden z-20">
										<div class="filter-option">
											<label for="person_default" class="flex items-center px-3 py-2 hover:bg-gold-light transition-all duration-200 ease-in-out cursor-pointer">
												<input type="radio" id="person_default" name="taxonomy_person" value="person_default" class="mr-2" checked>
												None
											</label>
											<?php foreach ( $term_series_person as $person ) : ?>
												<label for="person_<?= $person->term_id; ?>" class="flex items-center px-3 py-2 hover:bg-gold-light transition-all duration-200 ease-in-out cursor-pointer">
													<input type="radio" id="person_<?= $person->term_id; ?>" name="taxonomy_<?= $person->taxonomy; ?>" value="person_<?= $person->term_id; ?>" data-slug="<?= $person->slug; ?>" data-name="<?= $person->name; ?>" data-term-id="<?= $person->term_id; ?>" class="mr-2">
													<?= $person->name; ?>
												</label>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<!-- Person -->

							<!-- Year -->
							<?php
								$term_series_year = get_terms(
									array(
										'taxonomy' => 'resource-year',
										'orderby' => 'name',
										'order' => 'DESC'
									)
								);

								if ( $term_series_year ) :
							?>
								<div class="resources-filter w-full sm:w-1/2 md:w-full relative cursor-pointer sm:pl-2 md:pl-0 mb-6" data-taxonomy="resource-year">
									<div class="option-selected leading-none px-3 py-2 bg-gray-600 bg-opacity-75 flex items-center rounded-lg relative">
										<div class="option-name flex-1 flex items-center text-gray-300" data-filter-name-singular="Year" data-filter-name-plural="Years">
											Year
										</div>

										<div class="flex-none flex items-center">
											<i class="fas fa-angle-down option-icon text-gold-light"></i>
										</div>
									</div>
									
									<div class="options-available text-white leading-none blurry bg-gray-600 bg-opacity-50 rounded-lg absolute top-0 mt-10 overflow-hidden z-20">
										<div class="filter-option">
											<label for="year_default" class="flex items-center px-3 py-2 hover:bg-gold-light transition-all duration-200 ease-in-out cursor-pointer">
												<input type="radio" id="year_default" name="taxonomy_resource-year" value="year_default" class="mr-2" checked>
												None
											</label>

											<?php foreach ( $term_series_year as $year ) : ?>
												<label for="year_<?= $year->term_id; ?>" class="flex items-center px-3 py-2 hover:bg-gold-light transition-all duration-200 ease-in-out cursor-pointer">
													<input type="radio" id="year_<?= $year->term_id; ?>" name="taxonomy_<?= $year->taxonomy; ?>" value="year_<?= $year->term_id; ?>" data-slug="<?= $year->slug; ?>" data-name="<?= $year->name; ?>" data-term-id="<?= $year->term_id; ?>" class="mr-2">
													<?= $year->name; ?>
												</label>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<!-- Year -->

							<div class="w-full flex flex-row md:flex-col lg:flex-row items-center md:mb-6">
								<div class="w-full flex-1 pr-6 md:pr-0 lg:pr-6 md:mb-4 lg:mb-0">
									<input type="text" id="search_resources_string" name="search_resources_string" class="w-full text-black leading-none px-4 py-2 bg-white rounded-md placeholder-gray-400" placeholder="Search stories">
								</div>

								<div class="w-auto md:w-full lg:w-auto flex-none">
									<button type="button" id="search-resources" class="w-full text-white text-lg font-semibold leading-none px-6 py-2 bg-gold-light rounded-md">Search</button>
								</div>
							</div>
						</div>
						
						<div class="hidden md:block">
							<div class="mb-6">
								<div class="text-gold-light text-3xl leading-none font-bold mb-3">
									<?php the_field('resources_archive_title', 'options'); ?>
								</div>

								<div class="text-white text-2xl leading-none">
									<?php the_field('resources_archive_subtitle', 'options'); ?>
								</div>
							</div>

							<div class="text-white text-lg font-light has-wysiwyg">
								<?php the_field('resources_archive_description', 'options'); ?>
							</div>
						</div>
						
						<input type="hidden" id="current_page" name="page_number" value="1">
					</form>
				</div>
				<!-- Filters -->

				<div class="w-full md:w-3/5 lg:w-4/6 md:pl-6 lg:pl-12">
					<?php

						$args = array(
							'post_type' => 'resources',
							'post_status' => 'publish',
							'posts_per_page' => 12
						);
							
						$resources_query = new WP_Query( $args );
			
						if ( $resources_query->have_posts() ) :
										
					?>	
						<div class="resources-data flex flex-wrap gap-y-8">
							<?php while ( $resources_query->have_posts() ) : $resources_query->the_post(); ?>

								<?php
									/*
									if ( has_term('series', 'type') && has_term('', 'series') ) :

									$serie_data = wp_get_post_terms( get_the_ID(), 'series', array( 'fields' => 'all') );
									$season_data = wp_get_post_terms( get_the_ID(), 'season', array( 'fields' => 'all') );


									<div class="resource-item w-full sm:w-1/2 lg:w-1/3 flex px-1">
										<a href="<?= get_term_link( $serie_data[0]->term_id ) . '?season='. str_replace( 'season-', '', $season_data[0]->slug ) .'&episode='. get_field('series_episode_number'); ?>" target="_blank" class="w-full inline-flex">
											<div class="w-full border-2 border-gray-850 hover:border-white rounded-lg group transition-all duration-100 ease-in-out cursor-pointer">
												<div class="h-40 rounded-lg transition-all duration-100 ease-in-out overflow-hidden relative">
													<div class="w-full h-full flex items-end px-4 py-3 bg-center bg-cover bg-no-repeat relative" style="background-image: url('<?php the_post_thumbnail_url('medium'); ?>');">
														<i class="far fa-play-circle text-3xl"></i>
													</div>
												</div>

												<div class="py-2">
													<div class="text-white text-lg font-bold px-4">
														<?php the_title(); ?>
													</div>
												</div>
											</div>
										</a>
									</div>

								*/ ?>

									<div class="resource-item w-full sm:w-1/2 lg:w-1/3 flex px-1">
										<a href="<?php the_permalink(); ?>" target="_blank" class="w-full inline-flex">
											<div class="w-full border-2 border-gray-850 hover:border-white rounded-lg group transition-all duration-100 ease-in-out cursor-pointer">
												<div class="h-40 rounded-lg transition-all duration-100 ease-in-out overflow-hidden relative">
													<div class="w-full h-full flex items-end px-4 py-3 bg-center bg-cover bg-no-repeat relative" style="background-image: url('<?php the_post_thumbnail_url('medium'); ?>');">
														<i class="far fa-play-circle text-3xl"></i>
													</div>
												</div>

												<div class="text-white text-lg font-bold px-4 py-2">
													<?php the_title(); ?>
												</div>
											</div>
										</a>
									</div>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>
						</div>
						
						<?php if ( $resources_query->max_num_pages > 1 ) : ?>
							<div class="w-full load-more-resources text-center pt-8">
								<div class="text-white font-bold leading-none px-8 py-3 bg-gold-light rounded-md inline-block cursor-pointer relative">
									Load More

									<div class="loading-spinner absolute top-0 right-0 mt-3"></div>
								</div>
							</div>
						<?php endif; ?>

					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	
<?php get_footer();
