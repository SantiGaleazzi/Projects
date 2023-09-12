import Player from '@vimeo/player'

const videoPlayButton = document.querySelector('.js-catalog-video-media')

videoPlayButton?.addEventListener('click', () => {
	const player = document.querySelector('.js-catalog-video-player')
	const closePlayer = player?.querySelector('.js-close-player')
	const playFontawesome = videoPlayButton?.querySelector('.fa-play')

	videoPlayButton.innerHTML =
		'<svg class="tw-w-10 tw-h-10 tw-animate-spin tw-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="tw-opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="tw-opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>'

	const vimeoPlayer = new Player('js-catalog-video', {
		id: videoPlayButton.dataset.videoId,
		autoplay: true,
		color: 'FF8A2C',
		width: 650,
	})

	vimeoPlayer.ready().then(() => {
		vimeoPlayer.setVolume(0)
		player.classList.add('is-playing')
		videoPlayButton.innerHTML = ''
		videoPlayButton.appendChild(playFontawesome)
	})

	closePlayer?.addEventListener('click', () => {
		vimeoPlayer.destroy().then(() => {
			player.classList.remove('is-playing')
		})
	})
})
