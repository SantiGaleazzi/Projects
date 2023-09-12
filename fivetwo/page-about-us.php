<?php get_header(); ?>

    <div class="single-banner about-title-bg">
        <?php the_title(); ?>
    </div>

    <?php if(get_field("title_our_story_section_about_page") || get_field("subtitle_our_story_section_about_page") || get_field("image_our_story_section_about_page") || get_field("content_our_story_section_about_page")): ?>
        <section class="our-story-about-us-page" id="section-1">
            <div class="grid-container">
                <div class="grid-x align-top grid-padding-x">
                    <div class="cell medium-6">
                        <?php if (get_field("title_our_story_section_about_page")): ?>
                            <h2 class="our-story-title"><?= the_field("title_our_story_section_about_page"); ?></h2>
                        <?php endif; ?>
                        <?php if (get_field("subtitle_our_story_section_about_page")): ?>
                            <div class="our-story-subtitle"><?= the_field("subtitle_our_story_section_about_page"); ?></div>
                        <?php endif; ?>
                        <?php if (get_field("image_our_story_section_about_page")):
                            $image_our_story_section_about_page = get_field("image_our_story_section_about_page");
                        ?>
                            <img src="<?= $image_our_story_section_about_page['url']; ?>" alt="<?= $image_our_story_section_about_page['title']; ?>" title="<?= $image_our_story_section_about_page['title']; ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="cell medium-6">
                        <?php if (get_field("content_our_story_section_about_page")): ?>
                            <div class="copy-our-story"><?= the_field("content_our_story_section_about_page"); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="about-us-intro" id="section-2" style="background-image: url('<?php the_field('about_us_mission_background_image'); ?>');">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-right">
                <div class="cell large-7">
                    <div class="title">
                        <?php the_field('about_us_mission_title'); ?>
                    </div>

                    <div class="description">
                        <?php the_field('about_us_mission_description'); ?>
                    </div>
                </div>
            </div>

            <div class="grid-x mission-circles">
                <div class="cell medium-10 large-9">
                    <div class="mission-options">
                        <div class="medium-blue">
                            Clarify, equip, <br> and activate <br> congregations <br> <span>to <em>go</em></span>
                        </div>

                        <div class="large-dark">
                            Launch more <br> ventures with <br> local church <br> connections
                        </div>

                        <div class="small-pink">
                            More people <br>know Jesus
                        </div>

                        <div class="large-blue">
                            Jesus’s Church <br>grows, local <br>communities are <br>transformed
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<section class="about-us-our-process" id="section-3">
		<div class="grid-container">
			<div class="grid-x align-center align-middle grid-padding-x">
				<div class="cell medium-11">
					<div class="title">
						<?php the_field('about_us_our_process_title'); ?>
					</div>

					<div class="description">
						<?php the_field('about_us_our_process_description'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

    <section class="about-us-clarify-starters" id="section-4">
        <div class="grid-container">
            <div class="grid-x align-middle grid-padding-x">
                <div class="cell medium-6">
                    <div class="title">
                        <?php the_field('about_us_clarify_title'); ?>
                    </div>

                    <div class="description">
                        <?php the_field('about_us_clarify_description'); ?>
                    </div>
                </div>

                <div class="cell medium-6">
                    <?php if ( have_rows('about_us_clarify_steps') ) : $counter = 0; ?>
                        <?php while ( have_rows('about_us_clarify_steps') ) : the_row(); $counter++; ?>
                            <div class="clarification-item">
                                <div class="number">
                                    <?= $counter; ?>
                                </div>

                                <div class="info">
                                    <div class="name">
                                        <?php the_sub_field('name'); ?>
                                    </div>

                                    <?php if ( have_rows('list_items') ) : ?>
                                        <ul class="items-list">
                                            <?php while ( have_rows('list_items') ) : the_row(); ?>
                                                <li class="item">
                                                    <?php the_sub_field('item'); ?>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us-equip-starters" id="section-5">
        <div class="grid-container">
            <div class="grid-x align-middle align-justify grid-padding-x">
                <div class="cell medium-5">
                    <div class="title">
                        <?php the_field('about_us_equip_title'); ?>
                    </div>

					<div class="description">
						<?php the_field('about_us_equip_description'); ?>
					</div>
                </div>

				<div class="cell medium-6">
					<?php if ( have_rows('about_us_equip_list_repeater') ) : ?>
						<?php while ( have_rows('about_us_equip_list_repeater') ) : the_row(); ?>
							<div class="starter-card">
								<div class="resource">
									<div class="name">
										<?php the_sub_field('name'); ?>
									</div>


									<div class="description">
										<?php the_sub_field('description'); ?>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
            </div>
        </div>
    </section>

    <section class="about-us-active-starters" id="section-6">
        <div class="grid-container">
            <div class="grid-x align-bottom">
                <div class="cell large-6">
                    <div class="title">
                        <?php the_field('about_us_activate_title'); ?>
                    </div>
                </div>

                <div class="cell large-6">
                    <div class="description">
                        <?php the_field('about_us_activate_description'); ?>
                    </div>
                </div>
            </div>

            <div class="grid-x grid-padding-x large-align-center active-resources">
                <div class="cell medium-4 large-3">
                    <div class="active-card">
                        <div class="info">
                            <div class="title">
                                <?php the_field('about_us_activate_build'); ?>
                            </div>

                            <div class="description">
                                <?php the_field('about_us_activate_build_description'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cell medium-4 large-3">
                    <div class="active-card">
                        <div class="info">
                            <div class="title">
                                <?php the_field('about_us_activate_fund'); ?>
                            </div>

                            <div class="description">
                                <?php the_field('about_us_activate_fund_description'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cell medium-4 large-3">
                    <div class="active-card">
                        <div class="info">
                            <div class="title">
                                <?php the_field('about_us_activate_launch'); ?>
                            </div>

                            <div class="description">
                                <?php the_field('about_us_activate_launch_description'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us-become-starter" id="section-7">
        <div class="grid-container">
            <div class="grid-x align-center">
                <div class="cell medium-9 large-8">
                    <div class="title">
                        <?php the_field('about_us_become_title'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us-our-team" id="section-8">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell medium-7">
                    <div class="title">
                        <?php the_field('about_us_our_team_title'); ?>
                    </div>

                    <div class="description">
                        <?php the_field('about_us_our_team_description'); ?>
                    </div>
                </div>
            </div>

            <?php if ( get_field('about_us_our_team_list') ) : ?>
                <div class="grid-x">
                    <?php
                        foreach ( get_field('about_us_our_team_list') as $team_member ) :

                            $permalink = get_permalink( $team_member->ID );
                            $title = get_the_title( $team_member->ID );
                            $content = wp_trim_words( $team_member->post_content, 42, '...');
                            $thumbnail = get_the_post_thumbnail_url( $team_member->ID );

                            $full_name = get_field( 'full_name', $team_member->ID );
                            $spot = get_field( 'spot', $team_member->ID );
                            $location_member = get_field( 'location_member', $team_member->ID );

                    ?>
                        <div class="cell medium-6 team-card">
                            <div class="thumbnail">
                                <img src="<?= $thumbnail; ?>" alt="<?= $full_name; ?>">
                            </div>

                            <div class="board-description">
                                <div class="name">
                                    <?= $full_name; ?>
                                </div>

                                <div class="spot">
                                    <?= $spot; ?>
                                </div>

                                <div class="location">
                                    <?= $location_member; ?>
                                </div>

                                <div class="content">
                                    <?= $content; ?>
                                </div>

                                <div class="permalink">
                                    <span class="team__member-lightbox" data-postid="<?= $team_member->ID; ?>">READ MORE ></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="about-us-meet-out-board" id="section-9">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell medium-7 large-6">
                    <div class="title">
                        <?php the_field('about_us_board_team_title'); ?>
                    </div>

                    <div class="description">
                        <?php the_field('about_us_board_team_description'); ?>
                    </div>
                </div>
            </div>

            <?php if ( get_field('about_us_board_team_list') ) : ?>
                <div class="grid-x">
                    <?php
                        foreach ( get_field('about_us_board_team_list') as $board_member ) :

                            $permalink = get_permalink( $board_member->ID );
                            $title = get_the_title( $board_member->ID );
                            $content = wp_trim_words( $board_member->post_content, 42, '...');
                            $thumbnail = get_the_post_thumbnail_url( $board_member->ID );

                            $full_name = get_field( 'full_name', $board_member->ID );
                            $spot = get_field( 'spot', $board_member->ID );
                            $location_member = get_field( 'location_member', $board_member->ID );

                    ?>
                        <div class="cell medium-6 board-card">
                            <div class="thumbnail">
                                <img src="<?= $thumbnail; ?>" alt="<?= $full_name; ?>">
                            </div>

                            <div class="board-description">
                                <div class="name">
                                    <?= $full_name; ?>
                                </div>

                                <div class="spot">
                                    <?= $spot; ?>
                                </div>

                                <div class="location">
                                    <?= $location_member; ?>
                                </div>

                                <div class="content">
                                    <?=  $content; ?>
                                </div>

                                <div class="permalink">
                                    <span class="team__member-lightbox" data-postid="<?= $board_member->ID; ?>">READ MORE ></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <div class="reveal" id="Biography" data-reveal></div>

	<?php get_template_part('partials/lightboxes/2023/subscribe-form'); ?>

<?php get_footer(); ?>
