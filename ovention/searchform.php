<form role="search" method="get" action="<?= home_url('/'); ?>">
	<input
		class="search-field tw-font-semibold tw-w-full tw-appearance-none tw-border-none tw-h-auto tw-px-7 tw-py-7 tw-text-gray-900 tw-rounded-2xl focus:tw-outline-none focus:tw-border-none focus:tw-shadow-none"
		type="search"
		name="s"
		title="Search"
		placeholder="Search..."
		value="<?= get_search_query(); ?>"
		>
</form>
