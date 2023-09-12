<?php 
	$user = wp_get_current_user();
		if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ) {
			?>
				<?php 
					get_header();  
				?>
			   	    <section class="w-full pt-28 lg:pt-16 pb-40 bg-blue-500">
				    	<div class="main-container md:pt-44 lg:pt-0 text-right md:mb-24">
				    		<div class="max-w-825 px-2 md:px-7">
				    			<h1 class="font-noto-extra-cond-bold text-white text-2xl md:text-3xxl text-left mb-8">The No Apologies<sup>™</sup> Facilitator Guide</h1>
				    			<div class="sm:px-10 xl:px-0 border-t border-gray-300 pt-10">
									<?php 

										$cat_args = array (
											'taxonomy' => 'coaches-topic',
										);
										
										$categories = get_categories ( $cat_args );

										foreach ( $categories as $category ) {
											$cat_query = null;
											$args = array (
											    'order' => 'DESC',
											    'orderby' => 'date',
											    'posts_per_page' => -1,
											    'post_type' => 'coaches',
											    'taxonomy' => 'coaches-topic',
											    'term' => $category->slug
											);

											$cat_query = new WP_Query( $args );
											

											if ( $cat_query->have_posts() ) {					

												echo "<div>";
												echo "<div class='py-4 pl-4 pr-10 md:px-4 text-white text-2xbase sm:text-base bg-blue-400 font-bold text-left w-full cursor-pointer rounded mb-4 accordion-title relative'>". $category->name ."</div>";						
												echo "<div class='pb-4 accordion-panel hidden'>";
												    while ( $cat_query->have_posts() ) {
												        $cat_query->the_post();		

												        ?>
												            <div class="w-full text-white text-left text-2xbase sm:text-base border-b border-blue-700 px-7 py-3 cursor-pointer">
												            	<div class="title-before"></div>
												                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="relative no-underline"><?php the_title(); ?></a>
												            </div>
												        <?php
												    }
												echo "</div>";
												echo "</div>";
											}
											wp_reset_postdata();
										}
									?>
								</div>
				    		</div>
				    	</div>
				    </section>
			<?php 	
		}
		else{
			?>
				<?php 
					get_header('website');  
				?>
					<?php get_template_part('partials/404-not-found'); ?>
			<?php
		}
	?>

<?php get_footer();
