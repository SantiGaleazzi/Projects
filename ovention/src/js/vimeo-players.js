import Player from '@vimeo/player'
const vimeoTriggers = document.querySelectorAll('.js-has-vimeo-player')

vimeoTriggers?.forEach((player, index) => {
	player.insertAdjacentHTML(
		'beforeend',
		`
    <div class="js-single-oven-media tw-absolute tw-inset-0 tw-z-10">
      <button class="js-oven-video-play tw-backdrop-blur-sm tw-flex tw-items-center tw-justify-center tw-rounded-full tw-cursor-pointer tw-z-10 tw-shadow-lg" data-video-id="${player.dataset.videoId}" aria-label="Play Video">
				<i class="fa-solid fa-play tw-text-white tw-text-5xl lg:tw-text-6xl -tw-mr-2"></i>
				<i class="fa-solid fa-xmark tw-text-white"></i>
			</button>
			<div id="js-oven-player-${index}" class="media-loader"></div>
		</div>`
	)

	const ovenPlay = player?.querySelector('.js-oven-video-play')
	const playFontawesome = player?.querySelector('.fa-play')
	const xmarkFontawesome = player?.querySelector('.fa-xmark')

	player.addEventListener('click', () => {
		const playerWrapper = player?.querySelector('.js-single-oven-media')

		const ovenPlayer = new Player('js-oven-player-' + index, {
			id: player.dataset.videoId,
			autoplay: true,
			color: 'FF8A2C',
		})

		if (playerWrapper.classList.contains('is-playing')) {
			ovenPlayer.destroy().then(() => {
				ovenPlay.textContent = ''
				ovenPlay.appendChild(playFontawesome)
				playerWrapper.classList.remove('is-playing')
			})
		} else {
			ovenPlay.innerHTML =
				'<svg class="tw-w-10 tw-h-10 tw-animate-spin tw-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="tw-opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="tw-opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>'

			ovenPlayer.ready().then(() => {
				ovenPlayer.setVolume(0)
				ovenPlay.textContent = ''
				ovenPlay.appendChild(xmarkFontawesome)
				playerWrapper.classList.add('is-playing')
			})
		}
	})
})
