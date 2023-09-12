(function($){
    var customCase = false;
    var customCaseC = false;
    var loading = false;
    var loadingc = false;
    var page_numc = 1;
    var page_num = 1;   
  
  function ajaxArticlesCases(op1, op2, op3, op4, pagen) {

    var data = {
      action: 'get_filter_cases',
      ids_opt1: op1,
      ids_opt2: op2,
      ids_opt3: op3,
      ids_opt4: op4,
      pagenum: pagen,
    };

    $.ajax({
      type: 'post',
      url : wp_filter_cases.ajaxurl,
      data: data,
      beforeSend: function(){
        $("#response-cases").append('<img class="center-block" id="loading-imagefilter" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();
        $('#response-cases .load-more').remove();
      },
      complete: function(){
        $('#loading-imagefilter').remove();
      },
      success: function(response){
        if(customCase){
          $("#response-cases").append(response);  
        }
        else{
         $("#response-cases").html(response);     
        } 

        if (max_pages > 1 && pagen < max_pages) {
          $('#response-cases').append('<span class="load-more btn btn--blue">Load more</span>');       
        }    
        loading = false;
        customCase = true;
        page_num =  page_num + 1;

      }
    });
  }

  function ajaxArticlesCustomCases(pagen) {
    var data = {
      action: 'get_initialArticlesCases',
      pagenum: pagen,
    };

    $.ajax({
      type: 'post',
      url : wp_load_cases.ajaxurl,
      data: data,
      beforeSend: function(){
        $("#response-cases").append('<img class="center-block" id="loading-image" src="' + window.location.origin +'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />').show();
      },
      complete: function(){
        $('#loading-image').remove();
      },
      success: function(response){
        if(customCaseC){
          $("#response-cases").append(response);  
        }
        else{
         $("#response-cases").html(response);     
        }  
        loadingc = false;
        customCaseC = true;
        page_numc =  page_numc + 1;
      }
    });
  }


  $(document).ready( function(){
    var $optionSF  = '',
        $optionSF2 = '',
        $optionSF3 = 'Current',
        $optionSF4 = '29';

    $("#third-option").val("Current");
    $("#fourth-option").val("29");

    // ajaxArticlesCustomCases(page_numc);
    ajaxArticlesCases($optionSF, $optionSF2, $optionSF3, $optionSF4, 1);
    
    $('#first-option').on('change', function () {
      page_num = 1;
      page_numc = 1;
      customCaseC = false;
      customCase = false;

      $optionSF = $(this).val();
      if ( ($optionSF == '0' && $optionSF2 == '0' && $optionSF3 == '0' && $optionSF4 == '0') || ($optionSF == null && $optionSF2 == null && $optionSF3 == null && $optionSF4 == null) ) {
        ajaxArticlesCustomCases(page_numc);
      }else{
        ajaxArticlesCases($optionSF, $optionSF2, $optionSF3, $optionSF4, page_num);
        
      }
      
    });

    $('#sec-option').on('change', function () {
      page_num = 1;
      page_numc = 1;  
      customCaseC = false;
      customCase = false;

      $optionSF2 = $(this).val();
      if ( ($optionSF == '0' && $optionSF2 == '0' && $optionSF3 == '0' && $optionSF4 == '0') || ($optionSF == null && $optionSF2 == null && $optionSF3 == null && $optionSF4 == null) ) {
        ajaxArticlesCustomCases(page_numc);
      }else{
        ajaxArticlesCases($optionSF, $optionSF2, $optionSF3, $optionSF4, page_num);
        
      }      
    });

    $('#third-option').on('change', function () {
      page_num = 1;
      page_numc = 1; 
      customCaseC = false;
      customCase = false;

      $optionSF3 = $(this).val();
      if ( ($optionSF == '0' && $optionSF2 == '0' && $optionSF3 == '0' && $optionSF4 == '0') || ($optionSF == null && $optionSF2 == null && $optionSF3 == null && $optionSF4 == null) ) {
        ajaxArticlesCustomCases(page_numc);
      }else{
        ajaxArticlesCases($optionSF, $optionSF2, $optionSF3, $optionSF4, page_num);
        
      }
      
    });

    $('#fourth-option').on('change', function () {
      page_num = 1;
      page_numc = 1;
      customCaseC = false;
      customCase = false;

      $optionSF4 = $(this).val();
      if ( ($optionSF == '0' && $optionSF2 == '0' && $optionSF3 == '0' && $optionSF4 == '0') || ($optionSF == null && $optionSF2 == null && $optionSF3 == null && $optionSF4 == null) ) {
        console.log($optionSF4);
        ajaxArticlesCustomCases(page_numc);
      }else{
        console.log($optionSF4);
        ajaxArticlesCases($optionSF, $optionSF2, $optionSF3, $optionSF4, page_num);        
      }
      
    });


    $(document).on('click', '#response-cases .load-more', function () {

    if(customCase && max_pages != 0 && page_num <= max_pages){
      ajaxArticlesCases($optionSF, $optionSF2, $optionSF3, $optionSF4, page_num); 
    }

    if(customCaseC && max_pages != 0 && page_numc <= max_pages ){
                // ajaxArticlesCases($optionSF, $optionSF2, $optionSF3, $optionSF4, page_num);
      ajaxArticlesCustomCases(page_numc);                   
            
    }    

  });

  }); 

})(jQuery);