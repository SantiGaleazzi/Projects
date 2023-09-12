// Filter toggle
const short_job_filters = document.getElementById('short-filters');

if ( short_job_filters !== null ) {

    const all_short_filters = short_job_filters.querySelectorAll('.filter');
    const auto_selected = document.querySelector('.selected_filtered_options'); // this items stores the selected filters
    let options_pre_selected = [];

    all_short_filters.forEach((filter) => {

        filter.querySelector('.filter-collapsable').addEventListener('click', () => {

           filter.querySelector('.filter-terms').classList.toggle('active');

        });

        // Outside Click event closes dropdown options.
        document.addEventListener('mousedown', (event) => {

            if ( !filter.contains(event.target) ) {

                filter.querySelector('.filter-terms').classList.remove('active');

            }

        });
        
        // On Select checkbox options clicks.
        const all_checkboxes = filter.querySelectorAll('.filter-terms input[type="checkbox"]');
        const options_selected = filter.querySelector('.options-selected');
        const options_counter = filter.querySelector('.options-counter');
        let sum_of_options = parseInt(options_counter.textContent);
        
        // Ony triggers when the param exists 
        if ( window.location.href.indexOf('applied-filters') > -1 ) {
            
            const site_url = new URL(window.location.href)
            const urlParams = new URLSearchParams(site_url.search.slice(1));

            if ( urlParams.has('applied-filters') ) {

                let applied_filters = urlParams.get('applied-filters'); // Gets the params.
                applied_filters = applied_filters.replace(/,/g, ' '); // Remove commas and adds spaces.

                all_checkboxes.forEach((input_selected) => {

                    const term_id = input_selected.dataset.termId;
        
                    if ( applied_filters.includes(term_id) ) {

                        const input_name = input_selected.getAttribute('name');
                        const input_id = document.getElementById(input_name);

                        input_id.click();

                        sum_of_options++;

                        // This adds the term id to the array of filters selected and pushes it.
                        if ( input_id.checked && !options_pre_selected.includes(term_id) ) {

                            options_pre_selected.push(term_id);
                                
                        }
        
                    }

                });

                if ( sum_of_options == 1 ) {
                    
                    options_counter.classList.remove('opacity-0');
                    options_counter.classList.add('opacity-100');
                    options_counter.innerHTML = sum_of_options;

                    // This checks all inputs and takes only the one selected.
                    // This also anly applies when there is only one option selected
                    all_checkboxes.forEach((checked) => {

                        const input_name = checked.getAttribute('name');
                        const input_id = document.getElementById(input_name);

                        if ( input_id.checked ) {

                            options_selected.innerHTML = checked.dataset.name;

                        }

                    });
    
                }

                if ( sum_of_options >= 2 ) {

                    options_counter.classList.remove('opacity-0');
                    options_counter.classList.add('opacity-100');
                    options_counter.innerHTML = sum_of_options;
                    options_selected.innerHTML = 'More options selected';

                }

                // Assignes the options selected to the element
                auto_selected.dataset.filtersSelected = options_pre_selected.toString();

            }

        }

        // Ony triggers when the param "from-date" exists 
        if ( window.location.href.indexOf('from-date') > -1 ) {
            
            const site_url = new URL(window.location.href)
            const urlParams = new URLSearchParams(site_url.search.slice(1));

            if ( urlParams.has('from-date') ) {

                let applied_from_date = urlParams.get('from-date'); // Gets the params.

                // Assignes the TO DATE option to the element.
                auto_selected.dataset.fromDate = applied_from_date.toString();
                document.getElementById('from_date').value = applied_from_date;

            }

        }

        // Ony triggers when the param "to-date" exists 
        if ( window.location.href.indexOf('to-date') > -1 ) {
            
            const site_url = new URL(window.location.href)
            const urlParams = new URLSearchParams(site_url.search.slice(1));

            if ( urlParams.has('to-date') ) {

                let applied_to_date = urlParams.get('to-date'); // Gets the params.

                // Assignes the TO DATE option to the element.
                auto_selected.dataset.toDate = applied_to_date.toString();
                document.getElementById('to_date').value = applied_to_date;

            }

        }

        all_checkboxes.forEach((input_selected) => {

            input_selected.addEventListener('click', (event) => {

                const input_name = input_selected.getAttribute('name');
                const input_id = document.getElementById(input_name);

                if ( input_id.checked ) {

                    sum_of_options++;

                } else {

                    sum_of_options--;

                }

                if ( sum_of_options == 0 ) {

                    options_counter.classList.add('opacity-0');
                    options_counter.classList.remove('opacity-100');
                    options_counter.innerHTML = '';
                    options_selected.innerHTML = 'SELECT';
                    auto_selected.removeAttribute('data-filters-selected');
    
                }

                if ( sum_of_options == 1 ) {
                    
                    options_counter.classList.remove('opacity-0');
                    options_counter.classList.add('opacity-100');
                    options_counter.innerHTML = sum_of_options;

                    // This checks all inputs and takes only the one selected.
                    // This also anly applies when there is only one option selected
                    all_checkboxes.forEach((checked) => {

                        const input_name = checked.getAttribute('name');
                        const input_id = document.getElementById(input_name);

                        if ( input_id.checked ) {

                            options_selected.innerHTML = checked.dataset.name;

                        }

                    });
    
                }

                if ( sum_of_options >= 2 ) {

                    options_counter.classList.remove('opacity-0');
                    options_counter.classList.add('opacity-100');
                    options_counter.innerHTML = sum_of_options;
                    options_selected.innerHTML = 'More options selected';

                }

                // This checks all inputs and takes only the one selected.
                // This script generates a dynamic parameter to keep track which items in the filter are selected, so when the user comes back to the page the filters auto filter the data
                all_checkboxes.forEach((checked) => {

                    const term_id = checked.dataset.termId;
                    const input_name = checked.getAttribute('name');
                    const input_id = document.getElementById(input_name);

                    if ( input_id.checked && !options_pre_selected.includes(term_id) ) {

                        options_pre_selected.push(term_id);
                            
                    } else if (input_id.checked == false && options_pre_selected.includes(term_id)) {

                        // Gets item index in array.
                        const item_index = options_pre_selected.indexOf(term_id);

                        // Searches item in array and removes it.
                        item_index > -1 ? options_pre_selected.splice(item_index, 1) : false;

                    }

                });

                // Assignes the options selected to the element
                auto_selected.dataset.filtersSelected = options_pre_selected.toString();
                
            });

        });

    });

    // When the from date changes cleas the field and the data-atribbute
    document.getElementById('from_date').addEventListener('change', (event) => {

        if ( event.target.value != '' ) {

            auto_selected.dataset.fromDate = event.target.value;
            
        } else {
            
            event.target.value = '';
            auto_selected.removeAttribute('data-from-date');

        }

    });

    // When the to date changes cleas the field and the data-atribbute
    document.getElementById('to_date').addEventListener('change', (event) => {

        if ( event.target.value != '' ) {

            auto_selected.dataset.toDate = event.target.value;
            
        } else {
            
            event.target.value = '';
            auto_selected.removeAttribute('data-to-date');

        }

    });

}

// Search box on long term
const short_search_input = document.getElementById('short_string');

if ( short_search_input !== null) {

    short_search_input.onkeydown = event => {

        if ( event.keyCode == 13 ) {

            return false;

        }

    };

    short_search_input.onkeyup = () => {

        return false;

    };

}

// Page: /short-term-opportunities
// File : archive-short-terms
// Comments: This script runs when the user clicks on the job.
const list_of_short_jobs = document.querySelector('.short_jobs_found');

if ( list_of_short_jobs != null ) {

    const all_jobs_found = list_of_short_jobs.querySelectorAll('.short-term-job');

    const site_url = new URL(window.location.href)
    let short_params = new URLSearchParams(site_url.search.slice(1));

    all_jobs_found.forEach((job) => {

        const job_link = job.querySelector('a');

        job_link.addEventListener('click', (event) => {

            // This checks if the filters are selected and appends the values to the params.
            if ( document.querySelector('.selected_filtered_options').hasAttribute('data-filters-selected') ) {

                short_params.set('applied-filters', document.querySelector('.selected_filtered_options').dataset.filtersSelected);
    
            } else {

                short_params.delete('applied-filters');

            }
            
            // This checks if the FROM date is filled and appends the values to the params.
            if ( document.querySelector('.selected_filtered_options').hasAttribute('data-from-date') ) {
    
                short_params.set('from-date', document.querySelector('.selected_filtered_options').dataset.fromDate);
    
            } else {

                short_params.delete('from-date');

            }
    
            // This checks if the TO date is filled and appends the values to the params.
            if ( document.querySelector('.selected_filtered_options').hasAttribute('data-to-date') ) {
    
                short_params.set('to-date', document.querySelector('.selected_filtered_options').dataset.toDate);
    
            } else {

                short_params.delete('to-date');

            }
    
            job_link.href = job_link.href + '?' + decodeURIComponent(short_params.toString());

        });

    });

}
