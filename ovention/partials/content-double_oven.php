<?php 
    $double_view_group = get_field('double_view_group');
    $testimonials = $double_view_group['testimonials'];
?>
<!--  DOUBLE OVEN -->
<div class="intro-oven intro-oven--single cloud-pattern">
	<?php get_template_part( 'partials/content', 'slider_testimonials' ); ?>
	<div class="intro-oven__double-content">
		<div class="row">
			<?php 
  	    $rows = $double_view_group['ovens']; 
  	    if($rows):
  	    	foreach($rows as $row): 
  	    	$info_oven = $row['info_oven'];
  	    	$lead_information = $row['lead_information'];
  	    	$oven_links = $row['oven_links'];
  	    ?>
			<div class="large-6 columns">
				<div class="intro-oven__view">
					<div class="intro-oven__double-content">
						<img src="<?=$info_oven['oven_image']['url']; ?>" alt="<?=$info_oven['oven_image']['alt']; ?>">
						<h3><?=$info_oven['oven_title']; ?></h3>
						<div class="intro-oven__view-intro">
							<?=$info_oven['oven_intro']; ?>
						</div>
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
					<?=$info_oven['oven_content']; ?>
					</div>
					<div class="main-oven__box main-oven__box--double">
						<div class="main-oven__links">
							<h3>Learn More</h3>
							<?php $rows = $oven_links;
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
							<?php	endif; ?></div>
					</div>
				</div>
			</div>
			<?php 
  			endforeach;
  		endif;?>
  		</div>
	</div>
</div>
<!--  /DOUBLE OVEN -->