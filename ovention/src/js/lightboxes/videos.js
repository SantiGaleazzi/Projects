import Player from '@vimeo/player'
const videosAvailable = document.querySelectorAll('.js-video-media-play')

videosAvailable?.forEach(video => {
	video.addEventListener('click', () => {
		const videoLightbox = document.querySelector('.video-lightbox')
		const lightboxContent = videoLightbox?.querySelector('.lightbox-content')

		const videoPlayer = new Player('js-video-loader', {
			id: video.dataset.videoId,
			autoplay: true,
			color: 'FF8A2C',
		})

		videoPlayer.ready().then(() => {
			videoPlayer.setVolume(0)
		})

		videoLightbox.classList.add('is-active')
		document.body.classList.add('tw-overflow-hidden')

		setTimeout(() => {
			lightboxContent.classList.toggle('is-active')
		}, 400)

		document.addEventListener('keyup', event => {
			if (event.key === 'Escape') {
				videoLightbox.classList.remove('is-active')
				lightboxContent.classList.remove('is-active')
				document.body.classList.remove('tw-overflow-hidden')

				videoPlayer.destroy()
			}
		})

		videoLightbox.querySelectorAll('.dismiss').forEach(dismiss => {
			dismiss.addEventListener('click', () => {
				videoLightbox.classList.remove('is-active')
				lightboxContent.classList.remove('is-active')
				document.body.classList.remove('tw-overflow-hidden')

				videoPlayer.destroy()
			})
		})
	})
})


