<?php 
$find_next_event 	 	= get_field('find_event_incubator');

$picture_incubator 		= get_field('picture_incubator');
$title_incubator 		= get_field('title_incubator');
$subtitle_incubator 	= get_field('subtitle_incubator');

$assessment_incubator_picture 	= get_field('assessment_incubator_picture');
$assessment_incubator_title 	= get_field('assessment_incubator_title');

$scholarship_form 				= get_field('scholarship_form_incubator');
$start_training_form_incubator  = get_field('start_training_form_incubator');
?>
<!-- START NEW INCLUDE -->
<?php 
if( $find_next_event ): 
	$find_next_event_url = $find_next_event['url'];
	$find_next_event_title = $find_next_event['title'];
	$find_next_event_target = $find_next_event['target'] ? $find_next_event['target'] : '_self';
	?>
	<div class="findNextEvent text-center">
		<a class="findNextEvent__link-calendar" href="<?php echo esc_url($find_next_event_url); ?>" target="<?php echo esc_attr($find_next_event_target); ?>"><?php echo esc_html($find_next_event_title); ?> &raquo;</a>
	</div>
<?php endif; ?>

<div id="highlightsIncubator" class="startNew__include">
	<div class="grid-container">
		<div class="grid-y">
			<div class="startNew__include-intro flex-container flex-dir-column align-center-middle">
				<?php 
				if( !empty($picture_incubator) ): ?>
					<img class="startNew__include-picture" src="<?php echo $picture_incubator['url']; ?>" alt="<?php echo $picture_incubator['alt']; ?>" />
				<?php endif; ?>

				<?php if ($subtitle_incubator) : ?>
					<h5 class="startNew__include-title"><?php echo $subtitle_incubator; ?></h5>
				<?php endif; ?>
				
				<?php if ($title_incubator): ?>
					<h2 class="startNew__include-title"><?php echo $title_incubator; ?></h2>
				<?php endif ;?>
				
			</div>
			<div class="startNew__include-program flex-container flex-dir-row align-center xlarge-align-justify flex-wrap">
				<?php
				if( have_rows('program_incubator') ):
				    while ( have_rows('program_incubator') ) : the_row();
				        $picture 	= get_sub_field('picture_program_incubator');
		        		$title 		= get_sub_field('title_program_incubator');
		        		$points 	= get_sub_field('point_program_incubator');
		        ?>
		        	<div class="startNew__step flex-container flex-dir-column text-center">
		        		<?php if( !empty($picture) ): ?>
						<div class="startNew__step-picture">
		        			<img src="<?php echo $picture['url']; ?>" alt="<?php echo $picture['alt']; ?>" />
						</div>
		        		<?php endif; ?>
		        		
		        		<div class="startNew__step-timeline">
		        			<?php if ($title): ?>
		        				<h5 class="startNew__step-title"><?php echo $title; ?></h5>
		        			<?php endif ?>
		        			
		        			<div class="startNew__step-include">
		        				INCLUDED:
		        			</div>
		        		</div>
		        		<div class="startNew__step-description text-left">
		        			<?php echo $points; ?>
		        		</div>
		        	</div>
		        <?php
				    endwhile;
				endif;
				?>
			</div>
			<div id="assessment" class="startNew__include-assessment">
				<div class="startNew__start flex-container flex-dir-column large-flex-dir-row align-justify">
					<div class="startNew__start-general startNew__start-process flex-container flex-dir-column medium-flex-dir-row align-middle align-center large-align-left">
						<div class="flex-container flex-dir-row align-center-middle">
							<?php 
							if( !empty($assessment_incubator_picture) ): ?>
								<div class="startNew__start-picture">
									<img src="<?php echo $assessment_incubator_picture['url']; ?>" alt="<?php echo $assessment_incubator_picture['alt']; ?>" />
								</div>
							<?php endif; ?>
							
							<div class="startNew__start-title">
								<?php if ($assessment_incubator_title): ?>
									<h4 class="title"><?php echo $assessment_incubator_title; ?></h4>
								<?php endif ?>
							</div>
						</div>

						<?php 
						if( $start_training_form_incubator ): 
							$start_training_form_incubator_url = $start_training_form_incubator['url'];
							$start_training_form_incubator_title = $start_training_form_incubator['title'];
							$start_training_form_incubator_target = $start_training_form_incubator['target'] ? $start_training_form_incubator['target'] : '_self';
							?>
							<a class="button green" href="<?php echo esc_url($start_training_form_incubator_url); ?>" target="<?php echo esc_attr($start_training_form_incubator_target); ?>"><?php echo esc_html($start_training_form_incubator_title); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /START NEW INCLUDE -->

<div class="reveal assessment__scholarship-form" id="scholarshipAssessment" data-reveal>
  <h6 class="subtitle">Five Two</h6>
  <!--<h2 class="title">Scholarship Opportunities</h2>
  <p>Several adjudicatories offer scholarships for the StartNew process. Contact your team lead and make sure he or she has applied!</p>-->
  <?php echo do_shortcode( '[gravityform id="6" title="false" description="false" ajax="true"]' ); ?>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>