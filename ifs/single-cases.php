<?php

	$single_subtitle = get_field( "single_subtitle" );
	$post_date = get_the_date( 'F j, Y' );
	$contTabs = 1;
	$NumTab = 1;

	$post_date = get_the_date( 'F j, Y' );
	$status = get_field( "status" );
	$index = 0;
	$casStatus = get_field('status');

	$taxissue = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
	$state_name = get_field('state_name');
	$urlThumbnail = get_the_post_thumbnail_url();
	$captionThumbnail = get_the_post_thumbnail_caption();

	get_header();
  
?>

<div class="breadcrumbs">
  <div class="row">
    <div class="large-12 columns">
      <?php custom_breadcrumbs(); ?>
    </div>
  </div>
</div>

<div id="banner-active" class="scase-banner">
  <div class="row">
    <div class="large-7 columns scase-banner__description">
      <?php if(get_the_title()): ?>
      <h1 class="scase-banner__title"><?php the_title(); ?></h1>
      <?php endif; ?>

      <?php if($single_subtitle): ?>
      <h2 class="scase-banner__subtitle"><?php echo $single_subtitle; ?></h2>
      <?php endif; ?>

      <?php if( $casStatus != 'Other' ): ?>
      <div class="scase-banner__info">
        <span class="casebtn casebtn--status-current">
          Case Status : <?php echo $casStatus; ?>
        </span>
        <?php echo $post_date; ?>
        <?php echo ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue : ''; ?>
        <?php echo ($state_name) ? '&nbsp;&nbsp;•&nbsp;&nbsp;<a href="'.get_site_url().'/'. $state_name->taxonomy.'/'. $state_name->name . '" target="_self">'.$state_name->name.'</a>' : ''; ?>
      </div>
      <?php endif; ?>

      <?php
        $case_tab  = get_field('case_tab');
        $case_tab2 = get_field('case_tab2');
        $case_tab3 = get_field('case_tab3');
        $case_tab4 = get_field('case_tab4');
        $case_tab5 = get_field('case_tab5');
        $countSingleTabs = 0;

        if( !empty($case_tab['tab_title']) || !empty($case_tab['tab_content']) ) :
          $countSingleTabs++;
        endif;
        if( !empty($case_tab2['case_tab']['tab_title']) || !empty($case_tab2['case_tab']['tab_content']) ) :
          $countSingleTabs++;
        endif;
        if( !empty($case_tab3['case_tab']['tab_title']) || !empty($case_tab3['case_tab']['tab_content']) ) :
          $countSingleTabs++;
        endif;
        if( !empty($case_tab4['tab_title']) || !empty($case_tab4['video']) || !empty($case_tab4['gallery']) ) :
          $countSingleTabs++;
        endif;
        if( !empty($case_tab5['tab_title']) ) :
          $countSingleTabs++;
        endif;

      ?>
      <div class="extras__single">
        <div class="extras__single__image hide-for-large">
          <?php if ( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail('article-destacada'); ?>
            <?php if($captionThumbnail){ ?>
              <div class="caption-thumbnail"><?=$captionThumbnail;?></div>
            <?php  } ?>
          <?php endif; ?>
          <div class="extras__single__image__overlay">
            <a href="<?php the_permalink(); ?>">Read More &raquo;</a>
          </div>
        </div>
      </div>

      <?php echo do_shortcode('[ss_social_share]'); ?>

      <ul class="tabs tabs-full scase-banner__tabs" data-active-collapse="true" data-tabs id="cases-tabs">
        <?php if( $case_tab ): ?>
          <?php if( !empty($case_tab['tab_title']) || !empty($case_tab['tab_content']) ) :?>
          <li class="tabs-title <?php echo ($countSingleTabs == 1 || $countSingleTabs > 1) ? 'is-active':'';?> tabs-size--<?php echo $countSingleTabs; ?>"><a href="#panel<?php echo $contTabs++; ?>"><?php echo $case_tab['tab_title']; ?></a></li>
          <?php endif; ?>
        <?php endif; ?>

        <?php if( $case_tab2 ): ?>
          <?php if( !empty($case_tab2['case_tab']['tab_title']) || !empty($case_tab2['case_tab']['tab_content']) ): ?>
          <li class="tabs-title <?php echo ($countSingleTabs == 1) ? 'is-active':'';?> tabs-size--<?php echo $countSingleTabs; ?>"><a href="#panel<?php echo $contTabs++; ?>"><?php echo $case_tab2['case_tab']['tab_title']; ?></a></li>
          <?php endif; ?>
        <?php endif; ?>

        <?php if( $case_tab3 ): ?>
          <?php if( !empty($case_tab3['case_tab']['tab_title']) || !empty($case_tab3['case_tab']['tab_content']) ): ?>
          <li class="tabs-title <?php echo ($countSingleTabs == 1) ? 'is-active':'';?> tabs-size--<?php echo $countSingleTabs; ?>"><a href="#panel<?php echo $contTabs++; ?>"><?php echo $case_tab3['case_tab']['tab_title']; ?></a></li>
          <?php endif; ?>
        <?php endif; ?>

        <?php if( $case_tab4 ): ?>
          <?php if( !empty($case_tab4['tab_title']) || !empty($case_tab4['video']) || !empty($case_tab4['gallery']) ): ?>
          <li class="tabs-title <?php echo ($countSingleTabs == 1) ? 'is-active':'';?> tabs-size--<?php echo $countSingleTabs; ?>"><a href="#panel<?php echo $contTabs++; ?>"><?php echo $case_tab4['tab_title']; ?></a></li>
          <?php endif; ?>
        <?php endif; ?>

        <?php if( $case_tab5 ): ?>
          <?php if( !empty($case_tab5['tab_title']) ): ?>
          <li class="tabs-title <?php echo ($countSingleTabs == 1) ? 'is-active':'';?> tabs-size--<?php echo $countSingleTabs; ?>"><a href="#panel<?php echo $contTabs++; ?>"><?php echo $case_tab5['tab_title']; ?></a></li>
          <?php endif; ?>
        <?php endif; ?>
      </ul>
    </div>

    <div class="large-5 columns scase-banner__image show-for-large" style=" <?php echo $urlThumbnail ? 'background-image: url('. $urlThumbnail. ');':''; ?>">
      <?php if($captionThumbnail){ ?>
        <div class="caption-thumbnail"><?=$captionThumbnail;?></div>
      <?php  } ?>
    </div>
  </div>
</div>

<div class="scase-content">
  <div class="tabs-content" data-tabs-content="cases-tabs">
    <?php if( $case_tab ): ?>
      <?php if( !empty($case_tab['tab_title']) || !empty($case_tab['tab_content']) ) :?>
      <div class="tabs-panel <?php echo ($countSingleTabs == 1 || $countSingleTabs > 1) ? 'is-active':'';?>" id="panel<?php echo $NumTab++; ?>">
        <div class="row">
          <div class="large-10 large-centered columns">

            <?php echo $case_tab['tab_content']; ?>
          </div>
        </div>
      </div>
      <?php endif; ?>
    <?php endif; ?>

    <?php if( $case_tab2 ): ?>
      <?php if( !empty($case_tab2['case_tab']['tab_title']) || !empty($case_tab2['case_tab']['tab_content']) ): ?>
      <div class="tabs-panel <?php echo ($countSingleTabs == 1) ? 'is-active':'';?>" id="panel<?php echo $NumTab++; ?>">
        <div class="row">
          <div class="large-10 large-centered columns">
            <?php if (!empty($case_tab2['case_tab']['tab_title'])) {
              //echo $case_tab2['case_tab']['tab_title'];
            } ?>

            <?php if (!empty($case_tab2['case_tab']['tab_title'])) {
              echo $case_tab2['case_tab']['tab_content'];
            } ?>
          </div>
        </div>
      </div>
      <?php endif; ?>
    <?php endif; ?>

    <?php if( $case_tab3 ): ?>
      <?php if( !empty($case_tab3['case_tab']['tab_title']) || !empty($case_tab3['case_tab']['tab_content']) ): ?>
      <div class="tabs-panel <?php echo ($countSingleTabs == 1) ? 'is-active':'';?>" id="panel<?php echo $NumTab++; ?>">
        <div class="row">
          <div class="large-10 large-centered columns">
            <?php if (!empty($case_tab3['case_tab']['tab_title'])) {
              echo $case_tab3['case_tab']['tab_content'];
            } ?>
          </div>
        </div>
      </div>
      <?php endif; ?>
    <?php endif; ?>

    <?php if( $case_tab4 ): ?>
      <?php if( !empty($case_tab4['tab_title']) || !empty($case_tab4['video']) || !empty($case_tab4['gallery']) ): ?>
      <div class="tabs-panel <?php echo ($countSingleTabs == 1) ? 'is-active':'';?>" id="panel<?php echo $NumTab++; ?>">
        <?php if($case_tab4['tab_content']): ?>
        <div class="row">
          <div class="large-10 large-centered columns">
          <?php
            echo $case_tab4['tab_content'];
          ?>
          </div>
        </div>
        <?php endif; ?>


        <?php if( $case_tab4['video'] ): ?>
        <div class="row">
          <div class="large-10 large-centered columns tabs-panel__videos no-padding">
            <?php foreach ($case_tab4['video'] as $videoItem) { ?>

            <div class="large-6 columns">
              <?php if ($videoItem['video_title']): ?>
              <h6><?php echo $videoItem['video_title']; ?></h6>
              <?php endif; ?>

              <?php if ($videoItem['video_url']): ?>
              <div class="responsive-embed widescreen">
                <iframe width="560" height="315" src="<?php echo $videoItem['video_url']; ?>" frameborder="0" allowfullscreen></iframe>
              </div>
              <?php endif; ?>
            </div>

            <?php } ?>
          </div>
        </div>
        <?php else : ?>

        <?php endif; ?>


        <?php
        $imagesGallery = $case_tab4['gallery'];
        if( $imagesGallery ): ?>
        <div class="row">
          <div class="large-10 large-centered columns ">
              <div class="row small-up-1 medium-up-3 large-up-4">
                <?php foreach( $imagesGallery as $image ): ?>
                  <div class="column column-block tabs-panel__block">
                    <a href="<?php echo $image['url']; ?>">
                      <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
          </div>
        </div>
        <?php endif; ?>

      </div>
      <?php endif; ?>
    <?php endif; ?>

    <?php if( $case_tab5 ): ?>
      <?php if( !empty($case_tab5['tab_title']) ): ?>

      <?php $posts = $case_tab5['tab_taxonomies'];

      // echo "<pre>";
      // var_dump($posts);
      // exit();
      ?>

      <div class="tabs-panel extras" id="panel<?php echo $NumTab++; ?>">
        <?php if ($case_tab5['tab_title']): ?>
        <div class="row">
          <div class="large-10 large-centered columns">
            <h1><?php echo $case_tab5['tab_title']; ?></h1>
          </div>
        </div>
        <?php endif; ?>
        <!-- <div class="row"> -->
          <?php if( $posts ): ?>

            <?php foreach( $posts as $post): ?>
            <?php setup_postdata($post); ?>
            <?php if( (($index % 3) == 0) || ($index == 0) ): ?>
            <div class="row" data-equalizer>
            <?php endif; ?>
              <div class="large-4 columns">
                <div class="extras__single related" data-equalizer-watch>
                  <div class="extras__single__image">
                      <?php if ( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail('article-destacada'); ?>
                      <?php endif; ?>
                      <div class="extras__single__image__overlay">
                        <a href="<?php the_permalink(); ?>">Read More &raquo;</a>
                      </div>
                  </div>
                  <div class="extras__single__content">
                    <a href="<?php the_permalink(); ?>" class="related__title"><?php the_title(); ?></a>

                    <?php
                    $casesStatus = get_field('status');
                    $statusname = '';

                    switch ($casesStatus) {
                      case 'Current':
                        $statusname = 'status-current';
                        break;

                      case 'Completed':
                        $statusname = 'status-completed';
                        break;

                      case 'Other':
                        $statusname = 'status-other';
                        break;

                      default:
                        # code...
                        break;
                    }

                    $taxissue = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
                      $state_name = get_field('state_name');
                    ?>

                    <?php if( $casesStatus != 'Other'  ): ?>
                    <div class="scase-banner__info">
                      <span class="casebtn casebtn--<?php echo $statusname; ?>">
                        Case Status : <?php echo $casesStatus; ?>
                      </span>
                    </div>
                    <?php endif; ?>

                    <div class="articles__info">
                      <?php echo $post_date; ?>
                      <?php echo ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue : ''; ?>
                      <?php echo ($state_name) ? '&nbsp;&nbsp;•&nbsp;&nbsp;<a href="'.get_site_url().'/'. $state_name->taxonomy.'/'. $state_name->name . '" target="_self">'.$state_name->name.'</a>' : ''; ?>
                    </div>

                    <?php if(get_the_excerpt()): ?>
                      <p><?php echo excerpt(25); ?></p>
                    <?php endif;?>
                  </div>
                </div>
              </div>
            <?php
            $index++;
            if( (($index % 3) == 0) ): ?>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>

            <?php wp_reset_postdata(); ?>
          <?php endif; ?>

        <!-- </div>  -->
      </div>
      <?php endif; ?>
    <?php endif; ?>

  </div>
</div>

<?php get_footer();
