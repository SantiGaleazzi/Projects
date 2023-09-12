// CSS Styles components/filter-options
// Custom Filter Option
const filteringForms = document.querySelectorAll('.woocommerce-ordering');

if ( filteringForms !== null ) {

    // Aside filtering Aside Filter is for Mobile
    filteringForms.forEach((filterForm) => {

        // WooCommerce Select
        const wooSelect = filterForm.querySelector('.orderby');
        const wooOptions = wooSelect.querySelectorAll('option');

        // Custom Select
        const customSelect = filterForm.querySelector('.sancodes-select');
        const select = customSelect.querySelector('.selected-option');
        const filters = customSelect.querySelector('.select-options');
        const options = filters.querySelectorAll('.option');

        // WooCommerce
        wooOptions.forEach( (input) => {

            // Get the selected option from the hidden select
            if ( input.getAttribute('selected') ) {

                // Assign the text content to the custom select
                select.innerHTML = input.innerHTML;

                // Check which option from the wooSelect has been select and
                options.forEach( (option) => {

                    // When the WooCommerce selected option value is equal to the custom select attribute, adds the selected class to the custom option
                    if ( input.value == option.getAttribute('rel') ) {

                        option.classList.add('selected');
                    }

                    return;

                });

            }

            return;

        });

        // Opens custom select options
        select.addEventListener('click', (event) => {

            event.stopPropagation();

            if ( !filters.classList.contains('open') ) {

                filters.classList.add('open');
                select.classList.add('open');

                return;

            }

            filters.classList.remove('open');
            select.classList.remove('open');

        });

        // When option is selected
        options.forEach( (option) => {

            option.addEventListener('click', (event) => {

                const selectedFilter = option.getAttribute('rel');

                select.innerHTML = event.target.textContent;

                filters.classList.remove('open');
                select.classList.remove('open');

                wooSelect.value = selectedFilter;
                filterForm.submit();

            });

        });

        // When user clicks outside the Select
        document.addEventListener('click', () => {

            filters.classList.remove('open');
            select.classList.remove('open');

        })
    });

}