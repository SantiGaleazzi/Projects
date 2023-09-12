<?php $featured_post = get_field('featured_post'); ?>

<?php  ?>
<div class="recent-posts">
    <?php if ( $featured_post ) : ?>
        <?php foreach( $featured_post as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata( $post ); ?>
            <div class="destacada">
                <div class="row">            
                    <?php $taxissue = get_the_term_list( $post->ID, 'category-issue', '', ', '); ?>
                    <?php $taxtype  = get_the_term_list( $post->ID, 'category-type', '', ', '); ?>

                    <?php if ( has_post_thumbnail() ): ?>
                        <div class="large-5 columns">
                            <a href="<?php the_permalink(); ?>" target="_blank">
                                <?php the_post_thumbnail('article-destacada'); ?>
                            </a>
                        </div>
                        </a>
                    <?php else:?>    
                        <div class="large-5 columns">
                            <a href="<?php the_permalink(); ?>" target="_blank">
                                <img src="<?php bloginfo('template_url');?>/assets/img/research/dft-1.png">
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="large-7 columns destacada__description">
                        <a href="<?php the_permalink(); ?>" target="_self">
                            <h2 class="destacada__title"><?php the_title(); ?></h2>
                        </a>

                        <?php $post_date = get_the_date( 'F j, Y' );?>
                        <?php $author = get_the_author(); ?>

                        <div class="destacada__info">
                            <?php echo $post_date; ?><?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : '';?><?php echo ($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxtype : ''; ?><?php echo ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue :''; ?>
                        </div>
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?> 
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>            
    <?php endif;?>       
    

    <div class="row">
        <?php
        // GET THE MOST RECENT POST FROM BLOG

        $args = array(
          'post_type' => ['blog'],
          'orderby' => 'date',
          'posts_per_page' => 1
        );

        $the_query = new WP_Query( $args ); 
        ?>

        <?php if ( $the_query->have_posts() ):?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                <?php $taxname = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' ); ?>
                <div class="articles large-6 columns">
                    <div class="articles__section tax-content">
                        <div class="articles__item">
                            <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink">
                                <h3><?php the_title(); ?></h3>
                            </a>

                            <?php if ( has_post_thumbnail() ): ?>
                                <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink">
                                    <?php the_post_thumbnail('article'); ?>
                                </a>
                            <?php else:?>    
                                <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink">
                                    <img src="<?php bloginfo('template_url');?>/assets/img/research/dft-1.png">
                                </a>
                            <?php endif; ?>

                            <div class="articles__description">
                                <?php $post_date = get_the_date( 'F j, Y' );?>
                                <?php $author = get_the_author(); ?>
                                <div class="articles__info">
                                    <?php echo $post_date; ?><?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : ''; ?><?php echo ($taxname) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxname : ''; ?>
                                </div>

                                <?php if(get_the_excerpt()): ?>  
                                  <p><?php echo excerpt(25); ?></p>
                                <?php endif;?>
                            </div>    
                        </div>     
                    </div>
                </div> 
            <?php endwhile; ?>
            <?php wp_reset_postdata();?>
        <?php endif; ?>

        <?php
        // GET THE MOST RECENT POST FROM BLOG

        $args = array(
          /*'post_type' => ['news'],*/
          'orderby' => 'date',
          'posts_per_page' => 1,
          'tax_query' => array(
            'relation' => 'OR',
            array(
              'taxonomy' => 'category-state',
              'field'    => 'slug',
              'terms'    => 'press-releases',
            ),
            array(
              'taxonomy' => 'category-issue',
              'field'    => 'slug',
              'terms'    => 'press-releases',
            ),
            array(
              'taxonomy' => 'category-type',
              'field'    => 'slug',
              'terms'    => 'press-releases',
            ), 
            array(
              'taxonomy' => 'category-case',
              'field'    => 'slug',
              'terms'    => 'press-releases',
            ), 
          ),
        );

        $the_query = new WP_Query( $args ); 
        ?>

        <?php if ( $the_query->have_posts() ):?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
                <?php 
                    $taxname = get_the_term_list( $post->ID, 'category-state', '', ', ', ', ' );
                    $taxname .= get_the_term_list( $post->ID, 'category-issue', '', ', ', ', ' );
                    $taxname .= get_the_term_list( $post->ID, 'category-type', '', ', ', ', ' );
                    $taxname .= get_the_term_list( $post->ID, 'category-case', '', ', ', ', ' ); 

                ?>
                <div class="articles large-6 columns">
                    <div class="articles__section tax-content">
                        <div class="articles__item">
                            <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink">
                                <h3><?php the_title(); ?></h3>
                            </a>

                            <?php if ( has_post_thumbnail() ): ?>
                                <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink">
                                    <?php the_post_thumbnail('article'); ?>
                                </a>
                            <?php else:?>    
                                <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink">
                                    <img src="<?php bloginfo('template_url');?>/assets/img/research/dft-1.png">
                                </a>
                            <?php endif; ?>

                            <div class="articles__description">
                                <?php $post_date = get_the_date( 'F j, Y' );?>
                                <?php $author = get_the_author(); ?>
                                <div class="articles__info">
                                    <?php echo $post_date; ?><?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : ''; ?><?php echo ($taxname) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxname : ''; ?>
                                </div>

                                <?php if(get_the_excerpt()): ?>  
                                  <p><?php echo excerpt(25); ?></p>
                                <?php endif;?>
                            </div>    
                        </div>     
                    </div>
                </div> 
            <?php endwhile; ?>
            <?php wp_reset_postdata();?>
        <?php endif; ?>
    </div>
</div>