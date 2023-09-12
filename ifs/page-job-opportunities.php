<?php get_header();

$full_tabs = get_field('full_tabs');

if ($full_tabs) {
  $totalTabs = count( get_field( 'full_tabs' ) );
}

 ?>

<div class="breadcrumbs">
  <div class="row">
    <div class="large-12 columns">
      <?php custom_breadcrumbs(); ?>
    </div>
  </div>  
</div>

<?php  get_sidebar("banner"); ?>

<?php if($full_tabs): ?>
    <?php if($full_tabs[0]['tab_title']): ?>
        <div class="row">
          <div class="columns large-12 full-page__tabscontainer tabs__container">
            <ul class="tabs tabs-full tabs-full__header" data-deep-link="true" data-update-history="true" data-deep-link-smudge="true" data-deep-link-smudge-delay="500" data-tabs id="deeplinked-tabs"> 
            <?php foreach($full_tabs as $rowIndex => $row): ?>
          
            <li class="tabs-title <?php echo ( $rowIndex==0 ) ? 'is-active':''; ?> tabs-size--<?php echo $totalTabs; ?> <?php echo ($totalTabs == 1) ? 'hide':'';?>" ><a href="#panel<?php echo  $rowIndex+1; ?>d" aria-selected="true"><?php echo $row['tab_title']; ?></a></li>
          
            <?php endforeach; ?>
            </ul>
          </div>
        </div>
    <?php endif; ?>    

<div class="tabs-content full-page" data-tabs-content="deeplinked-tabs">
  <?php foreach($full_tabs as $IndexContent => $rowTabs): ?>  
    <div class="tabs-panel <?php echo ( $IndexContent==0 ) ? 'is-active':''; ?>" id="panel<?php echo $IndexContent+1; ?>d">
      <div class="row">
        <div class="columns large-centered large-8">
            <?= do_shortcode( '[ss_social_share]' ); ?>
            <?php echo $rowTabs['tab_content']; ?>
        </div>
      </div>
    </div>  
  <?php endforeach; ?>
</div>
<?php endif; ?>



<?php get_footer(); ?>