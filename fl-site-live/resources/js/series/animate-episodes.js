window.onload = () => {
	// Initial Functions.
	seriesAnimation()
	animateEpisodesOnLoad()
	closeVideoPlayer()
	addYouTubeScript()

	// Series info initial animation.
	function seriesAnimation() {
		const series_info = document.querySelector('.series-info')

		if (series_info !== null) {
			series_info.classList.add('is-animating')
		}
	}

	// Animates all episodes on page load.
	function animateEpisodesOnLoad() {
		const all_episodes = document.querySelectorAll('.episode')

		if (all_episodes.length > 0) {
			let youtubePlayer = null

			// Store series initial information.
			const series_name = document.querySelector('.series-name').dataset.seriesName
			const series_description =
				document.querySelector('.series-description').dataset.seriesDescription
			const series_cover = document.querySelector('.series-cover').dataset.seriesCover

			all_episodes.forEach((episode, index) => {
				// Animate episode on page load.
				setTimeout(() => {
					episode.classList.add('animating')
				}, 150 * index)

				// Gets the player media ID.
				const episode_media = episode.querySelector('.player-media')

				// When user clicks on the episode watch.
				episode_media.addEventListener('click', () => {
					// Video player located on series information.
					const video_player = document.querySelector('.video-player-container')

					// Unselect now playing from episodes.
					all_episodes.forEach(episode => {
						episode.classList.remove('now-playing')
					})

					// To indicate which episode is playing in the player.
					episode.classList.add('now-playing')

					// Shows the video player.
					video_player.classList.add('is-playing')

					// Adds the Season ID and the Episode ID currently playing to the player.
					video_player.dataset.seasonPlaying = episode.dataset.seasonId
					video_player.dataset.episodePlaying = episode.dataset.episodeId

					// Create a player instance and play the video.
					// This media-id needs to be specified in the episode.
					if (episode_media.dataset.mediaId) {
						const videoElement = document.querySelector('#video-element')
						videoElement.innerHTML = ''

						if (episode_media.dataset.mediaType === 'youtube') {
							const emptyDiv = document.createElement('div')
							emptyDiv.id = 'youtube-player-iframe'
							videoElement.appendChild(emptyDiv)

							youtubePlayer = new YT.Player(document.getElementById('youtube-player-iframe'), {
								videoId: episode_media.dataset.mediaId,
								playerVars: {
									autoplay: 1,
									modestbranding: 1,
									rel: 0,
									showinfo: 0,
								},
							})
						} else {
							videoElement.innerHTML = `<iframe
								src='https://subsplash.com/firstlibertyinstitute/embed/mi/+${episode_media.dataset.mediaId}?video&audio&info&logo_watermark=false&autoplay=true&origin=${window.location.hostname}'
								frameborder='0'
								webkitallowfullscreen
								mozallowfullscreenallowfullscreen
								style='position:absolute;top:0;left:0;width:100%;height:100%;'
							></iframe>
						`
						}
					}

					// Scroll to video player.
					document
						.getElementById('series-info')
						.scrollIntoView({ block: 'start', behavior: 'smooth' })

					// Revert the series info to the original state.
					document.querySelector('.series-name').innerHTML = series_name
					document.querySelector('.series-description').innerHTML = series_description
					document.querySelector('.series-cover').style.backgroundImage = `url(${series_cover})`
				})

				// When mose enter the episode, replace series data with episode data.
				episode.addEventListener('mouseenter', () => {
					// If the video is visible/playing do not change the series information.
					if (!document.querySelector('.video-player-container').classList.contains('is-playing')) {
						// Get episode original data and replace it with the episodes data.
						document.querySelector('.series-name').innerHTML = episode.dataset.title
						document.querySelector('.series-description').innerHTML = episode.dataset.description
						document.querySelector(
							'.series-cover'
						).style.backgroundImage = `url(${episode.dataset.thumbnailFull})`
					}
				})

				// When mouse leaves the episode, replace series info with the original dataw.
				episode.addEventListener('mouseleave', () => {
					// If the video is visible/playing do not change the series information.
					if (!document.querySelector('.video-player-container').classList.contains('is-playing')) {
						document.querySelector('.series-name').innerHTML = series_name
						document.querySelector('.series-description').innerHTML = series_description
						document.querySelector('.series-cover').style.backgroundImage = `url(${series_cover})`
					}
				})
			})
		}
	}

	// Function to close the video player.
	function closeVideoPlayer() {
		const video_player = document.querySelector('.video-player-container')

		if (video_player !== null) {
			video_player.querySelector('.close-video').addEventListener('click', () => {
				// Video player.
				const video_player = document.querySelector('.video-player-container')

				// Unselect now playing from episodes.
				const all_episodes = document.querySelectorAll('.episode')

				// Remove the now playing state from the episodes.
				all_episodes.forEach(episode => {
					episode.classList.remove('now-playing')
				})

				// Hiddes video player.
				video_player.classList.remove('is-playing')

				// Remove video player instance.
				document.querySelector('#video-element').innerHTML = ''
			})
		}
	}

	function addYouTubeScript() {
		const tag = document.createElement('script')
		tag.src = 'https://www.youtube.com/iframe_api'
		const firstScript = document.getElementsByTagName('script')[0]
		firstScript.parentNode.insertBefore(tag, firstScript)
	}
}
