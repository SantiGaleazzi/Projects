<?php
  $banner = get_field('banner');  
?>

<?php 
    $home_class="";
    if(is_front_page()){
        $home_class = "banner--homepage";
    }
?>

<?php if($banner): ?>
<!-- BANNER -->
<div id="banner-active" class="banner banner--bg <?php echo $home_class; ?>" style="background-image: url('<?php echo $banner['banner_image']['url']; ?>');">
  <div class="banner--color">
    <div class="row h100">
      <div class="large-6 columns banner__description">

        <div class="table w100 h100">
          <div class="table-cell vAmiddle">

            <?php if($banner['main_title']): ?>
            <h1 class="banner__title"><?php echo $banner['main_title']; ?></h1>
            <?php endif; ?>

            <?php if($banner['description'] || $banner['button']): ?>
            <div class="content">
              <?php echo $banner['description']; ?>  

              <?php if($banner['button']): ?>
                  <a href="<?php echo $banner['button']['url']?>" class="btn--yellow" target="<?php echo $banner['button']['target']?>"><?php echo ($banner['button']['title']) ? ($banner['button']['title']) : 'Read More&nbsp;&raquo;'; ?></a>
              <?php endif; ?>
            </div>
            <?php endif; ?>
              
          </div>
        </div>
        
      </div>
      <div class="banner__image show-for-large" style="background-image: url('<?php echo $banner['banner_image']['url']; ?>');"></div>
    </div>  
  </div>  
</div>
<!-- /BANNER -->
<?php endif; ?>
