// AJAX Job Search
jQuery(document).ready(function($) {
  // Load the missing jobs. This is the double down arrows.
  $(".load-the-new-short-jobs").click(function() {
    var filter = $("#short-filters"); // Form

    $.ajax({
      url: short_job_search_ajax.ajaxurl,
      type: filter.attr("method"),
      data: filter.serialize(),
      dataType: "json",
      beforeSend: function() {
        $(".loading-spinner").addClass("is-loading");
      },
      success: function(response) {
        $(".loading-spinner").removeClass("is-loading");

        var page = parseInt(response.page);
        var max_page = parseInt(response.num_max);

        $("#short-jobs-found").append(response.jobs);
        $(".total-of-jobs-found").text(response.total_of_jobs_found);

        if (page === max_page) {
          $(".load-the-new-short-jobs").hide();
        } else {
          $("input#current_short_job_page").val(page);
        }

        // Custom Function
        getShortFilters();
      },
    });

    return false;
  });

  // Reset Filters
  $("#reset-short").click(function() {
    document.getElementById("short-filters").reset();

    resetShortFilters();

    $("#short-jobs-found").append();
    $("input#current_short_job_page").val(0);
    $("input#current_visible").val(0);

    var filter = $("#short-filters"); // Form

    $.ajax({
      url: short_job_search_ajax.ajaxurl,
      type: filter.attr("method"),
      data: filter.serialize(),
      dataType: "json",
      success: function(response) {
        var page = parseInt(response.page);
        var max_page = parseInt(response.num_max);

        $(".load-the-new-short-jobs").show();
        $("input#current_short_job_page").val(1);

        if (page === max_page) {
          $(".load-the-new-short-jobs").hide();
        }

        $("#short-jobs-found").html(response.jobs);
        $(".total-of-jobs-found").text(response.total_of_jobs_found);

        // Custom Function
        getShortFilters();
      },
    });

    return false;
  });

  // When a field on the form changes,
  $("#short-filters").change(function() {
    // Used to paginate.
    $("input#current_short_job_page").val(0);

    // Used to count visual jobs.
    $("input#current_visible").val(0);

    var filter = $("#short-filters");

    $.ajax({
      url: short_job_search_ajax.ajaxurl,
      type: filter.attr("method"),
      data: filter.serialize(),
      dataType: "json",
      success: function(response) {
        var page = parseInt(response.page);
        var max_page = parseInt(response.num_max);

        $(".load-the-new-short-jobs").show();
        $("input#current_short_job_page").val(1); // Used Pagination

        if (page === max_page) {
          $(".load-the-new-short-jobs").hide();
        }

        $("#short-jobs-found").html(response.jobs);
        $(".total-of-jobs-found").text(response.total_of_jobs_found);

        // Custom Function
        getShortFilters();
      },
    });

    return false;
  });
});

// This assignes an event to the jobs loaded on the ajax.
function getShortFilters() {
  // This script runs
  const list_of_short_jobs = document.querySelector(".short_jobs_found");

  if (list_of_short_jobs != null) {
    const all_jobs_found = list_of_short_jobs.querySelectorAll(
      ".short-term-job"
    );

    const site_url = new URL(window.location.href);
    let short_params = new URLSearchParams(site_url.search.slice(1));

    all_jobs_found.forEach((job) => {
      const job_link = job.querySelector("a");

      job_link.addEventListener("click", (event) => {
        // This checks if the filters are selected and appends the values to the params.
        if (
          document
            .querySelector(".selected_filtered_options")
            .hasAttribute("data-filters-selected")
        ) {
          short_params.set(
            "applied-filters",
            document.querySelector(".selected_filtered_options").dataset
              .filtersSelected
          );
        } else {
          short_params.delete("applied-filters");
        }

        // This checks if the FROM date is filled and appends the values to the params.
        if (
          document
            .querySelector(".selected_filtered_options")
            .hasAttribute("data-from-date")
        ) {
          short_params.set(
            "from-date",
            document.querySelector(".selected_filtered_options").dataset
              .fromDate
          );
        } else {
          short_params.delete("from-date");
        }

        // This checks if the TO date is filled and appends the values to the params.
        if (
          document
            .querySelector(".selected_filtered_options")
            .hasAttribute("data-to-date")
        ) {
          short_params.set(
            "to-date",
            document.querySelector(".selected_filtered_options").dataset.toDate
          );
        } else {
          short_params.delete("to-date");
        }

        job_link.href =
          job_link.href + "?" + decodeURIComponent(short_params.toString());
      });
    });
  }
}

// This resets the filters and fhe form
function resetShortFilters() {
  // This removes the params from the URL without refreshing the browser
  window.history.replaceState({}, "", `${window.location.pathname}`);

  location.reload();

  /*
    setTimeout(() => {

        // This resets the filters options (Visual counter)
        const short_job_filters = document.getElementById('short-filters');
        const all_short_filters = short_job_filters.querySelectorAll('.filter');

        all_short_filters.forEach((filter) => {

            const options_selected = filter.querySelector('.options-selected');
            const options_counter = filter.querySelector('.options-counter');
            const filters_selected = document.querySelector('.selected_filtered_options')

            options_counter.classList.add('opacity-0');
            options_counter.classList.remove('opacity-100');
            options_counter.innerHTML = 0;
            options_selected.innerHTML = 'SELECT';

            filters_selected.removeAttribute('data-filters-selected');
            filters_selected.removeAttribute('data-from-date');
            filters_selected.removeAttribute('data-to-date');

        });

    },50);

    */
}
