<section class="px-4 md:pb-64">
	<div class="container px-6 md:px-10 lg:pl-20 lg:pr-10 py-6 md:py-8 lg:pt-12 lg:pb-20 bg-red-500 rounded relative">
        <div class="flex flex-col md:flex-row justify-between">
            <div class="md:w-3/5 lg:w-4/6 form-contact-t relative mb-6 sm:mb-0">
              <div class="w-full md:absolute top-0 left-0 md:pr-12">
                <?php the_field('contact_form'); ?>
              </div>
            </div>

            <div class="md:w-2/5 lg:w-2/6 font-roboto text-white-pure contact-info-box">
                <div class="mb-6">
                  <div class="font-bold text-2xl">
                    <?php the_field('contact_form_po_title'); ?>
                  </div>
                  <div class="font-light text-2xl">
                    <?php the_field('contact_form_po_address'); ?>
                  </div>
                </div>

                <div>
                  <div class="font-light text-2xl">
                    <?php the_field('contact_form_office_title'); ?>
                  </div>
                  <div class="font-light">
                    <?php the_field('contact_form_office_hours'); ?>
                  </div>
                </div>
            </div>
        </div>
	</div>
</section>