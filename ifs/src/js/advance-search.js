var pagenum = 1
;(function ($) {
	$(document).ready(function () {
		$('.filter__search').on('change', function () {
			var filterSearch = []
			var index
			var keywordSearch = getUrlVars('s')
			pagenum = 1

			$('.article__remove').remove()
			$('nav.navigation').remove()

			$(this).each(function () {
				index = $('.filter__search').index(this)
				filterSearch[index] = $(this).val()
			})

			ajaxAdvanceSearch(filterSearch, keywordSearch)
		})

		$('body').on('click', '.page-numbers', function (event) {
			event.preventDefault()

			var filterSearch = []
			var index
			var keywordSearch = getUrlVars('s')
			pagenum = $.isNumeric($(this).data('page')) ? $(this).data('page') : 1

			$('.article__remove').remove()

			$('.filter__search').each(function () {
				index = $('.filter__search').index(this)
				filterSearch[index] = $(this).val()
			})

			$('.article__remove').remove()
			$('nav.navigation').remove()
			ajaxAdvanceSearch(filterSearch, keywordSearch)
		})
	})

	function getUrlVars(find) {
		var vars = {}
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
			vars[key] = value
		})
		return vars[find] || 'withoutParameter'
	}

	function ajaxAdvanceSearch(filterSearch, keywordSearch) {
		var data = {
			action: 'get_advance_search',
			pagenum: pagenum,
			filter: filterSearch,
			search: keywordSearch,
		}

		$.ajax({
			type: 'post',
			url: wp_ajax_object.ajaxurl,
			data: data,
			dataType: 'json',
			beforeSend: function () {
				$('.articles__section')
					.append(
						'<img class="center-block" id="loading-imagefilter" src="' +
							window.location.origin +
							'/wp-content/themes/ifs/assets/img/research/ajax-loader.gif" alt="Loading..." />'
					)
					.show()
			},
			complete: function () {
				$('#loading-imagefilter').remove()
			},
			success: function (data) {
				var $response

				if (data.success) {
					$response = data.html
					$('.articles__navigation').append(data.pagination)
				} else {
					$response = $('<div class="article__noMatch article__remove"><em>' + data.message + '</em></div>')
				}
				$('.articles__wrapper').append($response)
			},
		})
	}
})(jQuery)
