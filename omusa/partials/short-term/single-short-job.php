
<div class="short-term-job text-default p-6 md:p-10 lg:p-14 border-t-8 border-red-500 rounded-md shadow-2xl mb-10">
    <div class="flex flex-col md:flex-row justify-between mb-8 md:mb-0">
        <div class="mb-5">
            <div class="text-xs font-bold flex items-center mb-2">
                <div class="underline">
                    <?php the_field('short_term_job_id'); ?>
                </div>

                <div class="text-orange-500 px-4">
                    -
                </div>

                <div class="text-orange-500 uppercase truncate">
                    <?php
                        // Post taxonomies
                        $taxonomies = array('short-regions');
                        $taxo_string = '';

                        foreach ( $taxonomies as $taxonomy ) {
                            
                            $taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
                            
                            if ( !empty($taxonomies_associated) ) {
                                
                                foreach ( $taxonomies_associated as $term) {
                                    
                                    $taxo_string .= $term . '/';
                                
                                }
                            
                            }

                        }
                        
                        $taxo_string = substr_replace($taxo_string, '', -1);
                        $taxo_string = str_replace('/', '<span class="px-1">/</span>', $taxo_string);
                    ?>
				    <?= $taxo_string ? $taxo_string : '&nbsp;'; ?>	
                </div>
            </div>

            <div class="text-3xl font-roboto font-light leading-9 mb-2">
                <?php the_title(); ?>
            </div>
                                    
            <div class="font-roboto font-bold">
                <?php
                    // If both start and end dates are given
                    if ( get_field('short_term_job_start_date') && get_field('short_term_job_end_date') ) :
                ?>

                    <strong><?php the_field('short_term_job_start_date'); ?> – <?php the_field('short_term_job_end_date'); ?></strong>
                                        
                <?php
                    // Only if the start date is given
                    elseif ( get_field('short_term_job_start_date') && !get_field('short_term_job_end_date') ) :
                ?>

                    <strong><?php the_field('short_term_job_start_date'); ?></strong>

                <?php
                    // Only if the end date is given
                    elseif ( !get_field('short_term_job_start_date') && get_field('short_term_job_end_date') ) :
                ?>

                    <strong><?php the_field('short_term_job_end_date'); ?></strong>

                <?php endif; ?>
                                                        
                <?php
                    // Show the Application deadline if the data exists
                    if ( get_field('short_term_job_application_deadline') ) :

                ?>
                    (Apply by <?php the_field('short_term_job_application_deadline'); ?>)
                <?php endif; ?>
            </div>
        </div>

        <div class="flex-none w-full md:w-auto">
            <div>
                <a href="<?php the_permalink(); ?>" target="_blank" class="w-full md:w-auto text-center text-white-pure text-xl font-black leading-none px-10 py-3 bg-red-500 inline-block">Explore Opportunity</a>
            </div>

            <?php if ( has_term('', 'short-remote-compatibility') ) : ?>
                <div class="text-center">
                    <div class="my-1">
                        Available for
                    </div>

                    <div class="text-xs font-bold text-orange-500 uppercase">
                        <?php
                            // Post taxonomies
                            $taxonomies = array('short-remote-compatibility');
                            $taxo_string = '';

                            foreach ( $taxonomies as $taxonomy ) {
                                
                                $taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
                                
                                if ( !empty($taxonomies_associated) ) {
                                    
                                    foreach ( $taxonomies_associated as $term) {
                                        
                                        $taxo_string .= $term . '/';
                                    
                                    }
                                
                                }

                            }
                            
                            $taxo_string = substr_replace($taxo_string, '', -1);
                            $taxo_string = str_replace('/', '<span class="px-1">/</span>', $taxo_string);
                        ?>
                        <?= $taxo_string ? $taxo_string : '&nbsp;'; ?>	
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="font-medium leading-8 pl-6 border-l-2 border-separator">
        <?php the_excerpt(); ?>
    </div>
</div>