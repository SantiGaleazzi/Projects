<?php
	/*
	* Template name: Get Involved
	*/

	$related = get_field('related');
	$side_image = get_field('side_image');
	get_sidebar("banner");

	get_header();
	
?>

<div class="get-involved">
    <div class="row"  >
        <div class="large-9 columns">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
        <div class="large-3 columns show-for-large">
                <img src="<?= $side_image['url']; ?>" alt="<?= $side_image['alt']; ?>">
        </div>
    </div>
</div>

<!-- DONATION FORM-->
<?php get_sidebar("donation"); ?>
<!-- /DONATION FORM-->

<div class="extras">
    <div class="row" data-equalizer>
    <?php 
        $rows =  $related['boxes']; 
        if($rows):?>
        <?php foreach($rows as $row):  
            // vars
            $title = $row['title'];
            $link = $row['link'];
            $image = $row['image'];
            $excerpt = $row['excerpt'];
            ?>
            <div class="large-4 columns">
            <div class="extras__single" data-equalizer-watch>
                <div class="extras__single__title">
                    <a href="<?=$link['url']?>"><?=$title; ?></a>
                </div>
                <div class="extras__single__image">
                    <img src="<?=$image['url']; ?>" alt="<?=$image['alt']; ?>">
                    <div class="extras__single__image__overlay">
                        <a href="<?=$link['url']?>">Read More &raquo;</a>
                    </div>
                </div>
                <div class="extras__single__content">
                        <?=$excerpt; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
