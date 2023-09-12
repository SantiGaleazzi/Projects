// AJAX Job Search
jQuery(document).ready(function($) {
  // Load the missing jobs. This is the double down arrow
  $(".load-the-new-jobs").click(function() {
    var filter = $("#filters"); // Form

    $.ajax({
      url: long_job_search_ajax.ajaxurl,
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

        $("input#current_visible").val(response.total_of_jobs_visible);
        $("#list-of-jobs-found").append(response.jobs);
        $(".total-of-jobs-visible").text(response.total_of_jobs_visible);
        $(".total-of-jobs-found").text(response.total_of_jobs_found);

        if (page === max_page) {
          $(".load-the-new-jobs").hide();
        } else {
          $("input#current_page").val(page);
        }

        // Custom Function.
        getLongFilters();
      },
    });

    return false;
  });

  // Reset Filters
  $("#reset-long").click(function() {
    document.getElementById("filters").reset();

    resetLongFilters();

    $("#list-of-jobs-found").append();
    $("input#current_page").val(0);
    $("input#current_visible").val(0);

    var filter = $("#filters"); // Form

    $.ajax({
      url: long_job_search_ajax.ajaxurl,
      type: filter.attr("method"),
      data: filter.serialize(),
      dataType: "json",
      success: function(response) {
        var page = parseInt(response.page);
        var max_page = parseInt(response.num_max);

        $(".load-the-new-jobs").show();
        $("input#current_page").val(1);
        $("input#current_visible").val(
          parseInt(response.total_of_jobs_visible)
        );

        if (page === max_page) {
          $(".load-the-new-jobs").hide();
        }

        $("#list-of-jobs-found").html(response.jobs);
        $(".total-of-jobs-visible").text(response.total_of_jobs_visible);
        $(".total-of-jobs-found").text(response.total_of_jobs_found);
      },
    });

    return false;
  });

  // When a field on the form changes,
  $("#filters").change(function() {
    // Used to paginate.
    $("input#current_page").val(0);

    // Used to count visual jobs.
    $("input#current_visible").val(0);

    var filter = $("#filters");

    $.ajax({
      type: filter.attr("method"),
      url: long_job_search_ajax.ajaxurl,
      data: filter.serialize(),
      dataType: "json",
      success: function(response) {
        var page = parseInt(response.page);
        var max_page = parseInt(response.num_max);

        $(".load-the-new-jobs").show();
        $("input#current_page").val(1); // Used Pagination
        $("input#current_visible").val(
          parseInt(response.total_of_jobs_visible)
        );

        if (page === max_page) {
          $(".load-the-new-jobs").hide();
        }

        $("#list-of-jobs-found").html(response.jobs);
        $(".total-of-jobs-visible").text(response.total_of_jobs_visible);
        $(".total-of-jobs-found").text(response.total_of_jobs_found);

        // Custom Function.
        getLongFilters();
      },
    });

    return false;
  });
});

// This assignes an event to the jobs loaded on the ajax.
function getLongFilters() {
  // This script runs
  const list_of_jobs = document.querySelector(".list_of_jobs_found");

  if (list_of_jobs != null) {
    const all_jobs_found = list_of_jobs.querySelectorAll(".job-listing");

    all_jobs_found.forEach((job) => {
      job.addEventListener("click", (event) => {
        const job_links = job.querySelectorAll("a");
        const selected_filters = document.querySelector(
          ".selected_filtered_options"
        ).dataset.filtersSelected;

        job_links.forEach((link) => {
          if (selected_filters != undefined) {
            if (!link.href.includes("?applied-filters=")) {
              link.href = link.href + "?applied-filters=" + selected_filters;
            }
          }
        });
      });
    });
  }
}

// This resets the filters and fhe form
function resetLongFilters() {
  // This removes the params from the URL without refreshing the browser
  window.history.replaceState({}, "", `${window.location.pathname}`);

  location.reload();
}
