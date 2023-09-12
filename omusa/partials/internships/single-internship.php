<?php
    
    $intern_semester = wp_get_post_terms( get_the_ID(), 'semesters');
    $intern_location = wp_get_post_terms( get_the_ID(), 'internship-location');

    if ( has_post_thumbnail() ) {

        $post_thumbnail = get_the_post_thumbnail_url();

    } else {

        if ( has_term('', 'degrees') ) {

            $intern_degree = wp_get_post_terms( get_the_ID(), 'degrees');

            $post_thumbnail = get_field('internship_degree_image', 'term_' . $intern_degree[0]->term_id);

            $post_thumbnail = $post_thumbnail['url'];

        }

    }
?>

<div class="internship-itern text-default p-6 border-t-8 border-red-500 rounded-md shadow-2xl mb-10">
    <div class="flex flex-col md:flex-row justify-between">
        <div class="w-2/5 md:pr-8 hidden lg:block">
            <div class="w-full h-full bg-cover bg-center bg-no-repeat rounded-md" style="background-image: url('<?= $post_thumbnail; ?>');"></div>
        </div>

        <div class="w-full lg:w-3/5">
               
            <div class="text-xs font-bold flex items-center mb-2">

                <?php if ( has_term('virtual', 'internship-location') && has_term('virtual', 'internship-type') && !has_term('in-person', 'internship-type') ) : ?>
                    <div class="text-orange-500 uppercase">
                        Virtual
                    </div>
                <?php elseif ( empty($intern_location) && has_term('virtual', 'internship-type') && !has_term('in-person', 'internship-type') ) : ?>
                    <div class="text-orange-500 uppercase">
                        Virtual 
                    </div>
                <?php elseif ( has_term('virtual', 'internship-location') && !has_term('virtual', 'internship-type') && !has_term('in-person', 'internship-type') ) : ?>
                    <div class="text-orange-500 uppercase">
                        Virtual
                    </div>
                <?php elseif ( $intern_location[0]->name != 'Virtual' ) : ?>
                    <div class="text-orange-500 uppercase">
                        <?= $intern_location[0]->name; ?> 
                    </div>
                <?php elseif ( !has_term('virtual', 'internship-location') && has_term('virtual', 'internship-type') && has_term('in-person', 'internship-type') ) : ?>
                    <div class="text-orange-500 uppercase">
                        Virtual or In-Person 
                    </div>
                <?php endif; ?>
                    
                <?php if ( has_term('in-person', 'internship-type') && !has_term('virtual', 'internship-type') && !has_term('virtual', 'internship-location') ) : ?>
                    <div class="text-orange-500 uppercase">
                        <span class="text-black-700-new px-1">/</span> IN-PERSON
                    </div>
                <?php elseif ( has_term('virtual', 'internship-type') && has_term('in-person', 'internship-type') && $intern_location[0]->name != 'Virtual' ) : ?>
                    <div class="text-orange-500 uppercase">
                        <span class="text-black-700-new px-1">/</span> Virtual or In-Person
                    </div>
                <?php elseif ( has_term('virtual', 'internship-type') && has_term('virtual', 'internship-location') && has_term('in-person', 'internship-type') && $intern_location[0]->name != 'Virtual' )  : ?>
                    <div class="text-orange-500 uppercase">
                        Virtual or In-Person
                    </div>
                <?php elseif ( $intern_location && $intern_location[0]->name != 'Virtual' && has_term('virtual', 'internship-type') && !has_term('in-person', 'internship-type') ) : ?>
                    <div class="text-orange-500 uppercase">
                        <span class="text-black-700-new px-1">/</span> VIRTUAL
                    </div>
                <?php endif; ?>

                <?php if ( has_term('virtual', 'internship-type') && has_term('in-person', 'internship-type') && has_term('virtual', 'internship-location') && !empty($intern_location) ) : ?>
                    <div class="text-orange-500 uppercase">
                        Virtual or In-Person 
                    </div>
                <?php elseif ( !has_term('virtual', 'internship-type') && has_term('in-person', 'internship-type') && has_term('virtual', 'internship-location') && !empty($intern_location) ) : ?>
                    <div class="text-orange-500 uppercase">
                        Virtual or In-Person 
                    </div>
                <?php endif; ?>

            </div>

            <div class="text-3xl font-roboto font-light leading-9 mb-3">
                <?php the_title(); ?>
            </div>
            
            <?php if ( $intern_semester && ! is_wp_error( $intern_semester ) && count( $intern_semester ) > 0 ) : ?>
                <div class="text-xs font-bold flex items-center mb-2">
                    <div class="text-default uppercase">
                        <?php
                            // Post taxonomies
                            $semesters_taxonomy = array('semesters');
                            $semesters_list = '';

                            foreach ( $semesters_taxonomy as $taxonomy ) {
                                
                                $semesters_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
                                
                                if ( !empty( $semesters_associated ) ) {
                                    
                                    foreach ( $semesters_associated as $term ) {
                                        
                                        $semesters_list .= $term . '/';
                                    
                                    }
                                
                                }

                            }
                            
                            $semesters_list = substr_replace($semesters_list, '', -1);
                            $semesters_list = str_replace('/', '<span class="px-1">/</span>', $semesters_list);
                        ?>
                        <?= $semesters_list; ?>	
                    </div>
                </div>
            <?php endif; ?>

            <div class="font-medium leading-8 pl-6 border-l-2 border-separator mb-4">
                <?php the_excerpt(); ?>
            </div>
            
            <div>
                <a href="<?php the_field('external_url'); ?>" target="_blank" rel="noopener noreferrer" class="w-full md:w-auto text-center text-white-pure text-xl font-black leading-none px-10 py-3 bg-teal-500 inline-block">Learn More</a>
            </div>
        </div>
    </div>
</div>
