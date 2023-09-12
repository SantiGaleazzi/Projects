<?php

	/**
	 * Template Name: Search Page
	 */

	get_header();

?>

    <section class="px-5 py-12">
        <div class="container">
            <div class="text-center text-gold-light text-3xl font-bold mb-10">
                Results for "<?php the_search_query(); ?>"
            </div>

            <?php if ( have_posts() ) : ?>

                <div class="resources-data flex flex-wrap gap-y-6">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
							// If the post belongs to the series.
							if ( has_term('series', 'type') ) :

							// Get the serie info attached to the post.
							$serie_data = wp_get_post_terms( get_the_ID(), 'series', array( 'fields' => 'all') );
							$season_data = wp_get_post_terms( get_the_ID(), 'season', array( 'fields' => 'all') );
						?>
                            <div class="resource-item w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 flex px-1">
								<a href="<?= get_term_link( $serie_data[0]->term_id ) . '?season='. str_replace( 'season-', '', $season_data[0]->slug ) .'&episode='. get_field('series_episode_number'); ?>" target="_blank" class="w-full inline-flex">
									<div class="w-full border-2 border-gray-850 hover:border-white rounded-lg group transition-all duration-100 ease-in-out cursor-pointer">
										<div class="h-40 rounded-lg transition-all duration-100 ease-in-out overflow-hidden relative">
											<div class="w-full h-full flex items-end px-4 py-3 bg-gray-850 bg-center bg-cover bg-no-repeat relative" style="background-image: url('<?php the_post_thumbnail_url('medium'); ?>');">
			    								<i class="far fa-play-circle text-3xl"></i>
											</div>
										</div>

										<div class="text-white text-lg font-bold px-4 py-2">
											<?php the_title(); ?>
										</div>
									</div>
								</a>
							</div>

                         <?php elseif ( has_term('videos', 'type')) : ?>

                            <div class="resource-item w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 flex px-1">
                                <a href="<?php the_permalink(); ?>" target="_blank" class="w-full inline-flex">
                                    <div class="w-full border-2 border-gray-850 hover:border-white rounded-lg group transition-all duration-100 ease-in-out cursor-pointer">
                                        <div class="h-40 rounded-lg transition-all duration-100 ease-in-out overflow-hidden relative">
                                            <div class="w-full h-full flex items-end px-4 py-3 bg-gray-850 bg-center bg-cover bg-no-repeat relative" style="background-image: url('<?php the_post_thumbnail_url('medium'); ?>');">
                                                <i class="far fa-play-circle text-3xl"></i>
                                            </div>
                                        </div>

                                        <div class="text-white text-lg font-bold px-4 py-2">
                                            <?php the_title(); ?>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php else : ?>

                            <div class="resource-item w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 flex px-1">
                                <a href="<?php the_permalink(); ?>" target="_blank" class="w-full inline-flex">
                                    <div class="w-full border-2 border-gray-850 hover:border-white rounded-lg group transition-all duration-100 ease-in-out cursor-pointer">
                                        <div class="h-40 rounded-lg transition-all duration-100 ease-in-out overflow-hidden relative">
                                            <div class="w-full h-full flex items-end px-4 py-3 bg-gray-850 bg-center bg-cover bg-no-repeat relative" style="background-image: url('<?php the_post_thumbnail_url('medium'); ?>');">
                                            </div>
                                        </div>

                                        <div class="text-white text-lg font-bold px-4 py-2">
                                            <?php the_title(); ?>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php endif; ?>

                    <?php endwhile ?>
                </div>

            <?php else: ?>

                <div class="text-center text-gold-light text-3xl">
                    No Results for "<?php the_search_query(); ?>", Try again.
                </div>

            <?php endif; ?>
            
            <!-- Paginator -->
            <?php get_template_part( 'partials/content-paginator' ); ?>
            <!-- Paginator -->

        </div>
    </section>

<?php get_footer();
