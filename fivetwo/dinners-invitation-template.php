<?php

	/*
	* Template name: Dinners Invitation
	*/

    $golf_bg_img = get_field('golf_invite_bg_img');
    $golf_invite_logo = get_field('golf_invite_logo');
    $golf_invite_video_link = get_field('golf_invite_video_link');

    if ( $golf_invite_video_link) {

        $golf_invite_video_target = $golf_invite_video_link['target'] ? $golf_invite_video_link['target'] : '_self';
		
    }
	
    $golf_invite_video_image = get_field('golf_invite_video_image');
    $golf_invite_placeholder_image = get_field('golf_invite_placeholder_image');

    $golf_invite_video_url = get_field('golf_invite_default_video_url');

    $video_id = $_GET['user'];

    if ( !isset($video_id) ) {

        $video_id = substr($golf_invite_video_url, strrpos($golf_invite_video_url, '/') + 1);

    }

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WSSCN34');</script>
    <!-- End Google Tag Manager -->

    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#27466c">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FIVE TWO</title>

    <?php wp_head(); ?>

    <meta name="google-site-verification" content="FRI76O56hToG8knNJKS9YhDHS6mcIXvY0flSvnKHu5c" />


</head>
<body <?php body_class(); ?> data-scroll>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSSCN34"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <section class="golf-invite" style="background-image: url('<?= $golf_bg_img['url']; ?>');">
        <div class="grid-container relative">

            <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/shape-pink-1.png" alt="Black Detail" class="content-black-detail">

            <div class="grid-x grid-padding-x">
                <div class="cell">
                    <div class="golf-invite__logo <?= $golf_invite_video_url ? '' : 'text-center'; ?>">
                        <a href="<?php bloginfo('url'); ?>" aria-hidden="true">
                            <img src="<?= $golf_invite_logo['url']; ?>" alt="<?= $golf_invite_logo['alt']; ?>">
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid-x grid-padding-x <?= $golf_invite_video_url ? '' : 'align-center'; ?>">

                <div class="cell <?= $golf_invite_video_url ? 'large-6' : 'text-center large-10'; ?>">
                    <div class="intro">

						<?php if ( get_field('golf_invite_event_image') ) : ?>
							<img class="intro__image" src="<?= get_field('golf_invite_event_image')['url']; ?>" alt="<?= get_field('golf_invite_event_image')['alt']; ?>">
						<?php endif; ?>

                        <h1 class="intro__title intro_gloria">
							<?php the_field('golf_invite_title'); ?>
						</h1>

                        <p class="intro__description">
							<?php the_field('golf_invite_description'); ?>
						</p>

						<?php if ( get_field('golf_invite_speaker_name') ) : ?>
							<div class="event-speaker">
								<div class="speaker-avatar">
									<img src="<?php the_field('golf_invite_speaker_avatar'); ?>" alt="<?php the_field('golf_invite_speaker_name'); ?>">
								</div>

								<div class="speaker-info">
									<div class="speaker-name">
										<?php the_field('golf_invite_speaker_name'); ?>
									</div>

									<div class="speaker-position">
										<?php the_field('golf_invite_speaker_position'); ?>
									</div>

									<div class="speaker-organization">
										<?php the_field('golf_invite_speaker_organization'); ?>
									</div>
								</div>
							</div>
						<?php endif; ?>
                    </div>
                </div>

				<?php if ( $golf_invite_video_url ) : ?>
					<div class="cell large-6 relative">
						<div class="video">
							<div class="video__frame video_gloria" style="background-image: url('<?= $golf_invite_placeholder_image['url']; ?>');">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/golf-invite/golf-invite-play.png" alt="Play Button" class="golf-invite--open-video open-gloria-video">
							</div>

							<p class="video__description">
								<?php the_field('golf_invite_video_description'); ?>
							</p>
						</div>
					</div>
				<?php endif; ?>
            </div>
        </div>
    </section>

	<?php if ( get_field('golf_invite_event_title') ) : ?>
		<section class="golf-invite-event">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="cell">
						<h1 class="title">
							<?php the_field('golf_invite_event_title'); ?>
						</h1>
					</div>
				</div>
			</div>

			<div class="grid-container">
				<div class="grid-x grid-padding-x text-center align-middle event-details">
					<div class="cell medium-6 event-venue">
						<a href="<?php the_field('golf_invite_event_venue_url'); ?>" target="_blank" rel="nofollow noopener">
							<img src="<?= get_field('golf_invite_event_venue_logo')['url']; ?>" alt="<?= get_field('golf_invite_event_venue_logo')['alt']; ?>">
						</a>
					</div>

					<div class="cell medium-6 event-parking">
						<a href="<?php the_field('golf_invite_event_parking_url'); ?>" target="_blank" rel="nofollow noopener">
							<img src="<?= get_field('golf_invite_event_parking_logo')['url']; ?>" alt="<?= get_field('golf_invite_event_parking_logo')['alt']; ?>">
						</a>
					</div>
				</div>
			</div>

			<div class="grid-container">
				<div class="grid-x grid-padding-x text-center">
					<div class="cell">
						<div class="questions-jumper">
							<a class="pink-button big" href="#faqs">
								questions? see our FAQ’s
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

    <section class="golf-invite-question">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell">
                    <div class="question">
                        <?php the_field('golf_invite_question'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="golf-invite-form">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-6">
                    <div class="content gloria-dei learn-more-dinners">
                        <?php the_field('golf_invite_content'); ?>
                    </div>
                </div>

                <div class="cell medium-6">
                    <div class="form virtuous-form-styles">
                        <h1 class="title">
							<?php the_field('golf_invite_form_title'); ?>
						</h1>

                        <?php the_field('golf_invite_form'); ?>
                    </div>
                </div>
            </div>
        </div>

        <img src="<?php bloginfo('template_url'); ?>/assets/img/golf-invite/bg-shape-pink.png" alt="Golf Field" class="golf-field">
    </section>

    <section class="golf-invite-lightbox">
        <div class="golf-invite-lightbox__container">
            <div class="golf-invite-video">
                <div class="golf-invite-video__close" aria-hidden="true"><i class="fas fa-times"></i></div>
                <iframe src="https://player.vimeo.com/video/<?= $video_id; ?>" id="custom-video-golf" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
        </div>
    </section>

	<?php if ( have_rows('golf_invite_faq_questions') ) : ?>
		<section id="faqs" class="block-faqs">
			<div class="container">
				<div class="faq-title">
					<?php the_field('golf_invite_faq_title'); ?>
				</div>
				
				<div class="questions-answers">
					<?php while ( have_rows('golf_invite_faq_questions') ) : the_row(); ?>
						<div class="faq-item">
							<div class="faq-question">
								<div class="the-question">
									<?php the_sub_field('question'); ?>
								</div>

								<div class="the-icon">
									<i class="fas fa-plus"></i>
								</div>
							</div>

							<div class="faq-answer">
								<?php the_sub_field('answer'); ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

<?php get_footer();
