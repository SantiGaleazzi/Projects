const series_seasons = document.querySelector('.series-season-dropdown')
const urlParams = new URLSearchParams(window.location.search)

if (series_seasons !== null) {
	const season_selected = series_seasons.querySelector('.season-selected')
	const season_name = season_selected.querySelector('.season-name')
	const loading_spinner = season_selected.querySelector('.loading-spinner')

	// If Season numer is given as parameter.
	if (urlParams.has('season')) {
		let season_number = urlParams.get('season')
		season_number = season_number.replace(/, /g, ' ') // Remove commas and adds spaces.

		// Compare the season provided as parameter with the data-total-of-seasons in the dropdown.
		if (parseInt(season_number) > series_seasons.dataset.totalOfSeasons) {
			// Fallback to season 1 if the parameter is greater than the amount of seasons available.
			season_name.innerHTML = 'Season 1'
		} else {
			season_name.innerHTML = 'Season ' + season_number
		}
	}

	// If Episode param is provided the video will autoplay.
	if (urlParams.has('episode')) {
		let episode_number = urlParams.get('episode')
		episode_number = episode_number.replace(/, /g, ' ') // Remove commas and adds spaces.

		// If the episode exists in the DOM.
		const episode_found = document.querySelector(`[data-episode-id='${episode_number}']`)

		if (episode_found !== null) {
			setTimeout(() => {
				episode_found.querySelector('.player-media').click()
			}, 1800)
		}
	}

	// Series Dropdown Opens on click.
	season_selected.addEventListener('click', () => {
		series_seasons.classList.toggle('is-open')
	})

	// Outside dropdown click event closes seasons dropdown.
	document.addEventListener('mousedown', event => {
		if (!series_seasons.contains(event.target)) {
			series_seasons.classList.remove('is-open')
		}
	})

	const seasons_available = series_seasons.querySelector('.seasons-available')
	const all_serie_seasons = seasons_available.querySelectorAll('.season-option')

	all_serie_seasons.forEach(season => {
		season.addEventListener('click', () => {
			// Grabs the clicked season content and add it to the selected option
			season_name.innerHTML = season.innerHTML

			// Remove the active class.
			all_serie_seasons.forEach(season => {
				season.classList.remove('bg-gold-light')
			})

			// Loading Spinner Animation - Start
			loading_spinner.classList.add('is-loading')

			series_seasons.classList.remove('is-open')

			season.classList.add('bg-gold-light')

			// Request Episodes.
			sendHTTPRequest('POST', search_series_episodes_ajax.ajaxurl, {
				action: 'series_episode_search',
				season_id: season.dataset.season,
				series_id: series_seasons.dataset.seriesId,
			})
				.then(response => {
					// Loading Spinner Animation - End.
					loading_spinner.classList.remove('is-loading')

					// Clear previous episodes.
					document.querySelector('.series-episodes').innerHTML = ''

					// Adds and animate the new episodes.
					animateEpisodes(response.episodes)
				})
				.catch(error => {
					console.log(error)
				})
		})
	})
}

// Function that allows us to create promises based on http requests.
// Return the episodes found.
// PHP Logic can be found in functions/search-series-episodes.php
const sendHTTPRequest = (method, url, data) => {
	const promise = new Promise((resolve, reject) => {
		const request = new XMLHttpRequest()
		request.open(method, url, true)

		// Returns the php data as json instead of string.
		// With this we also avoid using JSON.parse( response ) in the onload event. And will directly transform the returned data to json.
		request.responseType = 'json'

		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;')

		request.onload = () => {
			resolve(request.response)
		}

		request.onerror = () => {
			reject('Something went wrong!')
		}

		request.send(`action=${data.action}&series_id=${data.series_id}&season_id=${data.season_id}`)
	})

	return promise
}

// Animate each episodes found.
function animateEpisodes(episodes) {
	let youtubePlayer = null
	// Convert string elements to HTML.
	let list_of_episodes = new DOMParser()
	episodes = list_of_episodes.parseFromString(episodes, 'text/html')

	let all_episodes = episodes.querySelectorAll('.episode')

	// Initial series information.
	const series_name = document.querySelector('.series-name').dataset.seriesName
	const series_description = document.querySelector('.series-description').dataset.seriesDescription
	const series_cover = document.querySelector('.series-cover').dataset.seriesCover

	// Video player
	const video_player = document.querySelector('.video-player-container')

	if (all_episodes.length > 0) {
		all_episodes.forEach((episode, index) => {
			// Appends the episode to list of episodes found.
			document.querySelector('.series-episodes').appendChild(episode)

			// If media is playing we need to knwo which episode is playing and then grab the episode id.
			if (video_player.classList.contains('is-playing')) {
				if (
					episode.dataset.episodeId === video_player.dataset.episodePlaying &&
					episode.dataset.seasonId === video_player.dataset.seasonPlaying
				) {
					episode.classList.add('now-playing')
				}
			}

			// Animate episode after appending to list of episodes.
			setTimeout(() => {
				episode.classList.add('animating')
			}, 150 * index)

			// Gets the player media ID.
			const episode_media = episode.querySelector('.player-media')

			// When user clicks on the episode watch.
			episode_media.addEventListener('click', () => {
				// Unselect the episodes that were playing or had the class.
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

				// Reset the series info on episode play.
				document.querySelector('.series-name').innerHTML = series_name
				document.querySelector('.series-description').innerHTML = series_description
				document.querySelector('.series-cover').style.backgroundImage = `url(${series_cover})`
			})

			// When mouse enter the episode, replace series information with the episode data.
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

			// When mouse leaves the episode, replace series info with the original data.
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
