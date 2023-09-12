<?php
    
    get_header();

    $thumbnail_image = get_the_post_thumbnail_url();
	$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');
    
    $post_term = get_the_terms( $post->ID, 'long-regions' );
    $post_type_of_works = get_the_terms( $post->ID, 'long-type-of-work' );

    $reference_link = get_field('long_term_link_static') ? get_field('long_term_link_static') : get_field('long_term_link') ;
    
    /*
    
    $number_of_photos_in_gallery = get_field('long_term_gallery');

    if ( $number_of_photos_in_gallery ) {

        $number_of_photos_in_gallery = count( $number_of_photos_in_gallery );

    }

    */

    $has_applied_filters = $_SERVER['QUERY_STRING'];

?>

<section class="pt-16 md:pt-40 xl:pt-64">
	<div class="container bg-black-500-new shadow-2xl border-b-4 border-red-500">
		<div class="text-white-pure px-6 md:px-12 lg:px-24 pt-10 lg:pt-16 pb-32 bg-red-500">
            <?php if ( strpos( $has_applied_filters, 'virtual') !== false ) : ?>
                < <a href="/virtual-opportunities/<?= '?' . $has_applied_filters; ?>" class="text-xs font-bold underline" >BACK TO THE SEARCH PAGE</span></a>
            <?php else : ?>
                < <a href="/long-term-opportunities/<?= '?applied-filters=' . $has_applied_filters; ?>" class="text-xs font-bold leading-none underline" >BACK TO THE SEARCH PAGE</span></a>
            <?php endif; ?>
		</div>

		<div class="px-6 md:px-12 lg:px-24 -mt-32 pt-3">
			<div>	
				<!-- Post Copy -->
				<div class="bg-page">
                    <div>
						<img src="<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?> thumbnail" class="w-full" />
					</div>
                    
                    <!-- Job Details -->
					<div class="px-6 sm:px-12 xl:px-24 pt-6 md:pt-16 pb-10 shadow-2xl">

                        <div class="flex flex-col lg:flex-row mb-6">
                           <div class="flex-1 lg:pr-12 border-b lg:border-b-0 lg:border-r border-separator">
                                <?php if ( $post_type_of_works ) : ?>
                                    <div class="text-orange-500 text-xs font-bold uppercase">
                                        <?php

                                            $taxo_string = '';

                                            foreach($post_type_of_works as $taxonomy) {
                                                        
                                                $taxo_string .= $taxonomy->name . '/';
                                            }

                                            $taxo_string = substr_replace($taxo_string, '', -1);
                                            $taxo_string = str_replace('/', '<span class="text-orange-500 px-1">/</span>', $taxo_string);
                                        ?>
                                        <?= $taxo_string ? $taxo_string : '&nbsp;'; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="text-3xl md:text-4xl text-default font-roboto font-light leading-snug mb-6">
                                    <?php the_title(); ?>					
                                </div>

                                <div class="w-full md:w-auto text-default has-wysiwyg">
                                    <?php the_field('long_term_description'); ?>
                                </div>
                           </div>

                           <div class="lg:w-1/3 xl:w-1/4 pt-6 lg:pt-0 lg:pl-12">
                                <div class="text-orange-500 text-xs font-bold uppercase mb-6">
                                    <?= $post_term[0]->name; ?>
                                </div>

                                <div class="mb-5">
                                    <div class="text-default font-black">
                                        Pay Structure
                                    </div>

                                    <div class="text-default">
                                        <?= get_field('long_term_full_part_time') ? get_field('long_term_full_part_time') : '-'; ?>
                                    </div>
                                </div>
                                
                                <?php if ( !empty(get_field('long_term_commitment')) ) : ?>
                                    <div>
                                        <div class="text-default font-black">
                                            Commitment Length
                                        </div>

                                        <div class="text-default">
                                            <?php the_field('long_term_commitment'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                           </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center">
                            <div class="w-full md:w-auto md:flex-none mb-5 md:mb-0">
                                <a href="<?= $reference_link; ?>" target="_blank" class="w-full md:w-auto text-center text-white-pure text-xl font-black leading-none px-10 py-3 bg-red-500 inline-block">Get Started Now</a>
                            </div>

                            <div class="w-full md:w-auto text-center text-default md:pl-6 ">
                                <a href="https://www.om.org/choose-your-country" class="inline-block mr-2">Not a U.S. Citizen or Permanent Resident?</a> <a href="https://www.om.org/choose-your-country" class="text-red-500 font-black underline">Get Started Here »</a>
                            </div>
                        </div>
					</div>
                    <!-- Job Details -->
                    
                    <!-- Included -->
                    <div class="sm:px-12 xl:px-24 pt-16">

                        <!-- Requirements -->
                        <div class="flex flex-col md:flex-row text-default mb-6">
                            <div class="w-32 lg:w-48 font-black mb-3">
                                Information & Requirements
                            </div>

                            <div class="flex-1 has-wysiwyg">
                                <?php the_field('long_term_requirements'); ?>
                            </div>
                        </div>
                        <!-- Requirements -->

                    </div>
                    <!-- Included -->

                    <!-- Photos -->
                    <?php /*
                    <div class="sm:px-12 xl:px-24 pt-8 pb-10">

                        <?php
                            // This is the default post photo gallery
                            if( have_rows('long_term_gallery') ) : ?>

                            <div class="text-default text-3xl text-center font-roboto font-light mb-6">
                                Photos from <strong><?= $post_term[0]->name; ?></strong>
					        </div>

                            <div class="flex flex-wrap">
                                <?php
                                    while( have_rows('long_term_gallery') ) : the_row();

                                    $classes = $number_of_photos_in_gallery > 4 ? 'w-1/4' : 'w-1/' . $number_of_photos_in_gallery;

                                ?>
                                    <div class="w-full sm:w-1/2 h-48 md:<?= $classes; ?> bg-cover bg-center bg-no-repeat" style="background-image: url('<?= the_sub_field('photo_url'); ?>');"></div>
                                <?php endwhile; ?>
                            </div>

                        <?php
                            else:

                            // This gallery can be found under the Theme Settings options
                            // If no pictures were found on the post gallery this acts like a callback gallery

                        ?>
                            <?php

                                $photos_gallery = get_field('short_term_settings_default_gallery', 'options') ;
                                $number_of_photos_in_settings_gallery = count( get_field('short_term_settings_default_gallery', 'options') );
                                
                                if ( $photos_gallery ) :
                            
                            ?>
                                <div class="text-default text-3xl text-center font-roboto font-light mb-6">
                                    More Photos
					            </div>

                                <div class="flex flex-wrap">
                                    <?php

                                        foreach ( $photos_gallery as $photo ) :

                                            $classes = $number_of_photos_in_settings_gallery > 4 ? 'w-1/4' : 'w-1/' . $number_of_photos_in_settings_gallery;

                                    ?>
                                        <div class="w-1/2 h-48 md:<?= $classes; ?> bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $photo; ?>');"></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <!-- Photos -->
                    */ ?>
                    
                    <!-- Application Deadline -->
                    <div class="flex flex-col md:flex-row items-center justify-center py-6 border-t border-b border-separator">
                        <div class="w-full md:w-auto md:flex-none mb-5 md:mb-0">
                            <a href="<?= $reference_link; ?>" target="_blank" class="w-full md:w-auto text-center text-white-pure text-xl font-black leading-none px-10 py-3 bg-red-500 inline-block">Get Started Now</a>
                        </div>

                        <div class="w-full md:w-auto text-center text-default md:pl-6 ">
                            <a href="https://www.om.org/choose-your-country" class="inline-block mr-2">Not a U.S. Citizen or Permanent Resident?</a> <a href="https://www.om.org/choose-your-country" class="text-red-500 font-black underline">Get Started Here »</a>
                        </div>
                    </div>
                    <!-- Application Deadline -->

					<div class="text-xs text-red-500 font-bold py-6 md:py-10">
                        <?php if ( strpos( $has_applied_filters, 'virtual') !== false ) : ?>
                            < <a href="/virtual-opportunities/<?= '?' . $has_applied_filters; ?>" class="text-xs font-bold underline" >BACK TO THE SEARCH PAGE</span></a>
                        <?php else : ?>
                            < <a href="/long-term-opportunities/<?= '?applied-filters=' . $has_applied_filters; ?>" class="text-xs font-bold leading-none underline" >BACK TO THE SEARCH PAGE</span></a>
                        <?php endif; ?>
					</div>
				</div>
				<!-- Post Copy -->
			</div>
		</div>

	</div>
</section>

<section class="px-6 py-10 md:py-16">
	<div class="container">
		<div class="text-center text-red-500 text-4xl font-roboto font-light mb-6 md:mb-8">
            Jobs from <?= $post_term[0]->name; ?>
		</div>

		<div class="flex flex-wrap flex-col sm:flex-row">
			<?php

				$all_related_posts = new WP_Query( array(
						'post_type' => 'long-term',
						'posts_per_page' => 3,
						'orderby' => 'rand',
						'status' => 'published',
						'post__not_in'   => array( $post->ID ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'long-regions',
                                'field'    => 'slug',
                                'terms'    => $post_term[0]->slug,
                            ),
                        ),
					)
				);

				if ( $all_related_posts->have_posts() ) :

			?>
				<?php
					while ( $all_related_posts->have_posts() ) : $all_related_posts->the_post();

					$thumbnail_image = get_the_post_thumbnail_url();
                    $default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

				?>
					<div class="sm:w-1/2 lg:w-1/3 flex px-3 py-3">
						<article <?php post_class(esc_attr('bg-black-500-new shadow-2xl rounded flex flex-col')); ?>>		
							<div class="thumb">
								<a href="<?php the_permalink() ?>">
									<img src="<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>" alt="" class="w-full h-48 object-cover object-center">
								</a>
							</div>

							<div class="px-6 py-4 bg-red-500">
								<div class="text-2xl text-white-pure font-bold leading-tight mb-1">
									<?= mb_strimwidth(get_the_title(), 0, 60, ''); ?>
								</div>

								<div class="text-xs text-orange-500 font-bold uppercase">
									<?php
										// Post taxonomies
										$taxonomies = array('long-type-of-work', 'long-regions');
										$taxo_string = '';

										foreach($taxonomies as $taxonomy) {

                                            $taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
                                                    
                                            if ( !empty($taxonomies_associated) ) {
                                                    
                                                foreach ( $taxonomies_associated as $term) {
                                                    
                                                    $taxo_string .= $term . '/';

                                                }
                                                    
                                            }
                                        }

                                        $taxo_string = substr_replace($taxo_string, '', -1);
                                        $taxo_string = str_replace('/', '<span class="text-white-pure px-1">/</span>', $taxo_string);
                                    ?>
                                    <?= $taxo_string ? $taxo_string : '&nbsp;'; ?>
								</div>
							</div>

							<div class="h-full flex flex-col justify-between px-6">
								<div class="text-default text-sm leading-6 pt-5 mb-4">
									<?= mb_strimwidth(get_the_excerpt(), 0, 145, '...'); ?>
								</div>

								<div class="text-right pt-4 pb-4 border-t border-white-300-new ">
									<a href="<?php the_permalink() ?>" class=" text-red-500 leading-none font-black">More About <?php the_field('long_term_more_about_button'); ?> »</a>
								</div>
							</div>					
						</article>	
					</div>										
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer();
