<?php
 /*
  * Template name: Quiz Template
  */

 $logo           = get_field('logo_header', 'option');
 $title          = get_field('title_quiz_lightbox', 'option');
 $subtitle       = get_field('subtitle_quiz_lightbox', 'option');
 $introduction   = get_field('introduction_quiz_lightbox', 'option');
 ?>
<?php get_header(); ?>
<div class="quiz__page h100">
    <div class="grid-container h100">
        <div class="grid-x align-center h100">
            <div class="flex-container flex-dir-column align-center-middle">
			<?php if (have_posts()) : ?>
			    <?php while (have_posts()) : the_post(); ?>
				
				<h2 class="title"><?php the_title(); ?></h2>
			    <?php the_content(); ?>
				
				<div class="quiz__bg" id="quizModal" data-bg="0">
				    <div class="reveal__container">
				       <div class="text-center">
				           <a href="<?php bloginfo('url'); ?>">
				             <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
				           </a>
				       </div>
				       <div class="quiz__start">
				          <?php if ($subtitle): ?>
				            <h6 class="subtitle"><?php echo $subtitle; ?></h6>
				          <?php endif ?>
				        
				          <?php if ($title): ?>
				            <h5 class="title"><?php echo $title; ?></h5>
				          <?php endif ?>
				           
				           <?php if ($introduction): ?>
				             <?php echo $introduction; ?>
				           <?php endif ?>
				       </div>
				       <?php echo do_shortcode( '[gravityform id="3" title="false" description="false" ajax="true"]' ); ?>
				       <div class="text-center"><a href="#" class="button red nextScreen">Start the Quiz</a></div>
				    </div>  
				</div>

			    <?php endwhile;?>
			<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();