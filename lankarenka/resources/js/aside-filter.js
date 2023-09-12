// Aside filter for mobile devices
const asideFilter = document.querySelector('.sancodes-filter');

if ( asideFilter !== null ) {
    
    const filters = asideFilter.querySelector('.filters')
    const closeFilters = asideFilter.querySelectorAll('.close');
    const openFilter = document.querySelector('.sancodes-filter-button');

    openFilter.addEventListener('click', () => {

        filters.classList.add('open');
        asideFilter.classList.add('open');
        document.body.classList.add('overflow-hidden');

    });

    closeFilters.forEach( (filter) => {

        filter.addEventListener('click', () => {

            filters.classList.remove('open');
            asideFilter.classList.remove('open');
            document.body.classList.remove('overflow-hidden');
    
        });

    });

}