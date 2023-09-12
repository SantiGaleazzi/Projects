<section class="section-quoted px-6 pb-12 pt-16">
    <div class="container text-center text-default">
        <?php if ( get_field('get_inspired_video_content') ) : ?>
            <div class="mb-8 title-video">
				<?php the_field('get_inspired_video_content'); ?>
			</div>
        <?php endif; ?>

       <div class="flex justify-center">
            <div class="lg:w-5/6">
                <div class="has-video">
                    <?php the_field('get_inspired_video'); ?>
                </div>
            </div>
       </div>
    </div>
</section>
