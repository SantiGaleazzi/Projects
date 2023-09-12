(function($){
  var data = {};
  var button;
  var page;

  function ajaxArticlesState(op1, op2, op3, pagen) {
    page = 2;

    data = {
      action: 'get_filter_state',
      ids_opt1: op1,
      ids_opt2: op2,
      ids_opt3: op3,
      pagenum: pagen,
    };

    $.ajax({
      type: 'post',
      url : wp_filter_states.ajaxurl,
      data: data,
      beforeSend: function(xhr){
        $("#response-states").append('<img class="center-block" id="loading-image" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();
        $('#response-states .load-more').remove();
      },
      complete: function(){
        $('#loading-image').remove();
      },
      success: function(response){
        $("#response-states").html(response);
        if (total_pages > 1 && pagen < total_pages) {
          $('#response-states').append('<span class="load-more btn btn--blue">Load more</span>');
       
        } 
      }
    });

  }

  function ajaxArticlesCustomState() {
    var data = {
      action: 'get_initialArticlesState',
    };

    $.ajax({
      type: 'post',
      url : wp_load_states.ajaxurl,
      data: data,
      beforeSend: function(xhr){
        $("#response-states").append('<img class="center-block" id="loading-image" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();
        $('#response-states .load-more').remove();
      },
      complete: function(){
        $('#loading-image').remove();
      },
      success: function(response){
        $("#response-states").html(response);
      }

    });
  }

  $(document).on('click', '#response-states .load-more', function () {

      var pag_number = total_pages;
      data.pagenum = page;

      if (page <= pag_number) {
        $.ajax({
          type: 'post',
          url : wp_load_states.ajaxurl,
          data: data,
          beforeSend: function(xhr){
            $("#response-states").append('<img class="center-block" id="loading-image" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();
            $('#response-states .load-more').remove();
          },
          complete: function(){
            $('#loading-image').remove();
          },
          success: function(response) {
            
            if (response) {
              // $("#response-states").append( '<h1> AJAX '+ page +'</h1>' );
              $('#response-states').append( response );
            }
            if (pag_number > 1 && page < pag_number) {
              $('#response-states').append('<span class="load-more btn btn--blue">Load more</span>');
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
    var $optionSF  = '',
        $optionSF2 = '',
        $optionSF3 = '',
        page_num = 1,
        $filters = $('.filter__container select');

    ajaxArticlesCustomState();
    
    $('#first-option').on('change', function () {
      $optionSF = $(this).val();
      if ( ($optionSF == '' && $optionSF2 == '' && $optionSF3 == '') || ($optionSF == null && $optionSF2 == null && $optionSF3 == null) ) {
        ajaxArticlesCustomState();
      }else{
        ajaxArticlesState($optionSF, $optionSF2, $optionSF3, page_num)
      }
      
    });

    $('#sec-option').on('change', function () {
      $optionSF2 = $(this).val();
      if ( ($optionSF == '' && $optionSF2 == '' && $optionSF3 == '') || ($optionSF == null && $optionSF2 == null && $optionSF3 == null) ) {
        ajaxArticlesCustomState();
      }else{
        ajaxArticlesState($optionSF, $optionSF2, $optionSF3, page_num);
      }      
    });

    $('#third-option').on('change', function () {
      $optionSF3 = $(this).val();
      if ( ($optionSF == '' && $optionSF2 == '' && $optionSF3 == '') || ($optionSF == null && $optionSF2 == null && $optionSF3 == null) ) {
        ajaxArticlesCustomState();
      }else{
        ajaxArticlesState($optionSF, $optionSF2, $optionSF3, page_num);
      }
      
    });

  });

})(jQuery);