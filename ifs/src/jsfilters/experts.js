(function($){
  
  var data = {};
  var button;
  var page;

  function ajaxArticles($postType, op1, op2, pagen) {
    page = 2;
    data = {
        action: 'get_experts',
        cptname: $postType,
        ids_opt1: op1,
        ids_opt2: op2,
        pagenum: pagen,
    };

    $.ajax({
      type: 'post',
      url : wp_ajax_object.ajaxurl,
      data: data,
      beforeSend: function(xhr){
        $("#response-articles").append('<img class="center-block" id="loading-image" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();        
        $('#response-articles .load-more').remove();
      },
      complete: function(){
        $('#loading-image').remove();
        if (total_pages > 1 && pagen < total_pages) {
          $('#response-articles').append('<span class="load-more btn btn--blue">Load more</span>');
       
        }        
      },
      success: function(response){
        $("#response-articles").html( response );
      }

    });
  }


  $(document).on('click', '#response-articles .load-more', function () {

    var pag_number = total_pages;
    data.pagenum = page;

    if (page <= pag_number) {
      $.ajax({
        type: 'post',
        url : wp_ajax_object.ajaxurl,
        data: data,
        beforeSend: function(xhr){
          $('#response-articles').append('<img class="center-block" id="loading-image" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();        
          $('#response-articles .load-more').remove();
        },
        complete: function(){
          $('#loading-image').remove();              
        },
        success: function(response) {

          if (response) {
            $("#response-articles").append( response );
          }

          if (pag_number > 1 && page < pag_number) {
            $('#response-articles').append('<span class="load-more btn btn--blue">Load more</span>');
          }
          page = page + 1;     
        },
        error: function (xhr, ajaxOptions, thrownError) {
          console.log(xhr.responseText);
        }
      });  
    }    

  });

  $(document).ready( function(){
    var $option1 = '',
        $option2 = '',
        $cptName = $('.filter').data('archi');

    //console.log('CPT: ' + $cptName);
    ajaxArticles($cptName, $option1, $option2, 1);

    var page_num = 1;

    $('#first-option').on('change', function () {
      $option1 = $(this).val();
      ajaxArticles($cptName, $option1, $option2, page_num);
    

    });

    $('#sec-option').on('change', function () {
      $option2 = $(this).val();
      ajaxArticles($cptName, $option1, $option2, page_num);

    });

  });
})(jQuery);
