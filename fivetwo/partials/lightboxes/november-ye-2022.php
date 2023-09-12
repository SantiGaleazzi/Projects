<?php if ( check_range('22-11-2022', '30-11-2022') || ( isset($_GET['lightbox']) && $_GET['lightbox'] === 'nov-ye-2022' ) ) : ?>
	<div class="year-end-lightbox">
		<div class="lightbox-container">
			<div class="close-lightbox">x</div>
			<div class="lightbox-content">
				<div class="lightbox-logo">
					<img src="<?= get_template_directory_uri(); ?>/assets/img/fivetwo-white-logo.png" alt="FiveTwo Logo" />
				</div>

				<div class="lightbox-text">
					<span>We're raising $20K to launch more ministries that make an eternal difference.</span> For every $4 you give, 1 person meets Jesus.
				</div>

				<div class="lightbox-button">
					<a href="https://fivetwo.com/donation/1million-hp/">GIVE NOW</a>
				</div>
			</div>

			<div class="lightbox-background"></div>
		</div>
	</div>
<?php endif;
