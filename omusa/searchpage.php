<?php
	/**
	 * Template Name: Search Page
	 */

	get_header();
?>

    <section class="section-quoted pt-24 pb-24 md:pt-56 xl:pt-64">
        <div class="container">
            <div class="headline text-default mx-auto mt-10 md:mt-0">
                Results
            </div>

            <div class="mt-10 pt-10">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                      <div class="mb-6 border-b-2 border-gray-200 pb-4">
                           <h2 class="font-roboto text-red-500 text-2xl mb-1 <?php the_search_query() ?>">
                           		<?php 
                           			if(get_the_title() == "Leadership"){
                           				?>
                           					<div>
                           						<?php 
                           							$search_query = preg_replace('#[ -]+#', '-', get_search_query());
                           							$search_query = strtolower($search_query);
                           							$search_query = urlencode($search_query);
                           						?>
                           					</div>
                           					<a href="<?php the_permalink(); ?>?founder=<?php echo($search_query) ?>"><?php echo get_the_title(); ?></a>
                           				<?php
                           			}
                           			else{
                           				?>
                           					<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                           				<?php
                           			}
                           		?>                                
                            </h2>
                           <div class="text-md text-gray-700-new mb-1"><?php the_time('F j, Y') ?></div>

                          <div class="text-default">
                            <?php echo truncate(get_the_excerpt(), 250); ?>
                          </div>

                      </div>
                <?php endwhile ?>
                <?php else:?>
                    <h1 class="text-center text-red-500 font-roboto text-3xl">No Results for "<?php the_search_query() ?>", Try again.</h1>
                <?php endif; ?>
            </div>

            <?php get_template_part( 'partials/content', 'paginator' ); ?>
        </div>
    </section>

<?php get_footer();
