/**
 * Sorts a HTML table.
 * 
 * @param {HTMLTableElement} table The table to sort
 * @param {number} column The index of the column to sort
 * @param {boolean} asc Determines if the sorting will be in ascending
 */

 function sortTableByColumn( table, column, asc = true ) {

    const dirModifier = asc ? 1 : -1;
    const tBody = table.tBodies[0];
    const rows = Array.from(tBody.querySelectorAll('tr'));

    // Sort each row
    const sortedRows = rows.sort((a, b) => {

        const aColText = a.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();
        const bColText = b.querySelector(`td:nth-child(${ column + 1 })`).textContent.trim();

        return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);

    });

    // Remove all existing TRs from the table
    while (tBody.firstChild) {

        tBody.removeChild(tBody.firstChild);

    }

    // Re-add the newly sorted rows
    tBody.append(...sortedRows);

    // Remember how the column is currently sorted
    table.querySelectorAll('th').forEach(th => th.classList.remove('th-sort-asc', 'th-sort-desc'));
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle('th-sort-asc', asc);
    table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle('th-sort-desc', !asc);

}

document.querySelectorAll('.table-sortable th').forEach(headerCell => {

    headerCell.addEventListener('click', () => {

        const tableElement = headerCell.parentElement.parentElement.parentElement;
        const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        const currentIsAscending = headerCell.classList.contains('th-sort-asc');

        sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
        
    });

});

// Filter toggle
const job_filters = document.getElementById('filters');

if ( job_filters !== null ) {

    const all_filters = job_filters.querySelectorAll('.filter');
    const auto_selected = document.querySelector('.selected_filtered_options'); // this items stores the selected filters
    let options_pre_selected = [];

    all_filters.forEach((filter) => {

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
        
        all_checkboxes.forEach((input_selected) => {

            // When the user clicks on the checkbox
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

}

// Page: /long-term-opportunities
// File : archive-long-terms
// Comments: This script detects when the user 
const searchInput = document.getElementById('long_string');

if ( searchInput !== null) {

    searchInput.onkeydown = event => {

        if ( event.keyCode == 13 ) {

            return false;

        }

    };

    searchInput.onkeyup = () => {

        if ( searchInput.value == '' ) {

            document.getElementById('query-search').innerHTML = '';

        } else {

            document.getElementById('query-search').innerHTML = 'FOR "' + searchInput.value + '"';

        }

    };

}

// Page: /long-term-opportunities
// File : archive-long-terms
// Comments: This script runs when the user clicks on the job.
const list_of_jobs = document.querySelector('.list_of_jobs_found');

if ( list_of_jobs != null ) {

    const all_jobs_found = list_of_jobs.querySelectorAll('.job-listing');

    all_jobs_found.forEach((job) => {

        job.addEventListener('click', (event) => {

            const job_links = job.querySelectorAll('a');
            const selected_filters = document.querySelector('.selected_filtered_options').dataset.filtersSelected;

            job_links.forEach((link) => {

                if ( selected_filters != undefined ) {

                    if ( !link.href.includes('?applied-filters=') ) {

                        link.href = link.href + '?applied-filters=' + selected_filters;

                    }

                }

            });

        });

    });

}