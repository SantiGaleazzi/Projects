(function($){
	$(document).ready(function () {
		
		$('.team__member-lightbox').on('click', function() {

			var postId = $(this).data('postid');

			ajaxGetBiography(postId);

		});

		function ajaxGetBiography(postId) {

		  var data = {
		    action: 'get_biography',
		    postId: postId
		  };

		  $.ajax({
		    type: 'post',
		    url : wp_ajax_custom.ajaxurl,
		    data: data,
		    dataType: "json",
			success: function (response) {
				
				if (response.success) {
				  
					$("#Biography").html(response.html).foundation("open");
					
				}
				
		    }
		  });
		}
	});
})(jQuery);