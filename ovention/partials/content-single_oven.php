<?php 
    $single_view_group = get_field('single_view_group');
	$oven = $single_view_group['oven'];
	$lead_information = $single_view_group['lead_information'];
	$testimonials = $single_view_group['testimonials'];
?>

<div class="intro-oven intro-oven--single cloud-pattern">
	
  <?php get_template_part( 'partials/content', 'slider_testimonials' ); ?>

  <div class="row">
      <div class="small-12 columns">  
        <?php the_post_thumbnail( 'full' ); ?>
      </div>
  </div>
</div>

<div class="main-oven orange-overlay">
	<div class="row">
		<div class="large-5 columns">
		<h3><?=$oven['oven_content_title']; ?></h3>
		<?php if(isset($_COOKIE['SecondAnswer'])):
                    if($lead_information):
                        switch ($_COOKIE['SecondAnswer']) {
                          case 'Pre-cooked frozen proteins':
                            echo $lead_information['pre-cooked_frozen_proteins'];
                            break;
                          case 'Pizza':
                            echo $lead_information['pizza'];
                            break;
                          case 'Gourmet style appetizers':
                            echo $lead_information['gourmet_style_appetizers'];
                            break;
                          case 'Sandwiches/Paninis':
                            echo $lead_information['sandwiches/paninis'];
                            break;
                          case 'All of the Above':
                            echo $lead_information['all_of_the_above'];
                            break;
                          default:
                             echo $lead_information['other'];
                            break;
                        }
                  endif;
                endif;
            ?>
			<?php if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						the_content();
					endwhile; 
			endif; ?>
		</div>
		<div class="large-5 large-offset-2 columns">
			<div class="main-oven__box">
			<?php 
			if($oven['oven_vimeo_id'] != null):
			?>
				<div class="main-oven__video">
					<div class="vimeo-player" data-id="<?= $oven['oven_vimeo_id']; ?>"></div>
				</div>
			<?php	endif; ?>
				<div class="main-oven__features">
					<h3>Features</h3>
					<?= $oven['oven_features']; ?>
				</div>
				<div class="main-oven__links">
				    <h3><?= $oven['oven_links_title']; ?></h3>
				    <?php $rows = $oven['oven_links'];
							if($rows): 
							?>
								<?php foreach($rows as $row): 
									$link_type = $row['link_type'];
									$video_link = $row['video_link'];
									$attachment = $row['attachment'];
									$text_link = $row['text_link'];
								?>
										<div class="row main-oven__row">
										<?php if($link_type=='download'): ?>
											<div class="main-oven__icon">
												<i class="fas fa-cloud-download-alt"></i>
											</div>
											<div class="main-oven__attached">
												<a href="<?= $attachment['url'] ?>" download=""><?=$text_link;  ?></a>
											</div>
										<?php else: ?>
											<div class="main-oven__icon">
												<i class="fas fa-play-circle"></i>
											</div>
											<div class="main-oven__attached">
												<a href="<?=$video_link; ?>"><?=$text_link;  ?></a>
											</div>
										<?php endif; ?>
										</div>
									
								<?php endforeach; ?>
					<?php	endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
