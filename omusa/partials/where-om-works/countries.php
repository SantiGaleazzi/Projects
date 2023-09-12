<section class="px-6 py-16 lg:py-24 relative">
	<div id="trigger-map"></div>
	<div class="container relative flex flex-wrap">
		<div class="mb-8 lg:mb-0">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/world-map.png" usemap="#worldmap">
        </div>

        <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
            <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new north-america cursor-pointer arrow-down-red lg:absolute z-0 label-map">
                <div class="text-2xl xl:text-3xl text-red-500 font-light font-roboto number-country">376</div>
                <div class="text-sm xl:text-base text-black-700-new font-semibold font-roboto text-left leading-none pl-4">North America</div>
            </div>
        </div>

        <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
            <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new latin-america cursor-pointer arrow-down-red lg:absolute label-map">
                <div class="text-2xl xl:text-3xl text-red-500 font-light font-roboto number-country">154</div>
                <div class="text-sm xl:text-base text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Latin America</div>
            </div>
        </div>

        <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
            <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new ships cursor-pointer arrow-down-red lg:absolute label-map">
                <div class="text-2xl xl:text-3xl text-red-500 font-light font-roboto number-country">372</div>
                <div class="text-sm xl:text-base text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Ships</div>
            </div>
        </div>

        <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
            <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new africa cursor-pointer arrow-down-red lg:absolute label-map">
                <div class="text-2xl xl:text-3xl text-red-500 font-light font-roboto number-country">601</div>
                <div class="text-sm xl:text-base text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Africa</div>
            </div>
        </div>

        <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
            <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new middle-east cursor-pointer arrow-down-red lg:absolute label-map">
                <div class="text-2xl xl:text-3xl text-red-500 font-light font-roboto number-country">347</div>
                <div class="text-sm xl:text-base text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Middle East<br class="hidden lg:block"> North Africa</div>
            </div>
        </div>

        <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">      
            <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new central-asia cursor-pointer arrow-down-red lg:absolute label-map">
                <div class="text-2xl xl:text-3xl text-red-500 font-light font-roboto number-country">283</div>
                <div class="text-sm xl:text-base text-black-700-new font-semibold font-roboto text-left leading-none pl-4">West, Central, and South Asia</div>
            </div>
        </div>

        <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
            <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new europe cursor-pointer arrow-down-red lg:absolute label-map">
                <div class="text-2xl xl:text-3xl text-red-500 font-light font-roboto number-country">1067</div>
                <div class="text-sm xl:text-base text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Europe</div>
            </div>
        </div>

        <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
            <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new india cursor-pointer arrow-down-red lg:absolute label-map">
                <div class="text-2xl xl:text-3xl text-red-500 font-light font-roboto number-country">1500</div>
                <div class="text-sm xl:text-base text-black-700-new font-semibold font-roboto text-left leading-none pl-4">India Partner</div>
            </div>
        </div>

        <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
            <div class="flex-grow lg:w-48 flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new east-asia cursor-pointer arrow-down-red lg:absolute label-map">
                <div class="text-2xl xl:text-3xl text-red-500 font-light font-roboto number-country">415</div>
                <div class="text-sm xl:text-base text-black-700-new font-semibold font-roboto text-left leading-none pl-4">East Asia</div>
            </div>
        </div>

        <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
            <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new pacific cursor-pointer arrow-down-red lg:absolute label-map">
                <div class="text-2xl xl:text-3xl text-red-500 font-light font-roboto number-country">82</div>
                <div class="text-sm xl:text-base text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Pacific</div>
            </div>
        </div>

	</div>

    <div class="container">
        <div class="text-sm text-center sm:text-left pt-4">
            <sup>*</sup>Numbers represent OM or partner workers in each area.
        </div>
    </div>
</section>
