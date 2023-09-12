// AJAX Job Search
jQuery(document).ready(function($) {
  // Load the missing jobs. This is the double down arrow
  $(".load-new-virtual-jobs").click(function() {
    var filter = $("#virtual-filters"); // Form

    $.ajax({
      url: virtual_jobs_search_ajax.ajaxurl,
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
        $("#list-of-virtual-jobs-found").append(response.jobs);
        $(".total-of-jobs-visible").text(response.total_of_jobs_visible);
        $(".total-of-jobs-found").text(response.total_of_jobs_found);

        if (page === max_page) {
          $(".load-new-virtual-jobs").hide();
        } else {
          $("input#current_page").val(page);
        }

        // Custom Function.
        getVirtualFilters();
      },
    });

    return false;
  });

  // Reset Filters
  $("#reset-virtual").click(function() {
    document.getElementById("virtual-filters").reset();

    resetVirtualFilters();

    $("#list-of-virtual-jobs-found").append();
    $("input#current_page").val(0);
    $("input#current_visible").val(0);

    var filter = $("#virtual-filters"); // Form

    $.ajax({
      url: virtual_jobs_search_ajax.ajaxurl,
      type: filter.attr("method"),
      data: filter.serialize(),
      dataType: "json",
      success: function(response) {
        var page = parseInt(response.page);
        var max_page = parseInt(response.num_max);

        $(".load-new-virtual-jobs").show();
        $("input#current_page").val(1);
        $("input#current_visible").val(
          parseInt(response.total_of_jobs_visible)
        );

        if (page === max_page) {
          $(".load-new-virtual-jobs").hide();
        }

        $("#list-of-virtual-jobs-found").html(response.jobs);
        $(".total-of-jobs-visible").text(response.total_of_jobs_visible);
        $(".total-of-jobs-found").text(response.total_of_jobs_found);
      },
    });

    return false;
  });

  // When a field on the form changes,
  $("#virtual-filters").change(function() {
    // Used to paginate.
    $("input#current_page").val(0);

    // Used to count visual jobs.
    $("input#current_visible").val(0);

    var filter = $("#virtual-filters");

    $.ajax({
      type: filter.attr("method"),
      url: virtual_jobs_search_ajax.ajaxurl,
      data: filter.serialize(),
      dataType: "json",
      success: function(response) {
        var page = parseInt(response.page);
        var max_page = parseInt(response.num_max);

        $(".load-new-virtual-jobs").show();
        $("input#current_page").val(1); // Used Pagination
        $("input#current_visible").val(
          parseInt(response.total_of_jobs_visible)
        );

        if (page === max_page) {
          $(".load-new-virtual-jobs").hide();
        }

        $("#list-of-virtual-jobs-found").html(response.jobs);
        $(".total-of-jobs-visible").text(response.total_of_jobs_visible);
        $(".total-of-jobs-found").text(response.total_of_jobs_found);

        // Custom Function.
        getVirtualFilters();
      },
    });

    return false;
  });
});

// This assigns an event to the jobs loaded on the ajax.
function getVirtualFilters() {
  // This script runs
  const list_of_jobs = document.querySelector(".list_of_virtual_jobs_found");

  if (list_of_jobs != null) {
    const all_jobs_found = list_of_jobs.querySelectorAll(".job-listing");

    all_jobs_found.forEach((job) => {
      // Just add the params to the long and short post types.
      // Because the internships open an external URL.
      if (
        job.dataset.jobType === "short-term" ||
        job.dataset.jobType === "long-term"
      ) {
        const job_link = job.querySelector("a");

        // All selected post types and regions are stored in a hidden div which is located under each fitler.
        job_link.addEventListener("click", (event) => {
          event.preventDefault();

          const site_url = new URL(job_link.href);
          let virtualParams = new URLSearchParams(site_url.search.slice(1));

          // This helps identify if where is the user visiting from.
          virtualParams.set("comes-from", "virtual");

          // When the regions are selected, then append values to each link in the job.
          if (
            document
              .querySelector(".selected_type_of_posts")
              .hasAttribute("data-filters-selected") &&
            document
              .querySelector(".selected_type_of_posts")
              .getAttribute("data-filters-selected") != ""
          ) {
            virtualParams.set(
              "type_of_posts",
              document.querySelector(".selected_type_of_posts").dataset
                .filtersSelected
            );
          } else {
            virtualParams.delete("type_of_posts");
          }

          // When the regions are selected, then append values to each link in the job.
          if (
            document
              .querySelector(".selected_regions_active")
              .hasAttribute("data-filters-selected") &&
            document
              .querySelector(".selected_regions_active")
              .getAttribute("data-filters-selected") != ""
          ) {
            virtualParams.set(
              "regions_active",
              document.querySelector(".selected_regions_active").dataset
                .filtersSelected
            );
          } else {
            virtualParams.delete("regions_active");
          }

          window.open(
            job_link.href + "?" + decodeURIComponent(virtualParams.toString()),
            "_blank"
          );
        });
      }
    });
  }
}

// This resets the filters and fhe form
function resetVirtualFilters() {
  // This removes the params from the URL without refreshing the browser.
  window.history.replaceState({}, "", `${window.location.pathname}`);

  location.reload();
}
