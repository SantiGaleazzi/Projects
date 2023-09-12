<section class="sm:py-5 bg-gray-150-new">
	<div class="container">
        <div class="flex flex-wrap justify-center xl:justify-between ">
            <?php if( have_rows('where_work_list_repeater') ) : $counter = 0;?>
                <?php
                    while( have_rows('where_work_list_repeater') ): the_row();
                    
                    $counter++;
                    $title =  strtolower(get_sub_field('title'));
                    $has_border = $counter % 2 == 0 ? 'border-t sm:border-t-0 border-b sm:border-b-0 sm:border-l sm:border-r border-separator' : '';
                    $icon = get_sub_field('icon');

                ?>
                    <div class="w-full sm:w-1/3 md:w-1/3 py-6 flex flex-col md:flex-row items-center justify-center <?= $has_border; ?>">
                        <div class="md:mr-6">
                            <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>" />
                        </div>

                        <div class="text-default text-center md:text-left font-roboto">
                            <div id="<?= $title; ?>" class="text-4xl leading-none font-bold">
                                <?php the_sub_field('number'); ?>+
                            </div>

                            <div class="text-lg">
                                <?php the_sub_field('title'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
	</div>
</section>
