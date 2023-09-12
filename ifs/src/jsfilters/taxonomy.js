(function($){

  var page_num = 2;

  function ajaxTaxIssues(pagen, term, feaID) {

    var data = {
      action: 'get_tax_issues',
      pagenum: pagen,
      termissue: term,
      featID: feaID
    };

    $.ajax({
      type: 'post',
      url : wp_load_taxarchives.ajaxurl,
      data: data,
      beforeSend: function(){
        $("#response-tax").append('<img class="center-block" id="loading-imagefilter" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();
        $('#response-tax .load-more').remove();
      },
      complete: function(){
        $('#loading-imagefilter').remove();
      },
      success: function(response){
        $("#response-tax").append(response);  
        // loading = false;

        if (max_pages > 1 && pagen < max_pages) {
          $('#response-tax').append('<span class="load-more btn btn--blue">Load more</span>');
       
        }       
        page_num =  page_num + 1;

      }
    });
  }


  $(document).ready( function(){
    // console.log('Archive Tax' + max_pages);
    $(document).on('click', '#response-tax .load-more', function() {              

        if( page_num <= max_pages){
          // console.log(termslug);
          ajaxTaxIssues(page_num, termslug, featID);
        }

    });

  }); 

})(jQuery);