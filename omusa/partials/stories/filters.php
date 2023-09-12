<div>
	<div class="container pb-8">
		<form id="stories-filters" action="<?= admin_url('admin-ajax.php'); ?>" method="POST" class="flex flex-wrap">
			<!-- Type of Worker -->
			<?php
                $stories_type_worker = get_terms(
                    array(
                        'taxonomy' => 'type-worker',
                        'orderby' => 'name',
						'order' => 'ASC'
                    )
                );

                if ( $stories_type_worker ) :
            ?>
				<div class="w-full sm:w-1/2 md:w-1/4 sm:px-2 mb-5 md:mb-0">
					<div class="filter">
						<div class="filter-collapsable flex items-center justify-between text-xs text-red-500 font-black leading-none px-4 py-3 cursor-pointer">
							<span class="options-selected uppercase" data-filter-name="Type of Worker">Type of Worker</span>

							<div class="flex items-center relative">
								<div class="options-counter w-5 h-5 flex items-center justify-center text-white-pure bg-red-500 rounded-full absolute top-0 right-0 -mt-1 mr-5 opacity-0 transition duration-150 ease-in-out">
									0
								</div>

								<i class="fas fa-sort-down"></i>
							</div>
						</div>

						<div class="filter-terms px-2">
							<?php foreach ( $stories_type_worker as $worker ) : ?>
								<div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
									<label for="worker_<?= $worker->term_id; ?>" class="flex items-center">
										<input type="checkbox" id="worker_<?= $worker->term_id; ?>" name="worker_<?= $worker->term_id; ?>" data-name="<?= $worker->name; ?>" data-term-id="<?= $worker->term_id; ?>" class="mr-2">
										<?= $worker->name; ?>
									</label>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
            <!-- Type of Worker -->

			<!-- Region -->
			<?php
                $stories_region = get_terms(
                    array(
                        'taxonomy' => 'region',
                        'orderby' => 'name',
						'order' => 'ASC'
                    )
                );

                if ( $stories_region ) :
            ?>
				<div class="w-full sm:w-1/2 md:w-1/4 sm:px-2 mb-5 md:mb-0">
					<div class="filter">
						<div class="filter-collapsable flex items-center justify-between text-xs text-red-500 font-black leading-none px-4 py-3 cursor-pointer">
							<span class="options-selected uppercase" data-filter-name="Region">Region</span>

							<div class="flex items-center relative">
								<div class="options-counter w-5 h-5 flex items-center justify-center text-white-pure bg-red-500 rounded-full absolute top-0 right-0 -mt-1 mr-5 opacity-0 transition duration-150 ease-in-out">
									0
								</div>

								<i class="fas fa-sort-down"></i>
							</div>
						</div>

						<div class="filter-terms px-2">
							<?php foreach ( $stories_region as $region ) : ?>
								<div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
									<label for="region_<?= $region->term_id; ?>" class="flex items-center">
										<input type="checkbox" id="region_<?= $region->term_id; ?>" name="region_<?= $region->term_id; ?>" data-name="<?= $region->name; ?>" data-term-id="<?= $region->term_id; ?>" class="mr-2">
										<?= $region->name; ?>
									</label>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
            <!-- Region -->

			<!-- Type Impact -->
			<?php
                $stories_type_impact = get_terms(
                    array(
                        'taxonomy' => 'type-impact',
                        'orderby' => 'name',
						'order' => 'ASC'
                    )
                );

                if ( $stories_type_impact ) :
            ?>
				<div class="w-full sm:w-1/2 md:w-1/4 sm:px-2 mb-5 md:mb-0">
					<div class="filter">
						<div class="filter-collapsable flex items-center justify-between text-xs text-red-500 font-black leading-none px-4 py-3 cursor-pointer">
							<span class="options-selected uppercase" data-filter-name="Type of Impact">Type of Impact</span>

							<div class="flex items-center relative">
								<div class="options-counter w-5 h-5 flex items-center justify-center text-white-pure bg-red-500 rounded-full absolute top-0 right-0 -mt-1 mr-5 opacity-0 transition duration-150 ease-in-out">
									0
								</div>

								<i class="fas fa-sort-down"></i>
							</div>
						</div>

						<div class="filter-terms px-2">
							<?php foreach ( $stories_type_impact as $impact ) : ?>
								<div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
									<label for="impact_<?= $impact->term_id; ?>" class="flex items-center">
										<input type="checkbox" id="impact_<?= $impact->term_id; ?>" name="impact_<?= $impact->term_id; ?>" data-name="<?= $impact->name; ?>" data-term-id="<?= $impact->term_id; ?>" class="mr-2">
										<?= $impact->name; ?>
									</label>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
            <!-- Type Impact -->

			<div class="selected_filtered_options"></div>

			<div class="w-full sm:w-1/2 md:w-1/4 text-center sm:px-2">
				<button id="reset-stories" type="button" class="w-full text-white-pure font-black leading-none px-4 py-3 bg-red-500">Clear Filter(s)</button>
			</div>
			
			<input type="hidden" id="current_stories_page" name="page_number" value="1">
			<input type="hidden" name="action" value="search_for_stories">
		</form>
	</div>
</div>