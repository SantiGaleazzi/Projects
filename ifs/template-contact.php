<?php

	/*
	* Template name: Contact Us
	*/

	$content_image = get_field('content_image');
	$contact_info = get_field('contact_info');
	get_sidebar("banner");
	
	get_header();

?>

<div class="contact">
    <div class="row">
        <div class="large-9 columns" >
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
        <div class="large-3 columns show-for-large">
            <?php if($content_image): ?>
                <img src="<?php echo $content_image['url'] ?>" alt="<?php echo $content_image['alt'] ?>">
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="information">
    <div class="row">
    <?php 
        $rows =  $contact_info['info_single']; 
        if($rows):?>
        <?php foreach($rows as $row):  
            // vars
            $icon = $row['icon_section'];
            $title = $row['title'];
            $info_content = $row['info_content'];
            ?>
            <div class="large-3 columns">
                
                <i class="<?php echo $icon; ?>"></i>
                <h3><?php echo $title; ?></h3>
                <?php echo $info_content; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</div>

<?php get_footer();
