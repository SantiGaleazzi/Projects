<?php
	/*
	* Template name: Multiple
	*/
  
	$banner = get_field('banner','option');  	
 
  	get_header();
	  
?>

<?php if($banner): ?>
<!-- BANNER -->
<div id="banner-active" class="banner banner--bg" style="background-image: url('<?php echo $banner['banner_image']['url']; ?>');">
  <div class="banner--color">
    <div class="row h100">
      <div class="large-6 columns banner__description">

        <div class="table w100 h100">
          <div class="table-cell vAmiddle">

            <?php if($banner['main_title']): ?>
            <h1 class="banner__title"><?php echo $banner['main_title']; ?></h1>
            <?php endif; ?>

            <?php if($banner['description']): ?>
            <div class="content">
              <?php echo $banner['description']; ?>  
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

<!-- <div id="stickie-animate"></div> -->

<!-- FILTER SECTION -->
<div class="filter filter-research">
  <div class="row">
    <div class="large-12 columns filter__container">
      <span>Filter by</span>

      <?php
      $taxonomyA = 'category-issue';
      $tax_termsA = get_terms($taxonomyA);

      $taxonomyB = 'category-type';
      $tax_termsB = get_terms($taxonomyB);
      ?>
      
      <label for="" class="filter__left filter__label">Issue:</label>
  
      <select id="first-option" class="filter__left filter__select">
        <option value="">All Issues</option>
      <?php foreach ($tax_termsA as $tax_termA): ?>      
        <option value="<?php echo $tax_termA->term_id; ?>"><a href="<?php esc_attr(get_term_link($tax_termA, $taxonomy))?>"><?php echo $tax_termA->name; ?></a>
        </option>      
      <?php endforeach; ?>
      </select>
  
      <label for="" class="filter__left filter__label">Category:</label>
      <select id="sec-option" class="filter__left filter__select">
        <option value="">All Categories</option>
      <?php foreach ($tax_termsB as $tax_termB): ?>      
        <option value="<?php echo $tax_termB->term_id; ?>"><a href="<?php esc_attr(get_term_link($tax_termB, $taxonomy))?>"><?php echo $tax_termB->name; ?></a>
        </option>      
      <?php endforeach; ?>
      </select>

    </div>
  </div>  
</div>
<!-- /FILTER SECTION -->

<div id="response-articles">

</div>

<?php get_footer();
