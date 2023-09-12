var Cookie = {
	set: function (name, value, days) {
		var domain, domainParts, date, expires, host

		if (days) {
			date = new Date()
			date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000)
			expires = '; expires=' + date.toGMTString()
		} else {
			expires = ''
		}

		host = location.host
		if (host.split('.').length === 1) {
			// no "." in a domain - it's localhost or something similar
			document.cookie = name + '=' + value + expires + '; path=/'
		} else {
			// Remember the cookie on all subdomains.
			//
			// Start with trying to set cookie to the top domain.
			// (example: if user is on foo.com, try to set
			//  cookie to domain ".com")
			//
			// If the cookie will not be set, it means ".com"
			// is a top level domain and we need to
			// set the cookie to ".foo.com"
			domainParts = host.split('.')
			domainParts.shift()
			domain = '.' + domainParts.join('.')

			document.cookie = name + '=' + value + expires + '; path=/; domain=' + domain

			// check if cookie was successfuly set to the given domain
			// (otherwise it was a Top-Level Domain)
			if (Cookie.get(name) == null || Cookie.get(name) != value) {
				// append "." to current domain
				domain = '.' + host
				document.cookie = name + '=' + value + expires + '; path=/; domain=' + domain
			}
		}
	},

	get: function (name) {
		var nameEQ = name + '='
		var ca = document.cookie.split(';')
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i]
			while (c.charAt(0) == ' ') {
				c = c.substring(1, c.length)
			}

			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length)
		}
		return null
	},

	erase: function (name) {
		Cookie.set(name, '', -1)
	},
}

;(function ($) {
	function existCookie(name) {
		return Cookie.get(name)
	}

	function createCookieByDays(name, days) {
		Cookie.set(name, true, days)
	}

	function createCookieByDoubleDays(name, days) {
		Cookie.set(name, true, parseInt(days, 10) * 2)
	}

	function createCookieByForever(name) {
		Cookie.set(name, true, 1000)
	}

	function removeCookie(name) {
		Cookie.erase(name)
	}

	function showPushDownFfz() {
		createCookieByDays('afterFirstVisit')
		$('.push-down').removeClass('hide')
		$('.push-down__ffz').removeClass('hide')
	}

	function showPushDownSignUp() {
		$('.push-down').removeClass('hide')
		$('.push-down__signUp').removeClass('hide')
	}

	function createCookiesForTheLogic() {
		createCookieByForever('isTheFirstVisit')
		createCookieByDays('startPushDownLogic', days.without_push_down)
	}

	function alternatePushDown() {
		if (
			(existCookie('doYouSeeFFz') && existCookie('scheduleSeeSignUp')) ||
			(!existCookie('doYouSeeFFz') && existCookie('doYouSeeSignUp'))
		) {
			return
		}

		if (!existCookie('doYouSeeFFz') && !existCookie('scheduleSeeSignUp')) {
			createCookieByDays('doYouSeeFFz', days.can_see_each_push_down)
			createCookieByDoubleDays('scheduleSeeSignUp', days.can_see_each_push_down)
			showPushDownFfz()
		}

		if (!existCookie('doYouSeeFFz') && existCookie('scheduleSeeSignUp')) {
			createCookieByDoubleDays('doYouSeeSignUp', days.can_see_each_push_down)
			removeCookie('scheduleSeeSignUp')
			showPushDownSignUp()
		}
	}

	$(document).ready(function () {
		$('html, body').animate({ scrollTop: '0' }, 1000)

		$('.push-down__close .fa-times-circle').on('click', function () {
			var pushDown = $(this).parents('.push-down')
			pushDown.slideUp('slow', function () {
				var stickyNavTop = $('.sticky-nav').offset().top
				$('.sticky-nav').attr('data-height', stickyNavTop)
			})
		})

		existCookie('isTheFirstVisit') && !existCookie('startPushDownLogic')
			? alternatePushDown()
			: createCookiesForTheLogic()
	})
})(jQuery)
