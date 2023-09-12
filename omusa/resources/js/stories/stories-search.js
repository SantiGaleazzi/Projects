jQuery(document).ready(function($) {
  // Load the missing jobs. This is the double down arrows.
  $(".load-more-stories").click(function() {
    var filter = $("#stories-filters"); // Form

    $.ajax({
      url: stories_search_ajax.ajaxurl,
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

        $("#stories-data").append(response.stories);

        if (page === max_page) {
          $(".load-more-stories").hide();
        } else {
          $("input#current_stories_page").val(page);
        }

        // Custom Function
        getStoriesFilters();
      },
    });
  });

  // Reset Filters
  $("#reset-stories").click(function() {
    document.getElementById("stories-filters").reset();

    resetStoriesFilters();

    $("#stories-data").append();
    $("input#current_stories_page").val(0);

    var filter = $("#stories-filters"); // Form

    $.ajax({
      url: stories_search_ajax.ajaxurl,
      type: filter.attr("method"),
      data: filter.serialize(),
      dataType: "json",
      success: function(response) {
        var page = parseInt(response.page);
        var max_page = parseInt(response.num_max);

        $(".load-more-stories").show();
        $("input#current_stories_page").val(1);

        if (page === max_page) {
          $(".load-more-stories").hide();
        }

        $("#stories-data").html(response.stories);

        // Custom Function
        getStoriesFilters();
      },
    });

    return false;
  });

  // When a field on the form changes,
  $("#stories-filters").change(function() {
    // Used to paginate.
    $("input#current_stories_page").val(0);

    var filter = $("#stories-filters");

    $.ajax({
      url: stories_search_ajax.ajaxurl,
      type: filter.attr("method"),
      data: filter.serialize(),
      dataType: "json",
      success: function(response) {
        var page = parseInt(response.page);
        var max_page = parseInt(response.num_max);

        $(".load-more-stories").show();
        $("input#current_stories_page").val(1); // Used Pagination

        if (page === max_page) {
          $(".load-more-stories").hide();
        }

        $("#stories-data").html(response.stories);

        // Custom Function
        getStoriesFilters();
      },
    });

    return false;
  });
});

// This assignes an event to the jobs loaded on the ajax.
function getStoriesFilters() {
  // This script runs
  const list_of_jobs_found = document.querySelector(".stories_found");

  if (list_of_jobs_found != null) {
    const all_stories_found = list_of_jobs_found.querySelectorAll(
      ".story-item"
    );

    const site_url = new URL(window.location.href);
    let stories_param = new URLSearchParams(site_url.search.slice(1));

    all_stories_found.forEach((story) => {
      const story_links = story.querySelectorAll("a");

      story_links.forEach((permalink) => {
        console.log(permalink);

        permalink.addEventListener("click", () => {
          // This checks if the filters are selected and appends the values to the params.
          if (
            document
              .querySelector(".selected_filtered_options")
              .hasAttribute("data-filters-selected")
          ) {
            stories_param.set(
              "applied-filters",
              document.querySelector(".selected_filtered_options").dataset
                .filtersSelected
            );
          } else {
            stories_param.delete("applied-filters");
          }

          permalink.href =
            permalink.href + "?" + decodeURIComponent(stories_param.toString());
        });
      });
    });
  }
}

// This resets the filters and fhe form
function resetStoriesFilters() {
  // This removes the params from the URL without refreshing the browser
  window.history.replaceState({}, "", `${window.location.pathname}`);

  location.reload();
}
