<div class="flex flex-col xl:flex-row justify-center">
	<form id="internship-form-nav" method="post" data-page-id="<?= get_the_ID(); ?>" action="<?= admin_url('admin-ajax.php'); ?>" class="flex flex-wrap items-center justify-center">
		<div class="internship-menu-option active" data-internship-option="home">
			Home
		</div>
		<div class="internship-menu-option" data-internship-option="about-internships">
			About
		</div>
		<div class="internship-menu-option" data-internship-option="degree-tracks">
			Degree Tracks
		</div>
		<div class="internship-menu-option" data-internship-option="stories">
			Stories
		</div>
		<div class="internship-menu-option" data-internship-option="faqs">
			FAQs
		</div>
	</form>

	<div class="text-center xl:flex-none mt-5 xl:mt-0">
		<a href="/internships-opportunities" class="text-white-pure font-black leading-none px-10 py-3 bg-orange-500 inline-block">Search for Internships</a>
	</div>
</div>
