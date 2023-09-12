(function($){
  var data = {};
  var button;
  var page;
  // var loading = false;
  // var scrollHandling = {
  //     allow: true,
  //     reallow: function() {
  //         scrollHandling.allow = true;
  //     },
  //     delay: 400 //(milliseconds) adjust to the highest acceptable value
  // };
  
  function ajaxArticlesIssue(op1, op2, requesth,pagen) {
    page = 2;
    data = {
      action: 'get_filter_issues',
      ids_opt1: op1,
      ids_opt2: op2,
      reqHome: requesth,
      pagenum: pagen,
    };

    $.ajax({
      type: 'post',
      url : wp_filter_issues.ajaxurl,
      data: data,
      beforeSend: function(xhr){
        $("#response-issues").append('<img class="center-block" id="loading-image" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();              
        $('#response-issues .load-more').remove();
      },
      complete: function(){
        $('#loading-image').remove();              
      },
      success: function(response){
        $("#response-issues").html(response);
        if (total_pages > 1 && pagen < total_pages) {
          $('#response-issues').append('<span class="load-more btn btn--blue">Load more</span>');
       
        }   
      }

    });

  }

  function ajaxArticlesCustomIssue(requesth) {
    var data = {
      action: 'get_initialArticlesIssue',
      ishome: requesth
    };

    $.ajax({
      type: 'post',
      url : wp_load_issues.ajaxurl,
      data: data,
      beforeSend: function(xhr){
        $("#response-issues").append('<img class="center-block" id="loading-image" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();              
        $('#response-issues .load-more').remove();
      },
      complete: function(){
        $('#loading-image').remove();              
      },
      success: function(response){
        $("#response-issues").html(response);
      }

    });
  }

  $(document).on('click', '#response-issues .load-more', function(){
    var $firstOpHome = $('.filter-home #first-issueopt'),
    $secOpHome = $('.filter-home #sec-issueopt');

    var $reqhome = 0;

    if ($firstOpHome.length || $secOpHome.length ) {
      $reqhome = 1;
    }else{
      $reqhome = 0;
    }  

      var pag_number = total_pages;
      // console.log('page: ' + page);
      // console.log('pag_number: ' + pag_number);
      // console.log('loading: ' + loading);

      if ( page <= pag_number ) {

          var loading = true;
          data.pagenum = page;

          $.ajax({
            type: 'post',
            url : wp_filter_issues.ajaxurl,
            data: data,
            beforeSend: function(xhr){
              $("#response-issues").append('<img class="center-block" id="loading-image" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();              
              $('#response-issues .load-more').remove();
            },
            complete: function(){
              $('#loading-image').remove();              
            },
            success: function(response) {
              
              if (response) {
                // $("#response-articles").append( '<h1> AJAX '+ page +'</h1>' );
                $('#response-issues').append( response );

              }

              if (pag_number > 1 && page < pag_number) {

                $('#response-issues').append('<span class="load-more btn btn--blue">Load more</span>');

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
    var $optionIF = '',
        $optionIF2 = '',
        $reqhome = 0,
        page_num = 1,  
    $firstOpHome = $('.filter-home #first-issueopt'),
    $secOpHome = $('.filter-home #sec-issueopt');

    if ($firstOpHome.length || $secOpHome.length ) {
      $reqhome = 1;
      ajaxArticlesCustomIssue($reqhome);
    }else{
      $reqhome = 0;
      ajaxArticlesCustomIssue($reqhome);
    }    

    $('#first-issueopt').on('change', function () {
      $optionIF = $(this).val();
      if ( ($optionIF == '' && $optionIF2 == '') || ($optionIF == null && $optionIF2 == null) ) {
        ajaxArticlesCustomIssue($reqhome);
      }else{
        ajaxArticlesIssue($optionIF, $optionIF2, $reqhome, page_num);
      }
      
    });

    $('#sec-issueopt').on('change', function () {
      $optionIF2 = $(this).val();
      if ( ($optionIF == '' && $optionIF2 == '') || ($optionIF == null && $optionIF2 == null) ) {
        ajaxArticlesCustomIssue($reqhome);
      }else{
        ajaxArticlesIssue($optionIF, $optionIF2, $reqhome, page_num);
      }
      
    });

  }); 

})(jQuery);