<?php 

	$term_id = get_queried_object()->term_id;
	$term = get_term($term_id, 'resources-category' );
	$copy_archive = get_field('copy_archive','options');

	get_header();

?>

<div class="w-full min-h-screen pb-16 pt-3">
	<div class="container mx-auto">
		<div class="header-archive px-6 md:px-12 border-b border-yellow-500 mb-12 text-white pb-10">
			<?php echo $copy_archive; ?>
		</div>
		<div>
			<ul class="cat-buttons__element flex flex-wrap mb-12 category-list justify-center items-center">
		    <?php
		        $args = array(
		            'depth' => 1,
		            'title_li' => '',
		            'taxonomy' => 'resources-category',
		            'echo'               => 1
		        );
		        wp_list_categories($args); 
		    ?>
		     <li><a href="<?php bloginfo('url'); ?>/watch" class="button clear">Clear Filter</a></li>
			</ul>
		</div>
		<div class="w-full flex flex-wrap justify-center archive-categ">
			<?php				
				setup_postdata( $post ); 
				$custom_taxterms = wp_get_object_terms( $post->ID, 'resources-category', array('fields' => 'ids') );
					$args_tax = array(
					'post_type' => 'resources',
					'post_status' => 'publish',
					'paged' => get_query_var( 'paged' ),
					'category_name' => get_query_var('category_name'),
					'child_of'      => $term->term_id,
	        		'parent' => $term->term_id,
	        		'meta_query' => array(
					    array(
					      'key' => 'hide_on_archive',
					      'value' => '1',
					      'compare' => '!=' 
					    )
					),
					'tax_query' => array(
						array(
						    'taxonomy' => 'resources-category',
						    'field' => 'id',
						    'terms' => $custom_taxterms
						)
					)
				); 

				$show_items = new WP_Query( $args_tax );

				if ($show_items->have_posts()) : while ($show_items->have_posts()) :$show_items->the_post(); ?>				
						<?php get_template_part('partials/post', 'item') ?>													
				<?php endwhile; ?>													
				<?php
				wp_reset_query();
				?>
				<?php endif; 
			?>
		</div>
		<div class="pt-20 text-center font-roboto-condensed pagination text-white">
           <?php
           global $show_items;

           $big = 999999999; // need an unlikely integer

           echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $show_items->max_num_pages
           ) );
           ?>
        </div>
	</div>
</div>

<?php get_footer();
