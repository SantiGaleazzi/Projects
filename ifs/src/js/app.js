setTimeout(function () {
	var stickyNavTop = $('.sticky-nav').offset().top
	$('.sticky-nav').attr('data-height', stickyNavTop)
}, 1000)

var stickyNav = function (stickyNavTop) {
	var scrollTop = $(window).scrollTop() // our current vertical position from the top)

	if (scrollTop > stickyNavTop) {
		$('.sticky-nav').addClass('sticky')
	} else {
		$('.sticky-nav').removeClass('sticky')
	}
}

;(function ($) {
	$(document).foundation()

	function buttonUp() {
		var inputVal = $('.searchbox-input').val()
		inputVal = $.trim(inputVal).length
		if (inputVal !== 0) {
			$('.searchbox-icon').css('display', 'none')
		} else {
			$('.searchbox-input').val('')
			$('.searchbox-icon').css('display', 'block')
		}
	}

	$(function () {
		$('#cliptext').click(function (e) {
			e.preventDefault()

			var $temp = $('<input>')
			$('body').append($temp)
			$temp.val($(this).data('clipb')).select()
			document.execCommand('copy')
			$('.social_share .copied').text('Copied to clipboard').show().fadeOut(1500)
		})
	})

	function outFunc() {
		var tooltip = document.getElementById('myTooltip')
		tooltip.innerHTML = 'Copy to clipboard'
	}

	$(document).ready(function () {
		var $loadmore = $('#loadmore')

		// Hamburguer active
		$('.menu-btn').on('click', function () {
			if ($(this).hasClass('active')) {
				$(this).removeClass('active')
			} else {
				$(this).addClass('active')
			}
		})

		var submitIcon = $('#preheader-menu .searchbox-icon')
		var inputBox = $('#preheader-menu .searchbox-input')
		var searchBox = $('#preheader-menu .searchbox')

		var submitIconFooter = $('.footer__secmenu .searchbox-icon')
		var inputBoxFooter = $('.footer__secmenu .searchbox-input')
		var searchBoxFooter = $('.footer__secmenu .searchbox')
		var headermenuoverlay = $('.header-navmenu')
		var textmenu = $('.navmenu__secondary li a')

		var footermenuoverlay = $('.footer__secmenu')

		var isOpen = false

		submitIcon.click(function () {
			if (isOpen == false) {
				searchBox.addClass('searchbox-open')
				headermenuoverlay.addClass('overlay')
				inputBox.focus()
				isOpen = true
			} else {
				searchBox.removeClass('searchbox-open')
				headermenuoverlay.removeClass('overlay')
				inputBox.focusout()
				isOpen = false
			}
		})
		submitIconFooter.click(function () {
			if (isOpen == false) {
				searchBoxFooter.addClass('searchbox-open')
				footermenuoverlay.addClass('overlay')
				inputBoxFooter.focus()
				isOpen = true
			} else {
				searchBoxFooter.removeClass('searchbox-open')
				footermenuoverlay.removeClass('overlay')
				inputBoxFooter.focusout()
				isOpen = false
			}
		})

		submitIcon.mouseup(function () {
			return false
		})
		submitIconFooter.mouseup(function () {
			return false
		})
		searchBox.mouseup(function () {
			return false
		})
		searchBoxFooter.mouseup(function () {
			return false
		})
		$(document).mouseup(function () {
			if (isOpen == true) {
				$('#preheader-menu .searchbox-icon').css('display', 'block')
				submitIcon.click()
			}

			if (isOpen == true) {
				$('.footer__secmenu .searchbox-icon').css('display', 'block')
				submitIconFooter.click()
			}
		})

		// Breadcrums Full Page
		$bcrubs = $('#breadcrumbs')
		$tabsContainer = $('#deeplinked-tabs')
		$sizeTabs = $('#deeplinked-tabs li')

		var initAnchor = window.location.hash

		if (initAnchor.length) {
			$initText = $('#deeplinked-tabs')
				.find('[href="' + initAnchor + '"]')
				.text()
			if ($sizeTabs == 1) {
				$bcrubs.append(
					'<li class="separator separator-home bctabs">></li><li class="bctabs"><strong>' + $initText + '</strong></li>'
				)
			}
		} else {
			if ($tabsContainer.length) {
				$initText = $('#deeplinked-tabs li').eq(0).find('a').text()
				if ($sizeTabs == 1) {
					$bcrubs.append(
						'<li class="separator separator-home bctabs">></li><li class="bctabs"><strong>' +
							$initText +
							'</strong></li>'
					)
				}
			}
		}

		$tabsContainer.on('change.zf.tabs', function () {
			var anchor = $(this).find('.tabs-title.is-active a').text()
			var genAnchor = window.location.hash

			$('.bctabs').hide()

			if ($(genAnchor + ':visible').length) {
				$('.bctabs').hide()
				$bcrubs.append(
					'<li class="separator separator-home bctabs">></li><li class="bctabs"><strong>' + anchor + '</strong></li>'
				)
			}
		})

		// STICKIE FUNCTION

		var stickyData = 0

		setTimeout(function () {
			stickyData = $('.sticky-nav').data('height')
		}, 1200)

		stickyNav(stickyData)

		$(window).on('scroll', function () {
			stickyData = $('.sticky-nav').attr('data-height')

			stickyNav(stickyData)
		})
	})

	var custom_states_dropdown = document.querySelector('.states-dropdown')

	if (custom_states_dropdown != null) {
		custom_states_dropdown.querySelector('.selected-option').addEventListener('click', function () {
			custom_states_dropdown.classList.toggle('is-active')
		})

		// Outside Click event closes dropdown options.
		document.addEventListener('mousedown', function (event) {
			if (!custom_states_dropdown.contains(event.target)) {
				custom_states_dropdown.classList.remove('is-active')
			}
		})
	}
})(jQuery)
