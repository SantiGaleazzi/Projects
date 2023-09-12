// Text updates
const emailSelector = document.querySelector('#wdm_group thead tr')
if (emailSelector !== null) {
	const userIdTab = emailSelector.children.item(2)
	const actionTab = emailSelector.children.item(3)

	userIdTab.innerHTML = 'User ID'
	actionTab.innerHTML = 'Action'
}

const reportEmailSelector = document.querySelector('#wdm_ldgr_group_report thead tr')
if (reportEmailSelector !== null) {
	const reportEmailText = reportEmailSelector.children.item(2)
	reportEmailText.innerHTML = 'User ID'
}

const notesTitle = document.getElementById('ldnt-shortcode')
if (notesTitle !== null) {
	const heading = document.createElement('h1')
	const target = document.querySelector('#ldnt-shortcode')

	heading.innerText = 'My Notes'
	target.parentNode.insertBefore(heading, target)
}

const selectWrap = document.querySelector('.ldnt-select-wrap')
if (selectWrap !== null) {
	const showTitle = document.createElement('span')
	showTitle.innerText = 'Show'

	const selectItem = document.querySelector('#ldnt-posts-per-page')

	selectItem.parentNode.insertBefore(showTitle, selectItem)
}

setTimeout(() => {
	const searchText = document.querySelector('.wdm-tabs-wrapper .dataTables_filter input')
	const prevItemText = document.querySelector('.dataTables_paginate .previous')
	const nextItemText = document.querySelector('.dataTables_paginate .next')

	if (searchText !== null) {
		searchText.placeholder = 'Search by user ID'
	}

	if (prevItemText !== null) {
		prevItemText.innerText = '« Prev'
	}

	if (nextItemText !== null) {
		nextItemText.innerText = 'Next »	'
	}
}, 10)

const courseHeading = document.querySelector('.course-container .ld-section-heading h2')
if (courseHeading !== null) {
	courseHeading.innerHTML = 'Your lessons'
}

const progressTitle = document.querySelector('.archive-course-container .ld-progress')
if (progressTitle !== null) {
	const progressHeading = document.createElement('h3')
	const targetProgress = document.querySelector('.ld-progress-bar')

	progressHeading.innerText = 'Here’s what you have completed:'
	targetProgress.parentNode.insertBefore(progressHeading, targetProgress.nextSibling)
}

const lessonProgressTitle = document.querySelector('.single-sfwd-lessons .ld-progress')
if (lessonProgressTitle !== null) {
	const lessonProgressHeading = document.createElement('h3')
	const lessonTargetProgress = document.querySelector('.ld-progress-bar')

	lessonProgressHeading.innerText = 'Here’s what you have completed:'
	lessonTargetProgress.parentNode.insertBefore(lessonProgressHeading, lessonTargetProgress)
}

const topicProgressTitle = document.querySelector('.single-sfwd-topic .ld-progress')
if (topicProgressTitle !== null) {
	const topicProgressHeading = document.createElement('h3')
	const topicTargetProgress = document.querySelector('.ld-progress-bar')

	topicProgressHeading.innerText = 'Here’s what you have completed:'
	topicTargetProgress.parentNode.insertBefore(topicProgressHeading, topicTargetProgress)
}

const quizProgressTitle = document.querySelector('.single-sfwd-quiz .ld-progress')
if (quizProgressTitle !== null) {
	const quizProgressHeading = document.createElement('h3')
	const quizTargetProgress = document.querySelector('.ld-progress-bar')

	quizProgressHeading.innerText = 'Here’s what you have completed:'
	quizTargetProgress.parentNode.insertBefore(quizProgressHeading, quizTargetProgress)
}

const markComplete = document.querySelectorAll('.learndash_mark_complete_button')
markComplete?.forEach(item => {
	item.value = 'Save and Continue'
})

const markIncompleteComplete = document.querySelectorAll('.learndash_mark_incomplete_button')
markIncompleteComplete?.forEach(item => {
	item.value = 'Mark Incomplete'
})

// Add Enroll Users Button
const enrollUserButton = document.getElementById('wdm_groups_tab')
if (enrollUserButton !== null) {
	const button = document.createElement('div')
	const table = document.querySelector('.wdm-tabs-inner-links')

	button.innerText = 'Enroll New Users'
	table.parentNode.insertBefore(button, table)
	button.classList.add('button-enroll-user')
}

// Open and Close enrollment lightbox
const enrollNewUsers = document.querySelector('.button-enroll-user')
const enrollUsersLightbox = document.querySelector('.enroll-users-lightbox')
const closeEnrollUsers = document.querySelector('.close-enrollment-lightbox')
const cancelEnrollUsers = document.querySelector('.cancel-enrollment')

enrollNewUsers?.addEventListener('click', () => {
	enrollUsersLightbox.classList.toggle('hidden')
})

closeEnrollUsers?.addEventListener('click', () => {
	enrollUsersLightbox.classList.toggle('hidden')
})

cancelEnrollUsers?.addEventListener('click', () => {
	enrollUsersLightbox.classList.toggle('hidden')
})

// Open and Close Login lightbox
const openLoginLb = document.querySelectorAll('.open-login')
const loginLightbox = document.querySelector('.login-lightbox')
const closeLoginLb = document.querySelectorAll('.close-login-lightbox')

openLoginLb?.forEach(item => {
	item.addEventListener('click', () => {
		loginLightbox.classList.toggle('show-lightbox')
	})
})

closeLoginLb?.forEach(item => {
	item.addEventListener('click', () => {
		loginLightbox.classList.toggle('show-lightbox')
	})
})

/* Failed Login */

if (loginLightbox !== null) {
	if (window.location.toString().includes('failed')) {
		loginLightbox.classList.toggle('show-lightbox')
	}
}

// Get Help Widget
const formWidget = document.querySelector('.form-widget')
const helpWidget = document.querySelector('.get-help-widget')

helpWidget?.addEventListener('click', () => {
	formWidget.classList.toggle('show-form-widget')
})

const headerWidget = document.querySelector('.widget-heading')
headerWidget?.addEventListener('click', () => {
	formWidget.classList.toggle('show-form-widget')
})

const confirmationMessage = document.querySelector('.form-widget .gform_confirmation_message')
if (confirmationMessage !== null) {
	formWidget.classList.toggle('show-form-confirmation-widget')
}

// Get group ID for enrollment
const groupSelect = document.getElementById('groups-select')
groupSelect?.addEventListener('change', () => {
	const strUser = groupSelect.options[groupSelect.selectedIndex].value
	document.cookie = 'group=' + strUser
})

const addUsersForm = document.getElementById('gform_5')
const confirmationLightbox = document.querySelector('.confirmation-message-lb')
if (addUsersForm !== null) {
	addUsersForm.onsubmit = function (event) {
		confirmationLightbox.classList.toggle('hidden')

		setTimeout(() => {
			event.preventDefault()
		}, '2000')
	}
}

/* Facilitators Guide Accordion */
const accordionTitle = document.querySelectorAll('.accordion-title')
accordionTitle?.forEach(item => {
	item.addEventListener('click', () => {
		item.nextSibling.classList.toggle('hidden')
		item.classList.toggle('active-accordion')
	})
})
