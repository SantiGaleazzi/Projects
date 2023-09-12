const moreAboutGeorge = document.querySelector('.js-george-video')

if (moreAboutGeorge) {
	const extraDescription = moreAboutGeorge.querySelector('.js-extra-description')
	const accordion = moreAboutGeorge.querySelector('.js-story-accordion button')

	accordion.addEventListener('click', () => {
		extraDescription.classList.toggle('is-open')

		if (extraDescription.classList.contains('is-open')) {
			accordion.innerHTML = 'Show less'
		} else {
			accordion.innerHTML = 'Show more'
		}
	})
}

const imageTrigger = document.querySelectorAll('.remembrance-image')
const galleryLightbox = document.querySelector('.george-lightbox')
const lightboxImage = document.querySelector('.george-lightbox img')
const closeGalleryLightbox = document.querySelectorAll('.close-george-lighbox')

if (galleryLightbox !== null) {
	imageTrigger.forEach(item => {
		item.addEventListener('click', () => {
			var imageUrl = item;
			var prop = window.getComputedStyle(imageUrl).getPropertyValue('background-image');
			var re = /url\((['"])?(.*?)\1\)/gi;
			var matches;
			while ((matches = re.exec(prop)) !== null) {
			    lightboxImage.src = matches[2]
			}

			galleryLightbox.classList.toggle('active')
			
		})
	})

	closeGalleryLightbox.forEach(close => {
		close.addEventListener('click', event => {
			event.stopPropagation()

			document.body.classList.remove('overflow-hidden')
			galleryLightbox.classList.remove('active')
		})
	})
}
