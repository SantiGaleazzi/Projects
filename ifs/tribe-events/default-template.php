<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>

<!-- BANNER -->
<div id="banner-active" class="banner banner--bg banner-taxonomy" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/events/events-bannernoop.jpg');">
  <div class="banner--color">
    <div class="row h100">
      <div class="large-7 columns banner__description">

        <div class="table w100 h100">
          <div class="table-cell vAmiddle">

            <h1 class="banner__title">Events</h1>
            
              
          </div>
        </div>
        
      </div>
      <div class="banner__image show-for-large" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/events/events-bannernoop.jpg'); ">
        
      </div>
    </div>  
  </div>  
</div>
<!-- /BANNER -->

<main id="tribe-events-pg-template" class="tribe-events-pg-template eventspage">
	<?php tribe_events_before_html(); ?>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</main> <!-- #tribe-events-pg-template -->
<?php
get_footer();
