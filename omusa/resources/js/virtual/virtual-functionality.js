// Filter toggle
const job_filters = document.getElementById('virtual-filters');

if ( job_filters !== null ) {

    const all_filters = job_filters.querySelectorAll('.filter');

    all_filters.forEach( filter => {

        let options_pre_selected = [];

        // Adds a dynamic hidden input that is sent to the backend.
        const virtual_filters_input = document.createElement('input');
        virtual_filters_input.type = 'hidden';
        virtual_filters_input.className = 'selected_' + filter.dataset.filterName;
        virtual_filters_input.name = 'selected_' + filter.dataset.filterName;

        filter.appendChild( virtual_filters_input );

        const auto_selected = document.querySelector('.selected_' + filter.dataset.filterName); // this items stores the selected filters

        // Visible select
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
        if ( window.location.href.indexOf('type_of_posts') > -1 ) {
            
            const site_url = new URL( window.location.href );
            const urlParams = new URLSearchParams( site_url.search.slice(1) );

            if ( urlParams.has('type_of_posts') ) {

                let applied_filters = urlParams.get('type_of_posts'); // Gets the params.
                applied_filters = applied_filters.replace(/,/g, ' '); // Remove commas and adds spaces.

                all_checkboxes.forEach( input_selected => {

                    const term_name = input_selected.dataset.termName;
        
                    if ( applied_filters.includes( term_name ) ) {

                        const input_id = document.getElementById( input_selected.getAttribute('id') );

                        input_id.checked = true;

                        sum_of_options++;

                        // This adds the term id to the array of filters selected and pushes it.
                        if ( input_id.checked && !options_pre_selected.includes( term_name ) ) {

                            options_pre_selected.push( term_name );
                                
                        }
        
                    }

                });

                if ( sum_of_options == 0 ) {

                    options_counter.classList.add('opacity-0');
                    options_counter.classList.remove('opacity-100');
                    options_counter.innerHTML = '';
                    options_selected.innerHTML = 'SELECT';
    
                }

                if ( sum_of_options == 1 ) {
                    
                    options_counter.classList.remove('opacity-0');
                    options_counter.classList.add('opacity-100');
                    options_counter.innerHTML = sum_of_options;

                    // This checks all inputs and takes only the one selected.
                    // This also anly applies when there is only one option selected
                    all_checkboxes.forEach( checked => {

                        const input_id = document.getElementById( checked.getAttribute('id') );

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

                // Assign value to the input
                virtual_filters_input.value = options_pre_selected.toString();

            }

        }

        // Ony triggers when the param by region exists 
        if ( window.location.href.indexOf('regions_active') > -1 ) {
            
            const site_url = new URL( window.location.href );
            const urlParams = new URLSearchParams( site_url.search.slice(1) );

            if ( urlParams.has('regions_active') ) {

                let applied_filters = urlParams.get('regions_active'); // Gets the params.
                applied_filters = applied_filters.replace(/,/g, ' '); // Remove commas and adds spaces.

                all_checkboxes.forEach( input_selected => {

                    const term_name = input_selected.dataset.termName;
        
                    if ( applied_filters.includes( term_name ) ) {

                        const input_id = document.getElementById(input_selected.getAttribute('id'));

                        input_id.checked = true;

                        sum_of_options++;

                        // This adds the term id to the array of filters selected and pushes it.
                        if ( input_id.checked && !options_pre_selected.includes(term_name) ) {

                            options_pre_selected.push( term_name );
                                
                        }
        
                    }

                });

                if ( sum_of_options == 0 ) {

                    options_counter.classList.add('opacity-0');
                    options_counter.classList.remove('opacity-100');
                    options_counter.innerHTML = '';
                    options_selected.innerHTML = 'SELECT';
    
                }

                if ( sum_of_options == 1 ) {
                    
                    options_counter.classList.remove('opacity-0');
                    options_counter.classList.add('opacity-100');
                    options_counter.innerHTML = sum_of_options;

                    // This checks all inputs and takes only the one selected.
                    // This also anly applies when there is only one option selected
                    all_checkboxes.forEach( checked => {

                        const input_id = document.getElementById( checked.getAttribute('id') );

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

                // Assign value to the input
                virtual_filters_input.value = options_pre_selected.toString();

            }

        }

        all_checkboxes.forEach( input_selected => {

            // When the user clicks on the checkbox.
            input_selected.addEventListener('click', ( event ) => {

                const input_id = document.getElementById( event.target.id );

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
    
                }

                if ( sum_of_options == 1 ) {
                    
                    options_counter.classList.remove('opacity-0');
                    options_counter.classList.add('opacity-100');
                    options_counter.innerHTML = sum_of_options;

                    // This checks all inputs and takes only the one selected.
                    // This also anly applies when there is only one option selected
                    all_checkboxes.forEach( checked => {

                        const input_id = document.getElementById( checked.getAttribute('id') );

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
                // This script generates a dynamic parameter to keep track which items in the filter are selected, so when the user comes back to the page the filters auto filter the data.
                all_checkboxes.forEach( checked => {

                    const term_name = checked.dataset.termName;
                    const input_id = document.getElementById(checked.getAttribute('id'));

                    if ( input_id.checked && !options_pre_selected.includes( term_name ) ) {

                        options_pre_selected.push( term_name );
                            
                    } else if (input_id.checked == false && options_pre_selected.includes(term_name)) {

                        // Gets item index in array.
                        const item_index = options_pre_selected.indexOf(term_name);

                        // Searches item in array and removes it.
                        item_index > -1 ? options_pre_selected.splice(item_index, 1) : false;

                    }

                });

                // Assignes the options selected to the element
                auto_selected.dataset.filtersSelected = options_pre_selected.toString();

                // Assign value to the input
                virtual_filters_input.value = options_pre_selected.toString();

            });

        });

    });

}

// Search box on long term
const virtual_search_input = document.getElementById("virtual_search_string");

if ( virtual_search_input !== null) {

    virtual_search_input.onkeydown = event => {

        if ( event.keyCode == 13 ) {

            return false;

        }

    };

    virtual_search_input.onkeyup = () => {

        return false;

    };

}

// Adds this when the page loads to each job visible.
const list_of_jobs = document.querySelector('.list_of_virtual_jobs_found');

if ( list_of_jobs != null ) {

    const all_jobs_found = list_of_jobs.querySelectorAll('.job-listing');

    all_jobs_found.forEach( job => {

        // Just add the params to the long and short post types.
        // Because the internships open an external URL.
        if ( job.dataset.jobType === 'short-term' || job.dataset.jobType === 'long-term' ) {

            const job_link = job.querySelector('a');
                 
            // All selected post types and regions are stored in a hidden div which is located under each fitler.
            job_link.addEventListener('click', (event) => {
                
                event.preventDefault();

                const site_url = new URL( job_link.href )
                let virtualParams = new URLSearchParams( site_url.search.slice(1) );

                // This helps identify if where is the user visiting from.
            	virtualParams.set('comes-from', 'virtual');

                // When the regions are selected, then append values to each link in the job.
                if ( document.querySelector('.selected_type_of_posts').hasAttribute('data-filters-selected') && document.querySelector('.selected_type_of_posts').getAttribute('data-filters-selected') != '' ) {

                    virtualParams.set('type_of_posts', document.querySelector('.selected_type_of_posts').dataset.filtersSelected);

                } else {

                    virtualParams.delete('type_of_posts');

                }

                // When the regions are selected, then append values to each link in the job.
                if ( document.querySelector('.selected_regions_active').hasAttribute('data-filters-selected') && document.querySelector('.selected_regions_active').getAttribute('data-filters-selected') != '' ) {

                    virtualParams.set('regions_active', document.querySelector('.selected_regions_active').dataset.filtersSelected);

                } else {

                    virtualParams.delete('regions_active');

                }

                window.open(job_link.href + '?' + decodeURIComponent( virtualParams.toString() ), '_blank');

            });

    	}

    });

}