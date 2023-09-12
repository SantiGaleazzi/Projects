<?php
	/*
	*Template Name: Home
	*/

	get_header();
	$home_banner = get_field('home_banner');
	$first_section = get_field('first_section');
	$schedule_a_demo = get_field('schedule_a_demo');
	$home_app_section = get_field('home_app_section');
	$home_slider = get_field('home_slider');

	// Culinary Blog
	$blog_url = get_field('culinary_blog_link');
	$blog_image = get_field('culinary_blog_image');

    //Lead Time Banner
    $icon_leadtime_banner = get_field('icon_leadtime_banner','option');
    $text_leadtime_banner = get_field('text_leadtime_banner','option');
    $button_leadtime_banner = get_field('button_leadtime_banner','option');

?>
<!--  LEAD TIME BANNER -->
<?php
    if($icon_leadtime_banner && $text_leadtime_banner && $button_leadtime_banner){
        ?>
            <div class="lead-time-banner">
                <div class="lead-time-bg">
                    <div class="lead-time-container">
                        <img src="<?= $icon_leadtime_banner['url']; ?>" alt="<?= $icon_leadtime_banner['alt']; ?>" width="30">
                        <p><?= $text_leadtime_banner; ?></p>
                        <div class="lead-time-button menu-item--contact">
                            <?= $button_leadtime_banner; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
?> 

<?php 
	$storeElements = check_range("13-06-2023", "13-06-2032");

	if( $storeElements && ! isset( $_GET['elements'] ) || isset($_GET['elements']) && $_GET['elements'] == 'store'   ){
		//Store Sticky Bar
	    get_template_part( 'partials/content', 'store-sticky-bar' );
	    //Store Lightbox
	    get_template_part( 'partials/content', 'store-lightbox' );

	}
?>


<!--  HOME BANNER -->
<div class="home-banner">
	<div class="row">
		<div class="large-10 small-centered columns home-banner__text">
			<h1>
				<?= $home_banner['home_banner_title']; ?>
			</h1>
			<h3>
				<?= $home_banner['home_banner_secondary']; ?>
			</h3>
		</div>
	</div>
	<div class="row oven_slider">
		<div class="large-4 columns home-banner__oven-info">
				<div class="home-banner__controls">
					<div class="home-banner__legend">
						<?php
							$rows = $home_slider['home_slider'];

							if ($rows) :
						?>
							<?php
								foreach($rows as $row) :
							?>
								<div>
									<div class="home-banner-oven__name">
										<?= $row['home_slider_oven_name']; ?>
									</div>
									<div class="home-banner-oven__description">
										<?= $row['home_slider_oven_description']; ?>
									</div>
									<div class="home-banner-oven__link">
										<a href="<?= $row['home_slider_oven_link']['url']; ?>"><?= $row['home_slider_oven_link']['title']; ?> the <?= $row['home_slider_oven_name']; ?> ovens</a> &#187;
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			<?php $rows = $home_banner['home_banner_buttons'];
				if($rows):
			?>
					<?php foreach($rows as $row):
						$buttondata = $row['home_banner_button_content'];
						$typebutton = $row['home_banner_button_color'];
					?>
						<a href="<?= $buttondata['url']; ?>" class="<?php if ($typebutton == 'colors') : echo 'find-oven-quiz'; endif ?> home-banner__button home-banner__button--<?= $typebutton; ?> ovention-button ovention-button--<?= $typebutton; ?>" target="<?= $buttondata['target']; ?>"><?= $buttondata['title']; ?> &#187;</a>
					<?php endforeach; ?>
			<?php
				endif;
			?>
			<div class="home-banner__stats">
				<?= $home_banner['home_banner_stats']; ?>
			</div>
		</div>
		<div class="large-8 columns">
			<div class="home-banner__slider">
				<?php $rows = $home_slider['home_slider'];
					if($rows):
					?>
						<?php foreach($rows as $row):
							$home_slider_image = $row['home_slider_image'];
						?>
						<div class="home-banner__single-slider">
					 		<img src="<?= $home_slider_image['url']; ?>" alt="<?= $home_slider_image['alt']; ?>">
					 	</div>
						<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<img src="<?php bloginfo('template_url');?>/assets/img/table.png" alt="table" class="home-banner__table">
</div>
<!--  /HOME BANNER -->

<!-- Culinary Blog -->
<div class="home-culinary-blog">
	<div class="row">
		<div class="small-12 columns">
			<img src="<?= $blog_image['url'] ?>" alt="<?= $blog_image['alt'] ?>" class="pizza-img show-for-large">
			<div class="home-culinary-blog__title">
				<?php the_field('culinary_blog_title'); ?>
			</div>
			<div class="home-culinary-blog__archive">
				<a href="<?= $blog_url['url'] ?>"><?= $blog_url['title'] ?></a> &#187;
			</div>
		</div>
	</div>

	<div class="row">
		<?php
            // WP_Query arguments
			$args = array (
				'post_type'              => 'post',
				'posts_per_page'         => 3,
				'order'                  => 'DESC',
			);

				// The Query
				$query = new WP_Query( $args );

			if ( $query-> have_posts() ) :
				while ( $query->have_posts() ) : $query->the_post();
		?>
		<div class="medium-4 columns">
			<div class="home-culinary-blog-post">
				<?php
					if ( has_post_thumbnail() ):
				?>
				<div class="home-culinary-blog-post__image">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'full' ); ?>
					</a>
				</div>
				<?php else:  ?>
                    <a href="<?php the_permalink(); ?>"><img class="home-culinary-blog-post__default" src="<?php bloginfo('template_url' ) ?>/assets/img/press-default.jpg" alt="press-default"/></a>
				<?php endif; ?>

				<div class="home-culinary-blog-post-content">
					<div class="home-culinary-blog-post__title">
						<?php the_title(); ?>
					</div>
					<div class="home-culinary-blog-post-publication">
						<div class="home-culinary-blog-post__date">
							<?= get_the_date(); ?>
						</div>
						<div class="home-culinary-blog-post__category">
							<?php
								$categories = get_the_category();

								if ( ! empty( $categories ) ):
									echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
								endif;
							?>
						</div>
					</div>
					<div class="home-culinary-blog-post__link">
						<a href="<?php the_permalink(); ?>">Read More &#187;</a>
					</div>
				</div>
			</div>
		</div>
		<?php
				endwhile;
            endif;
        	wp_reset_postdata();
        ?>
	</div>
</div>
<!-- Culinary Blog -->


<!--  FIRTS SECTION -->
<div class="main-home cloud-pattern">
	<div class="row">
		<div class="small-12 columns main-home__intro">
			<h2>
				<?= $first_section['first_section_title']; ?>
			</h2>
			<?php
				if ($first_section['first_section_content']) :
			?>
				<div class="main-home__text">
					<?= $first_section['first_section_content']; ?>
				</div>
			<?php endif; ?>
			<a href="<?= $first_section['first_section_button']['url']; ?>" class="main-home__button--intro ovention-button ovention-button--colors"><?= $first_section['first_section_button']['title']; ?> &raquo;</a>
		</div>
	</div>
	<!--  DYNAMIC OVENS -->
	<div class="row">
		<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => 2,
				'post__in' => array( 259, 261 ),
				'meta_key' => '_wp_page_template',
				'meta_value' => 'template-ovens.php',
				'order'          => 'ASC',
				//'orderby'        => 'rand'
			);

			$query = new WP_Query( $args );

			if($query -> have_posts() ):

				while ($query -> have_posts()):

					$query -> the_post();
					$id = get_the_id();
					$mini_data = (get_field('mini_data',$id)) ? get_field('mini_data',$id) : '' ;
				?>
					<div class="small-11 small-centered medium-7  large-6 large-uncentered columns main-home__oven">
						<img src="<?=$mini_data['mini_intro_image']['url']; ?>" alt="<?=$mini_data['mini_intro_image']['alt']; ?>">
						<a href="<?php the_permalink(); ?>"><h3><?=$mini_data['mini_title']?></h3></a>
						<div class="main-home__description">
							<?=$mini_data['mini_description']?>
						</div>
						<div class="main-home__link">
							<a href="<?php the_permalink(); ?>" class="">Learn more about the <?php the_title(); ?> &#187;</a>
						</div>
					</div>
				<?php
				endwhile;
			endif;
		?>
	</div>
	<!--  /DYNAMIC OVENS -->
	<div class="text-center">
		<a href="#" class="contact-us-btn main-home__button--oven ovention-button ovention-button--colors">Get help &#187;</a>
	</div>

</div>
<!--  /FIRTS SECTION -->

<!--  SCHEDULE A DEMO -->
<div class="demo-bar">
	<div class="row">
		<div class="medium-8 large-8 columns demo-bar__text">
			<h2>
				<?= $schedule_a_demo['schedule_a_demo_title']; ?>
			</h2>
			<?= $schedule_a_demo['schedule_a_demo_content']; ?>
			<a href="<?= $schedule_a_demo['schedule_a_demo_button']['url']; ?>" class="demo-schedule-lightbox demo-bar__button ovention-button ovention-button--orange"><?= $schedule_a_demo['schedule_a_demo_button']['title']; ?> &raquo;</a>
		</div>
		<div class="medium-4 large-4 columns demo-bar__image">
			<img src="<?= $schedule_a_demo['schedule_a_demo_image']['url']; ?>" alt="<?= $schedule_a_demo['schedule_a_demo_image']['alt']; ?>">
		</div>
	</div>
</div>
<!--  /SCHEDULE A DEMO -->

<!--  HOME APP -->
<div class="home-app full-cloud-pattern">
	<div class="row">
		<div class="large-7 columns home-app__text">
			<img src="<?php echo bloginfo('template_url') ?>/assets/img/mobile-friendly.png" alt="The Ovention Oven app is now mobile friendly!" class="home-app__ribbon">
			<h2>
				<?= $home_app_section['home_app_section_title']; ?>
			</h2>
			<?= $home_app_section['home_app_section_content']; ?>
			<a href="<?= $home_app_section['home_app_section_button']['url']; ?>" class="home-app__button ovention-button ovention-button--colors"><?= $home_app_section['home_app_section_button']['title']; ?> &raquo;</a>
		</div>
		<div class="large-5 columns home-app__image">
			<img src="<?= $home_app_section['home_app_section_image']['url']; ?>" alt="<?= $home_app_section['home_app_section_image']['alt']; ?>">
		</div>
	</div>
</div>
<!--  /HOME APP -->

<!--  BLOG BAR -->
<?php get_template_part( 'partials/content', 'culinary_bar' ); ?>
<!--  /BLOG BAR -->

<!--  STICKY BAR -->
<div class="home-sticky">
	<div class="home-sticky__close"><img src="<?php bloginfo('template_url');?>/assets/img/close-modal.png" alt="Close" ></div>
	<img src="<?php bloginfo('template_url');?>/assets/img/new_ribbon.png" alt="New!" class="home-sticky__ribbon">
	<h3>Now you <br> can have <br> recipe power <br> in your pocket</h3>
	<p>Creating, uploading, and accessing recipes for your Ovention Oven just got easier!</p>
	<a href="https://recipes.oventionovens.com/" class="ovention-button ovention-button--white">Try it now &raquo;</a>
	<img src="<?php bloginfo('template_url');?>/assets/img/sticky_phone.png" alt="Try it now" class="home-sticky__phone">
</div>
<!--  /STICKY BAR -->
<?php get_footer(); ?>
