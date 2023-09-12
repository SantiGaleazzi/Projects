<?php
 /*
  * Template name: Survey Template
  */
$welcome_message = get_field('welcome_message');
get_header(); ?>
<div class="full ">
	<div class="flex-survey">
		 <div class="align-center-middle survey">
			<?php if (have_posts()) : ?>
			    <?php while (have_posts()) : the_post(); ?>

				<div class="desc-survery">
					<div style="max-width: 450px; width: 100%; margin-top: 20px; margin: 0 auto;">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-tagline.svg" alt="FiveTwo">
					</div>
					
					<?php
						if($welcome_message ){ ?>
							<p><?=$welcome_message?></p>
						<?php
						}
					?>
				</div>				
			    <?php the_content(); ?>				
				<div class="survey-c">
					<div class="quiz__start content-survey">Begin 3 Questions</div>
				    <div>
				       <?php echo do_shortcode( '[gravityform id="29" title="false" description="false" ajax="true"]' ); ?>
				       <div class="text-center button-s"><a href="#" class="button red survey-button">Start</a></div>
				    </div>  
				</div>
			    <?php endwhile;?>
			<?php endif; ?>
        </div>
	</div>
</div>
<?php get_footer();?>
