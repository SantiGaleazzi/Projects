import $ from 'jquery'
import 'foundation-sites/dist/js/foundation'
import 'foundation-sites/dist/js/plugins/foundation.core'
import 'foundation-sites/dist/js/plugins/foundation.util.keyboard'
import 'foundation-sites/dist/js/plugins/foundation.util.mediaQuery'
import 'foundation-sites/dist/js/plugins/foundation.util.motion'
import 'foundation-sites/dist/js/plugins/foundation.util.touch'
import 'foundation-sites/dist/js/plugins/foundation.util.triggers'
import 'foundation-sites/dist/js/plugins/foundation.reveal'
import 'slick-carousel'

jQuery(document).foundation()

window.$ = window.jQuery = $
;(function ($) {
	$(document).ready(function () {
		ajaxInformation()
		$('#ovenpost').on('change', ajaxInformation)
		$('#pizza').on('change', ajaxInformation)

		function ajaxPizza(p, pizza) {
			var data = {
				action: 'ajaxPost',
				p: p,
				pizza: pizza,
			}

			$.ajax({
				type: 'post',
				url: ajaxurl,
				data: data,
				success: function (response) {
					$('.responsehtml').html(response)
				},
			})
		}

		function ajaxInformation() {
			var ovenpost = $('#ovenpost').val(),
				pizza = $('#pizza').val()

			if (ovenpost != 0 && pizza != 0) {
				ajaxPizza(ovenpost, pizza)
			}
		}

		$('.oven-ribbons__close').on('click', function () {
			$('.oven-ribbons').hide()
		})

		/* Search and filter js copied from admin - toggle filter containers */

		$('.searchandfilter li h4').click(function () {
			$(this).toggleClass('expanded')
			$(this).siblings('ul').toggleClass('open')
		})

		$('.filter-expand-btn').click(function () {
			$(this).toggleClass('expanded')
			$(this).siblings('.searchandfilter').toggleClass('open')
		})

		jQuery('.vimeo-player').each(function (index) {
			var jQuerythis = this,
				idElement = jQuery(this).attr('data-id')

			jQuery.ajax({
				type: 'GET',
				url: 'https://vimeo.com/api/v2/video/' + idElement + '.json',
				dataType: 'json',
				success: function (data) {
					var video = data[0]
					var videoTitle = video.title
					var videoClean = videoTitle.replace(/[^a-z0-9]/gi, '')

					jQuery('<img/>', {
						src: video.thumbnail_large,
						alt: videoClean,
					}).prependTo(jQuerythis)
				},
			})
		})

		jQuery('.vimeo-thumb').each(function (index) {
			var jQuerythis = this,
				idElement = jQuery(this).attr('data-id')
			jQuery.ajax({
				type: 'GET',
				url: 'https://vimeo.com/api/v2/video/' + idElement + '.json',
				dataType: 'json',
				success: function (data) {
					var video = data[0]
					var videoTitle = video.title
					var videoClean = videoTitle.replace(/[^a-z0-9]/gi, '')

					jQuery('<img/>', {
						src: video.thumbnail_large,
						alt: videoClean,
					}).prependTo(jQuerythis)
				},
				error: function (xhr, ajaxOptions, thrownError) {
					console.log(xhr.status)
					console.log(thrownError)
				},
			})
		})

		$('.intro-oven__reviews-content').slick({
			speed: 200,
			prevArrow: '.intro-oven__reviews-arrow--prev',
			nextArrow: '.intro-oven__reviews-arrow--next',
		})

		$('.blog-aside-oven-variations').slick({
			dots: false,
			arrows: false,
			autoplay: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplaySpeed: 4000,
			adaptiveHeight: true,
		})

		$('.home-sticky__close').on('click', function () {
			$('.home-sticky').hide()
			createCookie('ovention_sticky', true, 1)
		})

		/*SUBMIT QUIZ*/
		var Os = getOS()
		if (Os == 'iOS') {
			$('#ios-button').show()
		} else {
			if (Os == 'Android') {
				$('#android-button').show()
			}
		}

		//SUBMIT THE QUIZ
		$('.reload').on('click', function (event) {
			var origin = window.location.origin
			var pathname = window.location.pathname
			location.href = origin + pathname
		})

		window.dataLayer = window.dataLayer || []

		var conset = readCookie('notification_cookie')

		if (conset == 'yes') {
			dataLayer.push({
				event: 'gdpr-eu-cookie-consent-recalled',
			})
		} else if (conset == 'no') {
			dataLayer.push({
				event: 'gdpr-eu-cookie-consent-no',
			})
		} else if (conset == 'non-eu') {
			dataLayer.push({
				event: 'gdpr-non-eu-cookie-consent-yes',
			})
		} else {
			checkRegion()
		}

		$('.accept-cookie').on('click', function () {
			$('.max-w-sticky').hide()
			$('.footer').removeClass('footer-cookie')
			dataLayer.push({
				event: 'gdpr-non-eu-cookie-consent-yes',
			})
			createCookie('notification_cookie', 'yes', 365)
		})

		$('.accept-eu-cookie').on('click', function () {
			$('.max-w-sticky').hide()
			$('.footer').removeClass('footer-cookie')
			dataLayer.push({
				event: 'gdpr-eu-cookie-consent-yes',
			})
			createCookie('notification_cookie', 'yes', 365)
		})

		$('.no-accept-eu-cookie').on('click', function () {
			$('.max-w-sticky').hide()
			$('.footer').removeClass('footer-cookie')
			dataLayer.push({
				event: 'gdpr-eu-cookie-consent-no',
			})
			createCookie('notification_cookie', 'no', 30)
		})

		function geoGetContinent() {
			var request = new XMLHttpRequest()
			request.open('GET', 'https://api.ipdata.co/?api-key=9b41f490ca115ff332778ca198318bfa3aacb239e65a33529b4bea39')
			request.setRequestHeader('Accept', 'application/json')
			request.onreadystatechange = function () {
				if (this.readyState === 4) {
					showBanner(this.responseText)
				}
			}

			request.send()
		}

		function checkRegion() {
			var continent = geoGetContinent()
		}

		function showBanner(jsonBody) {
			var ipLoc = JSON.parse(jsonBody)
			$('.footer').addClass('footer-cookie')
			if (ipLoc['continent_code'] == 'EU') {
				$('.max-w-sticky').css('display', 'flex')
				$('.non-eu').css('display', 'none')
				$('.region-eu').css('display', 'flex')
			} else {
				dataLayer.push({
					event: 'gdpr-non-eu',
				})
				$('.max-w-sticky').css('display', 'flex')
				$('.region-eu').css('display', 'none')
				$('.non-eu').css('display', 'flex')
			}
		}

		// Append field requirement
		$('#gform_15 .gform_footer.top_label').prepend("<div class='required_field'>*Field Required</div>")
		// Demo Schedule
		$('.demo-schedule-lightbox').on('click', function (e) {
			e.preventDefault()

			$('.demo-lightbox').addClass('active')
		})
		$('.demo-lightbox__close a').on('click', function (e) {
			e.preventDefault()

			$('.demo-lightbox').removeClass('active')
		})

		// Find recipe
		$('.find-rep-btn').on('click', function (e) {
			e.preventDefault()

			$('.find-rep-lightbox').addClass('active')
		})
		$('.find-rep-lightbox__close a').on('click', function (e) {
			e.preventDefault()

			$('.find-rep-lightbox').removeClass('active')
		})
	})
})(jQuery)

/* GET OS */
function getOS() {
	var platform = 'Unknown OS'
	var userAgent = navigator.userAgent || navigator.vendor || window.opera

	if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/iPod/i)) {
		platform = 'iOS'
	} else if (userAgent.match(/Android/i)) {
		platform = 'Android'
	} else {
		if (navigator.appVersion.indexOf('Win') != -1) {
			platform = 'Windows'
		} else if (navigator.appVersion.indexOf('Mac') != -1) {
			platform = 'Mac'
		}
	}
	return platform
}

document.addEventListener('DOMContentLoaded', function () {
	var div,
		n,
		v = document.getElementsByClassName('youtube-player')
	for (n = 0; n < v.length; n++) {
		div = document.createElement('div')
		div.setAttribute('data-id', v[n].getAttribute('data-id'))
		div.innerHTML = labnolThumb(v[n].getAttribute('data-id'))
		div.onclick = labnolIframe
		v[n].appendChild(div)
	}

	var div,
		n,
		v = document.getElementsByClassName('vimeo-player')
	for (n = 0; n < v.length; n++) {
		div = document.createElement('div')
		div.setAttribute('data-id', v[n].getAttribute('data-id'))
		div.innerHTML = labnolThumbvideo(v[n].getAttribute('data-id'))
		div.onclick = labnolIframeVimeo
		v[n].appendChild(div)
	}

	var div,
		n,
		v = document.getElementsByClassName('vimeo-thumb')
	for (n = 0; n < v.length; n++) {
		div = document.createElement('div')
		div.setAttribute('data-id', v[n].getAttribute('data-id'))
		div.innerHTML = labnolThumbvideo(v[n].getAttribute('data-id'))
		v[n].appendChild(div)
	}
	var div,
		n,
		v = document.getElementsByClassName('vimeo-reveal')
	for (n = 0; n < v.length; n++) {
		div = document.createElement('div')
		div.setAttribute('data-id', v[n].getAttribute('data-id'))
		var attributeID = v[n].getAttribute('data-id')
		var iframe = document.createElement('iframe')
		var embed = 'https://player.vimeo.com/video/ID'
		iframe.setAttribute('src', embed.replace('ID', attributeID))
		iframe.setAttribute('frameborder', '0')
		iframe.setAttribute('allowfullscreen', '1')
		v[n].appendChild(iframe)
	}
})

/*VIMEO FUNCTIONS*/
function labnolIframeVimeo() {
	var iframe = document.createElement('iframe')
	var embed = 'https://player.vimeo.com/video/ID?autoplay=1'
	iframe.setAttribute('src', embed.replace('ID', this.getAttribute('data-id')))
	iframe.setAttribute('frameborder', '0')
	iframe.setAttribute('allowfullscreen', '1')
	this.parentNode.replaceChild(iframe, this)
}

function labnolThumbvideo(id) {
	var play = '<div class="play"></div>'
	return play
}

function labnolThumb(id) {
	var thumb = '<img src="https://i.ytimg.com/vi/ID/sddefault.jpg">',
		play = '<div class="play"></div>'
	return thumb.replace('ID', id) + play
}

function labnolIframe() {
	var iframe = document.createElement('iframe')
	var embed = 'https://www.youtube.com/embed/ID?autoplay=1&rel=0'
	iframe.setAttribute('src', embed.replace('ID', this.getAttribute('data-id')))
	iframe.setAttribute('frameborder', '0')
	iframe.setAttribute('allowfullscreen', '1')
	this.parentNode.replaceChild(iframe, this)
}

function videoCallback(json) {
	var json = json[0]
	var videoTitle = json.title
	var videoClean = videoTitle.replace(/[^a-z0-9]/gi, '')

	jQuery('<img/>', {
		src: json.thumbnail_large,
		alt: videoClean,
	}).prependTo(jQuery('div[data-id= ' + json.id + ']'))
}

function createCookie(name, value, days) {
	if (days) {
		var date = new Date()
		date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000)
		var expires = '; expires=' + date.toGMTString()
	} else var expires = ''
	document.cookie = name + '=' + value + expires + '; path=/'
}

function readCookie(name) {
	var nameEQ = name + '='
	var ca = document.cookie.split(';')
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i]
		while (c.charAt(0) == ' ') c = c.substring(1, c.length)
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length)
	}
	return null
}

function eraseCookie(name) {
	createCookie(name, '', -1)
}

/* Find all active filters */
const activeFilters = document.querySelectorAll('li[data-sf-field-input-type="checkbox"] > ul > li.sf-option-active')

/* If active filter, open container */
if (activeFilters.length) {
	Array.from(activeFilters).forEach(activeFilters => {
		var activeFilter = activeFilters.closest('li[data-sf-field-input-type="checkbox"]')
		activeFilter.getElementsByTagName('ul')[0].classList.add('open')
		activeFilter.getElementsByTagName('h4')[0].classList.add('expanded')
	})

	/* On mobile, if active, open filters */
	document.querySelector('.filter-expand-btn').classList.toggle('expanded')
	document.querySelector('.searchandfilter').classList.toggle('open')
}

/* hide sidecart button and display in menu */
const sideCartButton = document.querySelector('.xoo-wsc-basket')

if (sideCartButton !== '') {
	sideCartButton.style.display = 'block'
	sideCartButton.style.position = 'relative'
}

/* show reset if any filters are active */
const resetButton = document.querySelector('.sf-field-reset')

if (activeFilters.length > 0) {
	resetButton.classList.add('js-show-reset')
}

require('./lightboxes')
require('./catalog')
require('./hamburgers')
require('./menu')
require('./ovens')
require('./single-oven')
require('./swiper')
require('./vimeo-players')
require('./tabs')
