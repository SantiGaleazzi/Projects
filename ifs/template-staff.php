<?php

	/*
	* Template name: Staff
	*/
	
  	$staff = get_field('staff');
	get_sidebar("banner");

	get_header();

?>

<div class="organization">
    <div class="organization__controls">
          <div class="row">
            <div class="large-12 columns">
              <ul class="tabs" data-tabs id="organization">
                <li class="tabs-title is-active"><a href="#tab-staff">Staff</a></li>
                <li class="tabs-title"><a href="#tab-board">Board of Directors</a></li>
                <li class="tabs-title"><a href="#tab-academic">Academic Advisors</a></li>
              </ul>
            </div>
          </div>
    </div>

    <div class="tabs-content" data-tabs-content="organization">
        <div class="organization__staff tabs-panel is-active" id="tab-staff">
          <?php 
            $rows=  $staff['staff']; 
            $i = 1;
            $close_tag=0;
            echo $numrows;
            if($rows):
              foreach($rows as $row):
                $name_and_charge = $row['name_and_charge'];
                $profile_picture = $row['profile_picture'];
                $description = $row['description'];
                $wordpress_user_id = $row['wordpress_user_id']; 
                $authors_posts = get_posts( 
                  array( 
                  'author_name' => $wordpress_user_id, 
                  'numberposts' => 1,
                  'orderby' => 'date'      
                  ) 
                );
                $postNumber = count($authors_posts);
                ?>

                <?php if($close_tag % 2 == 0):?>
                    <div class="row" data-equalizer>
                <?php endif;?>  

                <div class="large-6 columns" data-equalizer-watch>
                  <div class="organization__staff__single" data-toggle="staffmodal-<?=$i;?>">
                    <h3><?=$name_and_charge; ?></h3>
                    
                    <?php if($profile_picture): ?>
                        <div class="organization__staff__single__profile">
                            <img src="<?=$profile_picture['url']?>" alt="<?=$profile_picture['alt']?>">
                        </div>    
                    <?php endif; ?>
                    
                    <div class="organization__staff__single__description <?php echo ($profile_picture) ? '' : 'w100'?>">
                      <p><?= $trim = wp_trim_words($description, 33, '...'); ?></p>

                      
                      <?php if($wordpress_user_id && $postNumber > 0):?>
                        <div class="organization__staff__single__description__lastpost">
                            <span>Most Recent Post:</span>
                          <?php  
                            foreach ( $authors_posts as $post ) : setup_postdata( $post ); ?>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php endforeach; 
                            wp_reset_postdata();?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
              </div>


              <?php if($close_tag % 2 == 1):?>
                  </div>
              <?php endif;?>  

              <?php
              $i++;
              $close_tag++;
              
              endforeach;

              if($close_tag % 2 == 1):
                  echo "</div>";
              endif;

              
            endif;
          ?>
        </div>


        <div class="organization__board_directors tabs-panel" id="tab-board">
            <?php 
              $rows=  $staff['board_of_directors']; 
              $i = 1;
              $close_tag = 0;
              echo $numrows;
              if($rows):
                foreach($rows as $row):
                  $name_and_charge = $row['name_and_charge'];
                  $profile_picture = $row['profile_picture'];
                  $description = $row['description'];
                  $wordpress_user_id = $row['wordpress_user_id']; 
                  $authors_posts = get_posts( 
                    array( 
                    'author_name' => $wordpress_user_id, 
                    'numberposts' => 1,
                    'orderby' => 'date'      
                    ) 
                  );
                  $postNumber = count($authors_posts);
                  ?>
                
                <?php if($close_tag % 2 == 0):?>
                    <div class="row" data-equalizer>
                <?php endif;?>    
                    

                    <div class="large-6 columns" data-equalizer-watch>
                        <div class="organization__staff__single" data-toggle="boardmodal-<?=$i;?>">
                          <h3><?=$name_and_charge; ?></h3>
                          <?php if($profile_picture): ?>
                              <div class="organization__staff__single__profile">
                                <img src="<?=$profile_picture['url']?>" alt="<?=$profile_picture['alt']?>">
                              </div>
                          <?php endif; ?>
                          <div class="organization__staff__single__description <?php echo ($profile_picture) ? '' : 'w100'?>">
                            <p><?= $trim = wp_trim_words($description, 33, '...'); ?></p>
                            
                            <?php if($wordpress_user_id && $postNumber > 0):?>
                              <div class="organization__staff__single__description__lastpost">
                                  <span>Most Recent Post:</span>
                                <?php  
                                  foreach ( $authors_posts as $post ) : setup_postdata( $post ); ?>
                                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                  <?php endforeach; 
                                  wp_reset_postdata();?>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>
                    </div>


                <?php if($close_tag % 2 == 1):?>
                    </div>
                <?php endif;?>   

                <?php
                $i++;
                $close_tag++;
                
                endforeach;

                if($close_tag % 2 == 1):
                    echo "</div>";
                endif;

              endif;
            ?>
        </div>


        <div class="organization__academic_advisors tabs-panel" id="tab-academic">
            <?php 
              $rows=  $staff['academic_advisors']; 
              $i = 1;
              $close_tag = 0;
              echo $numrows;
              if($rows):
                foreach($rows as $row):
                  $name_and_charge = $row['name_and_charge'];
                  $profile_picture = $row['profile_picture'];
                  $description = $row['description'];
                  $wordpress_user_id = $row['wordpress_user_id']; 
                  $authors_posts = get_posts( 
                    array( 
                    'author_name' => $wordpress_user_id, 
                    'numberposts' => 1,
                    'orderby' => 'date'      
                    ) 
                  );
                  $postNumber = count($authors_posts);
                  ?>

                  <?php if($close_tag % 2 == 0):?>
                      <div class="row" data-equalizer>
                  <?php endif;?>  

                  <div class="large-6 columns" data-equalizer-watch>
                    <div class="organization__staff__single" data-toggle="academicmodal-<?=$i;?>">
                      <h3><?=$name_and_charge; ?></h3>
                      
                      <?php if($profile_picture): ?>
                        <div class="organization__staff__single__profile">  
                            <img src="<?=$profile_picture['url']?>" alt="<?=$profile_picture['alt']?>">
                        </div>    
                      <?php endif; ?>
                      <div class="organization__staff__single__description <?php echo ($profile_picture) ? '' : 'w100'?>">
                        <p><?= $trim = wp_trim_words($description, 33, '...'); ?></p>
                        
                        <?php if($wordpress_user_id && $postNumber > 0):?>
                          <div class="organization__staff__single__description__lastpost">
                              <span>Most Recent Post:</span>
                            <?php  
                              foreach ( $authors_posts as $post ) : setup_postdata( $post ); ?>
                                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                              <?php endforeach; 
                              wp_reset_postdata();?>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                </div>
              
                
                <?php if($close_tag % 2 == 1):?>
                    </div>
                <?php endif;?>  


                <?php
                $i++;
                $close_tag++;
                
                endforeach;

                if($close_tag % 2 == 1):
                    echo "</div>";
                endif;

              endif;
            ?>
        </div>
    </div>
</div>




<?php 
  $rows=  $staff['staff']; 
  $i = 1;
  $numrows = count($rows);
  if($rows):
    foreach($rows as $row):
      $name_and_charge = $row['name_and_charge'];
      $profile_picture = $row['profile_picture'];
      $linkedin_url = $row['linkedin_url'];
      $description = $row['description'];
      $wordpress_user_id = $row['wordpress_user_id']; 
      $authors_posts = get_posts( 
        array( 
        'author_name' => $wordpress_user_id, 
        'numberposts' => 1,
        'orderby' => 'date'      
        ) 
      );
      $postNumber = count($authors_posts);
      ?>
      <div class="large reveal staff-reveal" id="staffmodal-<?=$i;?>" data-reveal>
        <h1><?=$name_and_charge; ?></h1>
        <?php if($profile_picture): ?>
          <img src="<?=$profile_picture['url']?>" alt="<?=$profile_picture['alt']?>">
        <?php endif; ?>
        <div class="staff-reveal__extra-info">
          <?php if($linkedin_url):?>
            <div class="staff-reveal__extra-info__linkedin">
              <a href="<?=$linkedin_url; ?>"><i class="fab fa-linkedin"></i></a>
            </div>
          <?php endif; ?>
          <?php if($wordpress_user_id && $postNumber > 0):?>
            <div class="organization__staff__single__description__lastpost staff-reveal__extra-info__last-post">
                <span>Most Recent Post:</span>
              <?php  
                foreach ( $authors_posts as $post ) : setup_postdata( $post ); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php endforeach; 
                wp_reset_postdata();?>
            </div>
          <?php endif; ?>
        </div>
        <?=$description?>
        <div class="staff-reveal__arrows">
          <?php 
            if($numrows > 1 && $i > 1):
              $j = $i - 1;
              if($j>0): ?>
                <button class="staff-reveal__arrows__button staff_reveal__arrows--prev" data-open="staffmodal-<?=$j?>"><i class="fas fa-chevron-left"></i></button>
              <?php
              endif;
            endif;
          ?>
          <?php 
            if($i < $numrows):
              $k = $i + 1;
              if($j<$numrows): ?>
                <button class="staff-reveal__arrows__button staff_reveal__arrows--next" data-open="staffmodal-<?=$k?>"><i class="fas fa-chevron-right"></i></button>
              <?php
              endif;
            endif;
          ?>
          <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    <?php
    $i++;
    endforeach;
  endif;
?>

<?php 
  $rows=  $staff['board_of_directors']; 
  $i = 1;
  $numrows = count($rows);
  if($rows):
    foreach($rows as $row):
      $name_and_charge = $row['name_and_charge'];
      $profile_picture = $row['profile_picture'];
      $linkedin_url = $row['linkedin_url'];
      $description = $row['description'];
      $wordpress_user_id = $row['wordpress_user_id']; 
      $authors_posts = get_posts( 
        array( 
        'author_name' => $wordpress_user_id, 
        'numberposts' => 1,
        'orderby' => 'date'      
        ) 
      );
      $postNumber = count($authors_posts);
      ?>
      <div class="large reveal staff-reveal" id="boardmodal-<?=$i;?>" data-reveal>
        <h1><?=$name_and_charge; ?></h1>
        <?php if($profile_picture): ?>
          <img src="<?=$profile_picture['url']?>" alt="<?=$profile_picture['alt']?>">
        <?php endif; ?>
        <div class="staff-reveal__extra-info">
          <?php if($linkedin_url):?>
            <div class="staff-reveal__extra-info__linkedin">
              <a href="<?=$linkedin_url; ?>"><i class="fab fa-linkedin"></i></a>
            </div>
          <?php endif; ?>
          <?php if($wordpress_user_id && $postNumber > 0):?>
            <div class="organization__staff__single__description__lastpost">
                <span>Most Recent Post:</span>
              <?php  
                foreach ( $authors_posts as $post ) : setup_postdata( $post ); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php endforeach; 
                wp_reset_postdata();?>
            </div>
          <?php endif; ?>
        </div>
        <?=$description?>
        <div class="staff-reveal__arrows">
          <?php 
            if($numrows > 1 && $i > 0):
              $j = $i - 1;
              if($j>0): ?>
                <button class="staff-reveal__arrows__button staff_reveal__arrows--prev" data-open="boardmodal-<?=$j?>"><i class="fas fa-chevron-left"></i></button>
              <?php
              endif;
            endif;
          ?>
          <?php 
            if($i < $numrows):
              $k = $i + 1;
              if($j<=$numrows): ?>
                <button class="staff-reveal__arrows__button staff_reveal__arrows--next" data-open="boardmodal-<?=$k?>"><i class="fas fa-chevron-right"></i></button>
              <?php
              endif;
            endif;
          ?>
          <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    <?php
    $i++;
    endforeach;
  endif;
?>

<?php 
  $rows=  $staff['academic_advisors']; 
  $i = 1;
  $numrows = count($rows);
  if($rows):
    foreach($rows as $row):
      $name_and_charge = $row['name_and_charge'];
      $profile_picture = $row['profile_picture'];
      $linkedin_url = $row['linkedin_url'];
      $description = $row['description'];
      $wordpress_user_id = $row['wordpress_user_id']; 
      $authors_posts = get_posts( 
        array( 
        'author_name' => $wordpress_user_id, 
        'numberposts' => 1,
        'orderby' => 'date'      
        ) 
      );
      $postNumber = count($authors_posts);
      ?>
      <div class="large reveal staff-reveal" id="academicmodal-<?=$i;?>" data-reveal>
        <h1><?=$name_and_charge; ?></h1>
        <?php if($profile_picture): ?>
          <img src="<?=$profile_picture['url']?>" alt="<?=$profile_picture['alt']?>">
        <?php endif; ?>
        <div class="staff-reveal__extra-info">
          <?php if($linkedin_url):?>
            <div class="staff-reveal__extra-info__linkedin">
              <a href="<?=$linkedin_url; ?>"><i class="fab fa-linkedin"></i></a>
            </div>
          <?php endif; ?>
          <?php if($wordpress_user_id && $postNumber > 0):?>
            <div class="organization__staff__single__description__lastpost">
                <span>Most Recent Post:</span>
              <?php  
                foreach ( $authors_posts as $post ) : setup_postdata( $post ); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php endforeach; 
                wp_reset_postdata();?>
            </div>
          <?php endif; ?>
        </div>
        <?=$description?>
        <div class="staff-reveal__arrows">
          <?php 
            if($numrows > 1 && $i > 1):
              $j = $i - 1;
              if($j>0): ?>
                <button class="staff-reveal__arrows__button staff_reveal__arrows--prev" data-open="academicmodal-<?=$j?>"><i class="fas fa-chevron-left"></i></button>
              <?php
              endif;
            endif;
          ?>
          <?php 
            if($i < $numrows):
              $k = $i + 1;
              if($j<=$numrows): ?>
                <button class="staff-reveal__arrows__button staff_reveal__arrows--next" data-open="academicmodal-<?=$k?>"><i class="fas fa-chevron-right"></i></button>
              <?php
              endif;
            endif;
          ?>
          <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    <?php
    $i++;
    endforeach;
  endif;
?>

<?php get_footer();
