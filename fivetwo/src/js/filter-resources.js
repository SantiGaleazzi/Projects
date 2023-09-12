// var maxpages;
var pagenum = 1;
var terms = new Array();
var taxonomy = new Array();

(function($){

    function ajaxArticles(taxonomy, terms) {

      var data = {
        action: 'get_articles',
        pagenum: pagenum,
        terms: terms,
        taxonomy: taxonomy,
        cpt: $('.articles').data('cpt')
      };

      $.ajax({
        type: 'post',
        url : wp_ajax_custom.ajaxurl,
        data: data,
        dataType: "json",
        success: function(data){
          var $response;
          if(data.success) {
              $response = data.html;
              $('.articles__navigation').append(data.pagination);
          }
          else {
              $response =  $('<div class="article__noMatch article__remove"><em>'+ data.message +'</em></div>');
          }
          $('.wait-overlay').hide();
          $('.article__wrapper').addClass("flex-archive-style");
          $('.article__wrapper').html($response);
        }
      });
    }

    function ajaxEvents(terms) {

      var data = {
        action: 'get_events',
        terms: terms,
        pagenum: pagenum
      };

      $.ajax({
        type: 'post',
        url : wp_ajax_custom.ajaxurl,
        data: data,
        dataType: "json",
        success: function(data){
          var $response;
          if(data.success) {
              $response = data.html;
              $('.articles__navigation').append(data.pagination);
          }
          else {
              $response =  $('<div class="article__noMatch article__remove"><em>'+ data.message +'</em></div>');
          }
          $('.wait-overlay').hide();
          $('.article__wrapper').append($response);
        }
      });
    }

    $(document).ready(function(){

      $('.filter').on('change', function() {

        var index = $('.filter').index( this );
        taxonomy[index] = $(this).data('taxonomy');
        terms[index] = $(this).val();
        $('.article__remove').remove();
        $('nav.navigation').remove();
        pagenum = 1;

        if( $('.post-type-archive-events')[0] ){
          ajaxEvents(terms);
        } else {
          ajaxArticles(taxonomy, terms);
        }
      });

      $('body').on('click', '.page-numbers', function ( event ) {
        event.preventDefault();

        pagenum = $.isNumeric( $(this).data('page') ) ? $(this).data('page') : 1;
        terms[0] = $('.filter').eq(0).val();
        terms[1] = $('.filter').eq(1).val();

        $('.article__remove').remove();
        $('nav.navigation').remove();
        if( $('.post-type-archive-events')[0] ){
          ajaxEvents(terms);
        } else {
          ajaxArticles(taxonomy, terms);
        }
      });
    });

    function pagination( event ) {
      event.preventDefault();

      pagenum = $.isNumeric( $(this).data('page') ) ? $(this).data('page') : 1;
      terms[0] = $('.filter').eq(0).val();
      terms[1] = $('.filter').eq(1).val();

      $('.article__remove').remove();
      $('nav.navigation').remove();

      ajaxArticles(terms);
    }  

})(jQuery);
